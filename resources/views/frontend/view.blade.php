<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ESAB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-float-label.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dore.light.blue.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
</head>

<body class="background show-spinner no-footer rounded">
    <nav class="navbar">
        <a class="navbar-logo m-auto" href="#">
            <span class="logo d-block"></span>
        </a>
    </nav>
    <main>
        <div class="container certificate_viwe_page">
            <div class="my-3 d-flex align-items-center justify-content-between">
                <h2 class="pb-0 mb-0">Certificates</h3>
                    <div class="certificate_action ml-auto pr-4">
                        <a href="{{ route('certificate.download', $certificate->slug) }}">
                            <span class="mr-2"> <i class="glyph-icon simple-icon-cloud-download pr-1"></i>Download
                            </span>
                        </a>
                        <a href="#" class="print">
                            <span> <i class="glyph-icon simple-icon-printer pr-1"></i>Print</span>
                        </a>
                    </div>
            </div>
            <div class="separator mb-5"></div>
            <div class="row h-100 mt-2">
                <div class="col-12 col-xl-12">
                    <div class="card mb-3 p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="certificate_card  border ">
                                    <img id="printable"
                                        src="{{ $certificate->file->getFile($certificate->certificate_no) }}"
                                        class="img-fluid rounded-start" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="data_card">
                                    <p><b>{{ $certificate->certificate_name }} </b></p>
                                    <p><b>Lot 1: </b> {{ $certificate->lot_1 }}</p>
                                    <p><b>Lot 2: </b> {{ $certificate->lot_2 }}</p>
                                    <p><b>Item 1: </b> {{ $certificate->item_1 }}</p>
                                    <p><b>Item 2: </b> {{ $certificate->item_2 }}</p>
                                    <p><b>Certificate No : </b> {{ $certificate->certificate_no }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dore.script.js') }}"></script>
    <script src="{{ asset('js/scripts.single.theme.js') }}"></script>
    <script src="{{ asset('js/jQuery.print.js') }}"></script>
    <script>
        $(function() {
            $('.print').on('click', function() {
                $.print("#printable");
            });
        });
    </script>
</body>

</html>
