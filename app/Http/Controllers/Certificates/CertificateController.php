<?php

namespace App\Http\Controllers\Certificates;

use App\Http\Controllers\Controller;
use App\Models\Certificates\Certificate;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\User;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $certificates = Certificate::all();
        return view('admin.certificates.index')
            ->with([
                'users' => $users,
                'certificates' => $certificates
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
}
