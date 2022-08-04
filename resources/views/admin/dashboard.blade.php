@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Dashboard</h1>
                <div class="separator mb-5"></div>
            </div>
            <div class="col-lg-12 col-xl-12">
                <div class="row mb-4">
                    <div class="col-xl-3 mb-4 mb-xl-0">
                        <a href="#" class="card">
                            <div class="card-body text-center align-items-center">
                                <img src="{{ getAdminAsset('img/no_users.svg') }}" alt="" />

                                <p class="card-text mb-0 my-2">
                                    <b>Number of <br />
                                        Users</b>
                                </p>
                                <p class="lead text-center">{{ $usersCount }}</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 mb-4 mb-xl-0">
                        <a href="#" class="card">
                            <div class="card-body text-center align-items-center">
                                <img src="{{ getAdminAsset('img/no_certificates.svg') }}" alt="" />

                                <p class="card-text mb-0 my-2">
                                    <b>Number Of <br />
                                        Certificates</b>
                                </p>
                                <p class="lead text-center">{{ $certificatesCount }}</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 mb-4 mb-xl-0">
                        <a href="#" class="card">
                            <div class="card-body text-center align-items-center">
                                <img src="{{ getAdminAsset('img/download.png') }}" alt="" />

                                <p class="card-text mb-0 my-2">
                                    <b>Number of Downloaded <br />
                                        Certificates</b>
                                </p>
                                <p class="lead text-center">{{ $certificatesDownloadCount  }}</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 mb-4 mb-xl-0">
                        <a href="#" class="card">
                            <div class="card-body text-center align-items-center">
                                <img src="{{ getAdminAsset('img/visitor.png') }}" alt="" />

                                <p class="card-text mb-0 my-2">
                                    <b>Number of Viewed <br />
                                        Certificates</b>
                                </p>
                                <p class="lead text-center">{{ $certificatesViewCount }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Certificates</h5>
                        <div class="dashboard-line-chart chart">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
