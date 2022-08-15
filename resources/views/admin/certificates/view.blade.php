@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h1 class="pb-0 mb-0">{{ $certificate->certificate_name }}</h1>
                    {{-- <a href="#" class="btn btn_primary">Export Excel</a> --}}
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 mb-4">
                <div class="certificate_head mb-2">
                    <div class="certificate_action">
                        <a href="{{ URL::to($certificate->file->getFile($certificate->certificate_no)) }}">
                            <span class="mr-3">
                                <i class="glyph-icon simple-icon-cloud-download pr-1"></i>Download
                            </span>
                        </a> 
                        <a href="#" class="print">
                            {{-- <a href="{{ route('admin.certificates.print', $certificate) }}"> --}}
                            <span>
                                <i class="glyph-icon simple-icon-printer pr-1"></i>Print
                            </span>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <iframe class="iframe" src="{{ URL::to($certificate->file->getFile($certificate->certificate_no)) }}"
                            frameborder="0"></iframe>
                        {{-- <img id="printable" src="{{ $certificate->file->getFile($certificate->certificate_no) }}"
                            class="img-fluid" alt=""> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('header')
    <style>
        .iframe {
            width: 100%;
            height: 700px;
            border: none;
        }
    </style>
@endpush
@push('footer')
    <script src="{{ asset('js/jQuery.print.js') }}"></script>
    <script>
        $(function() {
            $('.print').on('click', function() {
                $.print("#printable");
            });
        });
    </script>
@endpush
