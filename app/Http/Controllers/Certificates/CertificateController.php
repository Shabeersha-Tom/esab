<?php

namespace App\Http\Controllers\Certificates;

use App\Exports\CertificateExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAutoCertificateRequest;
use App\Models\Certificates\Certificate;
use App\Models\Certificates\CertificateFile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\ImageManager;
use Maatwebsite\Excel\Facades\Excel;




class CertificateController extends Controller
{
    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::whereHas('certificate')->get();
        $query = Certificate::with(['user']);
        if ($request->user_id && $request->user_id !== '0') {
            $query->where('user_id', $request->user_id);
        }
        if ($request->start_date) {
            if ($request->end_date) {
                $query->whereBetween('created_at', [Carbon::parse($request->start_date)->startOfDay(), Carbon::parse($request->end_date)->endOfDay()]);
            } else {
                $query->where('created_at', '>=', Carbon::parse($request->start_date)->startOfDay());
            }
        }
        $certificates = $query->paginate(50)->withQueryString();
        return view('admin.certificates.index')
            ->with([
                'users' => $users,
                'certificates' => $certificates,
                'selected_user' => $request->user_id ?? 0,
                'start_date' => $request->start_date ?? 0,
                'end_date' => $request->end_date ?? 0,
            ]);
    }

    public function searchView()
    {
        return view('admin.certificates.search');
    }
    public function uploadAutoView()
    {
        return view('admin.certificates.uploadauto');
    }
    public function uploadManualView()
    {
        return view('admin.certificates.uploadmanual');
    }


    public function uploadFile(Request $request)
    {

        $name = uploadImage($request, 'file', 'temp');

        $imageUpload = CertificateFile::create([
            'path' => $name,
            'status' => 'draft'
        ]);

        return response()->json(['success' => $imageUpload->id]);
    }

    public function uploadAuto(StoreAutoCertificateRequest $request)
    {

        $file = CertificateFile::find($request->file_id);

        if ($file) {
            $certificate = Auth::user()->certificate()->create([
                'certificate_name' => $request->title,
                'certificate_no' => $request->cer_number,
                'test' => $request->test,
                'item_1' => $request->item_1,
                'item_2' => $request->item_2,
                'lot_1' => $request->lot_1,
                'lot_2' => $request->lot_2,
                'slug' => Str::uuid()->toString(),
            ]);

            $old_path = "/storage/temp/" . $file->path;
            $new_path = "/public/certificates/" . $request->cer_number . '/' . $file->path;

            moveFile($old_path, $new_path);

            $file->update([
                'status' => 'active',
                'certificate_no' => $certificate->id,
            ]);

            processAutoUpload($certificate, $file, $request->position);

            return redirect()->route('admin.certificates.index')->with('status', 'Certificate uploaded');
        }

        return back()->withErrors('file_error', 'Sorry, something went wrong, please try again');
    }

    public function uploadManual(Request $request)
    {
        $file = CertificateFile::find($request->file_id);

        if ($file) {
            $certificate = Auth::user()->certificate()->create([
                'certificate_name' => $request->title,
                'certificate_no' => $request->cer_number,
                'test' => $request->test,
                'item_1' => $request->item_1,
                'item_2' => $request->item_2,
                'lot_1' => $request->lot_1,
                'lot_2' => $request->lot_2,
                'slug' => Str::uuid()->toString(),
                'status' => false,
            ]);

            $old_path = "/storage/temp/" . $file->path;
            $new_path = "/public/certificates/" . $request->cer_number . '/' . $file->path;

            moveFile($old_path, $new_path);

            $file->update([
                'status' => 'active',
                'certificate_no' => $certificate->id,
            ]);

            // Convert pd to image
            $certificateImage = convertPdfToImage($certificate, $file);

            return redirect()->route('admin.certificates.placeQr')->with([
                'image_path' => $certificateImage,
                'file_id' => $request->file_id,
                'certificate_id' => $certificate->id
            ]);

            // processManualUpload($certificate, $file);

            // return redirect()->route('admin.certificates.index')->with('status', 'Certificate uploaded');
        }

        return back()->withErrors('file_error', 'Sorry, something went wrong, please try again');
    }

    public function placeQrView()
    {
        return view('admin.certificates.certificatePlacement')->with([
            'image_path' => session('image_path'),
            'file_id' => session('file_id'),
            'certificate_id' => session('certificate_id'),
        ]);
    }

    public function placeQr(Request $request)
    {
        $file = CertificateFile::find($request->file_id);
        $certificate = Certificate::find($request->certificate_id);
        processAutoUpload($certificate, $file, "manual", $request->x, $request->y);
    }


    public function view(Certificate $certificate)
    {
        $certificate->load('file');
        return view('admin.certificates.view')->with(['certificate' => $certificate]);
    }

    public function download(Certificate $certificate)
    {
        $certificate->load('file');
        return  response()->download(public_path() . $certificate->file->getFile($certificate->certificate_no));
    }

    public function print(Certificate $certificate)
    {
        $certificate->load('file');
        return view('admin.certificates.view')->with(['certificate' => $certificate]);
    }

    public function testView()
    {
        return view('admin.test');
    }

    public function export()
    {
        $name = "Certificate Export " . time() . '.xlsx';
        return Excel::download(new CertificateExport, $name);
    }

    public function searchResult(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(
                Certificate::class,
                'certificate_no',
                'test',
                'item_1',
                'item_2',
                'lot_1',
                'lot_2',
            )->search($request->q);

        $searchResults->each(function ($q) {
            $q->searchable->load('user');
        });

        return view('admin.certificates.search-result')
            ->with(['searchResults' => $searchResults]);
    }

    public function test(Request $request)
    {

        dd($request);

        // $pdf = new Pdf(getAdminAsset('img/certificate.pdf'));
        // $pdf->saveImage(public_path('test.jpg'));



        // $uploadedFile = $request->file('file');
        // $filename = time() . $uploadedFile->getClientOriginalName();
        // $name = Storage::disk('public')->putFileAs(
        //     'files/' . $filename,
        //     $uploadedFile,
        //     $filename
        // );
        // dd(URL::to('storage/' . $name));
        // dd(Storage::disk('public')->path($name));
    }
}
