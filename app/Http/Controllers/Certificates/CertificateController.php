<?php

namespace App\Http\Controllers\Certificates;

use App\Http\Controllers\Controller;
use App\Models\Certificates\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;

class CertificateController extends Controller
{
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
        $certificates = $query->get();
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
            )
            ->search($request->q);

        $searchResults->each(function ($q) {
            $q->searchable->load('user');
        });

        // dd($searchResults);

        return view('admin.certificates.search-result')
            ->with(['searchResults' => $searchResults]);
    }

    public function uploadAutoView()
    {
        return view('admin.certificates.uploadauto');
    }

    public function uploadAuto(Request $request)
    {
        dd($request);
    }

    public function uploadManualView()
    {
        return view('admin.certificates.uploadmanual');
    }
}
