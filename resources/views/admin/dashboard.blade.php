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
                                <p class="lead text-center">{{ $certificatesDownloadCount }}</p>
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

@push('footer')
    <script>
        var rootStyle = getComputedStyle(document.body);
        var themeColor1 = rootStyle.getPropertyValue("--theme-color-1").trim();
        var themeColor2 = rootStyle.getPropertyValue("--theme-color-2").trim();
        var themeColor3 = rootStyle.getPropertyValue("--theme-color-3").trim();
        var themeColor4 = rootStyle.getPropertyValue("--theme-color-4").trim();
        var themeColor5 = rootStyle.getPropertyValue("--theme-color-5").trim();
        var themeColor6 = rootStyle.getPropertyValue("--theme-color-6").trim();
        var themeColor1_10 = rootStyle
            .getPropertyValue("--theme-color-1-10")
            .trim();
        var themeColor2_10 = rootStyle
            .getPropertyValue("--theme-color-2-10")
            .trim();
        var themeColor3_10 = rootStyle
            .getPropertyValue("--theme-color-3-10")
            .trim();
        var themeColor4_10 = rootStyle
            .getPropertyValue("--theme-color-4-10")
            .trim();

        var themeColor5_10 = rootStyle
            .getPropertyValue("--theme-color-5-10")
            .trim();
        var themeColor6_10 = rootStyle
            .getPropertyValue("--theme-color-6-10")
            .trim();

        var primaryColor = rootStyle.getPropertyValue("--primary-color").trim();
        var foregroundColor = rootStyle
            .getPropertyValue("--foreground-color")
            .trim();
        var separatorColor = rootStyle.getPropertyValue("--separator-color").trim();


        var chartTooltip = {
            backgroundColor: foregroundColor,
            titleFontColor: primaryColor,
            borderColor: separatorColor,
            borderWidth: 0.5,
            bodyFontColor: primaryColor,
            bodySpacing: 10,
            xPadding: 15,
            yPadding: 15,
            cornerRadius: 0.15,
            displayColors: false
        };

        if (document.getElementById("salesChart")) {
            var salesChart = document.getElementById("salesChart").getContext("2d");
            var myChart = new Chart(salesChart, {
                type: "LineWithShadow",
                options: {
                    plugins: {
                        datalabels: {
                            display: false
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: true,
                                lineWidth: 1,
                                color: "rgba(0,0,0,0.1)",
                                drawBorder: false
                            },
                            ticks: {
                                beginAtZero: true,
                                stepSize: 10,
                                min: 0,
                                padding: 20
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    tooltips: chartTooltip
                },
                data: {
                    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                    datasets: [{
                        label: "",
                        // data: [54, 63, 60, 65, 60, 68, 60],
                        data: {!! $chart !!},
                        borderColor: themeColor1,
                        pointBackgroundColor: foregroundColor,
                        pointBorderColor: themeColor1,
                        pointHoverBackgroundColor: themeColor1,
                        pointHoverBorderColor: foregroundColor,
                        pointRadius: 6,
                        pointBorderWidth: 2,
                        pointHoverRadius: 8,
                        fill: false
                    }]
                }
            });
        }
    </script>
@endpush
