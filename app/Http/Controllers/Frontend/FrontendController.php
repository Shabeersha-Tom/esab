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
        views($certificate)
            // ->cooldown(1440)
            ->collection('views')
            ->record();
        return view('frontend.view')->with(['certificate' => $certificate]);
    }
    public function download(Request $request)
    {
        $certificate = Certificate::whereSlug($request->slug)->firstOrFail();
        views($certificate)
            // ->cooldown(1440)
            ->collection('downloads')
            ->record();
        return true;
    }
}
