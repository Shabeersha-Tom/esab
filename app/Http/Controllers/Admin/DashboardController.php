<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificates\Certificate;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $certificatesCount = Certificate::count();
        $certificatesViewCount = Certificate::where('views', '>', 0)->count();
        $certificatesDownloadCount = Certificate::where('downloads', '>', 0)->count();

        return view('admin.dashboard', [
            'usersCount' => $usersCount,
            'certificatesCount' => $certificatesCount,
            'certificatesViewCount' => $certificatesViewCount,
            'certificatesDownloadCount' => $certificatesDownloadCount,
        ]);
    }
}
