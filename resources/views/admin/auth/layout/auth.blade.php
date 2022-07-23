<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>ESAB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="{{ getAdminAsset('font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('font/simple-line-icons/css/simple-line-icons.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/bootstrap-float-label.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/dore.light.blue.min.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ getAdminAsset('css/main.css') }}" />
    <link rel="shortcut icon" href="{{ getAdminAsset('img/favicon.ico') }}" />
</head>

<body class="background show-spinner no-footer rounded">
    <nav class="navbar fixed-top">
        <div class="container">
            <a class="navbar-logo m-auto" href="#">
                <span class="logo d-block"></span>
            </a>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <script src="{{ getAdminAsset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/dore.script.js') }}"></script>
    {{-- <script src="{{ getAdminAsset('js/scripts.js') }}"></script> --}}
    <script src="{{ getAdminAsset('js/scripts.single.theme.js') }}"></script>
</body>

</html>
