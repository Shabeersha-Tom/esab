<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificates\Certificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        if (!Auth::user()->can('dashboard')) {
            if (Auth::user()->can('certificates-list')) {
                return redirect()->route('admin.certificates.index');
            }
            return redirect()->route('admin.certificates.search');
        }

        $usersCount = User::count();
        $certificatesCount = Certificate::count();
        $certificatesViewCount = views(Certificate::class)->collection('views')->unique()->count();
        $certificatesDownloadCount = views(Certificate::class)->collection('downloads')->unique()->count();

        return view('admin.dashboard', [
            'usersCount' => $usersCount,
            'certificatesCount' => $certificatesCount,
            'certificatesViewCount' => $certificatesViewCount,
            'certificatesDownloadCount' => $certificatesDownloadCount,
        ]);
    }
}
