<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>ESAB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="color-scheme" content="only light" />

    <link rel="stylesheet" href="{{ getAdminAsset('font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('font/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/fullcalendar.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/datatables.responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/bootstrap-stars.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/bootstrap-datepicker3.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/component-custom-switch.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/dore.light.blue.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/main.css') }}" />
    <link rel="shortcut icon" href="{{ getAdminAsset('img/favicon.ico') }}" />
    <script src="{{ getAdminAsset('js/vendor/jquery-3.3.1.min.js') }}"></script>

    @stack('header')

</head>

<body id="app-container" class="menu-default show-spinner rounded">

    {{-- Header --}}
    @include('admin.parts.header')

    {{-- Sidenav --}}
    <x-admin.sidebar />

    {{-- Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('admin.parts.footer')

    <script src="{{ getAdminAsset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/Chart.bundle.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/chartjs-plugin-datalabels.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/moment.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/fullcalendar.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/datatables.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/owl.carousel.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/progressbar.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/jquery.barrating.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/nouislider.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/bootstrap-datepicker.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/Sortable.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/mousetrap.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/dore.script.js') }}"></script>
    <script src="{{ getAdminAsset('js/scripts.single.theme.js') }}"></script>


    @stack('footer')

    {{-- Logout Form Start --}}
    <form action="{{ route('logout') }}" method="post" id="logoutForm">
        @csrf
    </form>
    {{-- Logout Form End --}}

</body>

</html>
