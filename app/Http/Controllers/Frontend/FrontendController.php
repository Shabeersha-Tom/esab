<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Certificates\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class FrontendController extends Controller
{
    public function index()
    {
        return redirect()->route('login');
    }

    public function certificate($slug)
    {
        $certificate = Certificate::with('file')->whereSlug($slug)->firstOrFail();
        $certificate->views = $certificate->views + 1;
        $certificate->save();
        return view('frontend.view')->with(['certificate' => $certificate]);
    }
    public function download($slug)
    {
        $certificate = Certificate::with('file')->whereSlug($slug)->firstOrFail();
        $certificate->update([
            'downloads' => $certificate->downloads + 1
        ]);
        dd($certificate);
        return  response()->download(URL::to($certificate->file->getFile($certificate->certificate_no)));
        // return  response()->download(public_path() . $certificate->file->getFile($certificate->certificate_no));
    }
}
