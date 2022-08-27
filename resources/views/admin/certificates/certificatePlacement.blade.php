@extends('admin.layouts.admin')
@section('content')
    <img style="width:1240px;height:1754px;" src="{{ $image_path }}" id="watermarked" />
    <form method="post" enctype="multipart/form-data" action="{{ route('admin.certificates.placeQr') }}">
        @csrf
        <input type="hidden" name="certificate_id" value="{{ $certificate_id }}" />
        <input type="hidden" name="file_id" value="{{ $file_id }}" />
        <input type="hidden" id="x" name="x" value="" />
        <input type="hidden" id="y" name="y" value="" />
        <input type="hidden" id="w" name="w" value="" />
        <input type="hidden" id="h" name="h" value="" />
        <input type="hidden" id="a" name="a" value="" />
        <input type="submit" class="btn btn_primary mt-2" name="save" value="Submit" />
        <input type="button" class="btn btn-danger mt-2" name="cancel" id="cancel" value="Cancel" />
    </form>

    <form id="cancelForm" method="post" action="{{ route('admin.certificates.cancel') }}">
        @csrf
        <input type="hidden" name="certificate_id" value="{{ $certificate_id }}" />
        <input type="hidden" name="file_id" value="{{ $file_id }}" />
    </form>
@endsection
@push('header')
    <style type="text/css">
        div.watermark {
            border: 1px dashed #000;
        }

        img.watermark:hover {
            cursor: move;
        }
    </style>
@endpush
@push('footer')
    <script src="{{ getAdminAsset('js/jq.js') }}"></script>
    <script src="{{ getAdminAsset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ getAdminAsset('js/watermark.min.js') }}"></script>
    <script type="text/javascript">
        //<!--
        $().ready(function() {
            $('#watermarked').Watermarker({
                watermark_img: "{{ getAdminAsset('img/qr_sample.jpg') }}",
                onChange: showCoords,
                w: '150px',
                h: '150px',
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
    <script>
        $('#cancel').on('click', function() {
            $('#cancelForm').sumbit();
        });
    </script>
@endpush
