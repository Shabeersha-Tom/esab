<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Certificates\Certificate;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        dd("Home Page");
    }

    public function certificate($slug)
    {
        $certificate = Certificate::with('file')->whereSlug($slug)->firstOrFail();
        return view('frontend.view')->with(['certificate' => $certificate]);
    }
    public function download($slug)
    {
        $certificate = Certificate::with('file')->whereSlug($slug)->firstOrFail();
        return  response()->download(public_path() . $certificate->file->getFile($certificate->certificate_no));
    }
}
