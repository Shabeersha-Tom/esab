@extends('admin.layouts.admin')
@section('content')
    {{-- <img class="w-100" src="{{ getAdminAsset('img/certificate.png') }}" id="watermarked" /> --}}

    <form method="post" enctype="multipart/form-data" action="{{ route('admin.test') }}">
        @csrf
        <input type="file" name="file" id="">
        <input type="submit" value="Submit">
    </form>
@endsection
@push('header')
@endpush
@push('footer')
    <script src="{{ getAdminAsset('js/jq.js') }}"></script>
    <script src="{{ getAdminAsset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/watermark.min.js') }}"></script>
    <script type="text/javascript">
        //<!--
        $().ready(function() {
            $('#watermarked').Watermarker({
                watermark_img: "{{ getAdminAsset('img/cloud-computing.png') }}",
                onChange: showCoords,
                w: '120px',
                h: '120px',
                y: 0,
                x: 0,
            });
        });

        function showCoords(c) {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };
        //-->
    </script>
    <style type="text/css">
        div.watermark {
            border: 1px dashed #000;
        }

        img.watermark:hover {
            cursor: move;
        }
    </style>
@endpush
