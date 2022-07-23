<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        dd("Home Page");
    }
    
    public function certificate($request)
    {
        dd($request);
    }
}
