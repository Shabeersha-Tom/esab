<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificates\Certificate;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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

        $now = Carbon::now();
        $period = CarbonPeriod::create($now->startOfWeek()->format('Y-m-d'), $now->endOfWeek()->format('Y-m-d'));
        $week = array();
        $chart = array();

        foreach ($period as $date) {
            $week[$date->format('Y-m-d')]['count'] = 0;
        }

        $certificates = Certificate::whereBetween("created_at", [
            $now->startOfWeek()->format('Y-m-d'), //This will return date in format like this: 2022-01-10
            $now->endOfWeek()->format('Y-m-d')
        ])->get();

        foreach ($certificates as $data) {
            $week[$data->created_at->format('Y-m-d')]['count'] = $week[$data->created_at->format('Y-m-d')]['count'] + 1;
        }

        foreach ($week as $day) {
            $chart[] =  $day['count'];
        }

        $usersCount = User::count();
        $certificatesCount = Certificate::whereStatus(1)->count();
        $certificatesViewCount = views(Certificate::class)->collection('views')->unique()->count();
        $certificatesDownloadCount = views(Certificate::class)->collection('downloads')->unique()->count();

        return view('admin.dashboard', [
            'usersCount' => $usersCount,
            'certificatesCount' => $certificatesCount,
            'certificatesViewCount' => $certificatesViewCount,
            'certificatesDownloadCount' => $certificatesDownloadCount,
            'chart' => json_encode(array_values($chart)),
        ]);
    }
}
