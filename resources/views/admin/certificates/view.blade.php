@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid">
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
                        <a download target="new"
                            href="{{ URL::to($certificate->file->getFile($certificate->certificate_no)) }}">
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
                        <iframe class="iframe" id="printable"
                            src="{{ URL::to($certificate->file->getFile($certificate->certificate_no)) }}"
                            frameborder="0"></iframe>
                        {{-- <img id="printable" src="{{ $certificate->file->getFile($certificate->certificate_no) }}"
                            class="img-fluid" alt=""> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-12 mt-4">
                <div class="card ">
                    <div class="card-body">
                        <h2>Vistor History</h2>

                        @if ($logs)
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            No:
                                        </th>
                                        <th scope="col">IP</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs->sortBy('viewed_at') as $view)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $view->ip_address }}
                                            </td>
                                            <td>
                                                {{ dd(Location::get($view->ip_address)) }}
                                            </td>
                                            <td>
                                                {{ ucfirst($view->collection) }}
                                            </td>
                                            <td>
                                                {{ Carbon\Carbon::parse($view->viewed_at)->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $logs->links() }}
                        @endif
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
        .pagination{
            justify-content: center;
        }
    </style>
@endpush
@push('footer')
    {{-- <script src="{{ asset('js/jQuery.print.js') }}"></script> --}}
    <script>
        $(function() {
            $('.print').on('click', function() {
                var iframe = document.createElement('iframe');
                // Hide the IFrame.  
                iframe.style.visibility = "hidden";
                // Define the source.  
                iframe.src = '{{ URL::to($certificate->file->getFile($certificate->certificate_no)) }}';
                // Add the IFrame to the web page.
                document.body.appendChild(iframe);
                iframe.contentWindow.focus();
                iframe.contentWindow.print(); // Print.
            });
        });
    </script>
@endpush
