@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Upload Certificate (Auto)</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-6 mb-4 mb-xl-0">
                <div class="card drop-area">
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">QR Code Position</label>
                                    <select class="form-control">
                                        <option value="1">
                                            Top Left
                                        </option>
                                        <option value="2">
                                            Top Right
                                        </option>
                                        <option value="3">
                                            Bottom Left
                                        </option>
                                        <option value="3">
                                            Bottom Right
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Certificate Title</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Enter title" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Certificate Number</label>
                                    <input type="email" class="form-control" id="inputEmail4"
                                        placeholder="Enter number" />
                                </div>
                            </div>
                        </form>
                        <div class="dropzone dz-clickable upload_certificate">
                            <div class="dz-default dz-message">
                                <span class="glyph-icon simple-icon-cloud-upload d-block"></span>
                                <span>Drop files here to upload</span>
                            </div>
                        </div>
                        <a href="certificate_view.html" class="btn w-100 btn_primary mt-4">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header')
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/dropzone.min.css') }}" />
    <style>
        .dropzone .dz-preview.dz-file-preview,
        .dropzone .dz-preview.dz-image-preview {
            width: 260px;
            height: 60px;
            min-height: unset;
            border: 1px solid #d7d7d7 !important;
            border-radius: 0.1rem !important;
            background: #fff !important;
            color: #3a3a3a !important;
        }

        .dz-remove {
            display: none !important;
        }
    </style>
    <script src="{{ getAdminAsset('js/vendor/dropzone.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            Dropzone.autoDiscover = false;
            $(".dropzone").dropzone({
                url: "{{ route('admin.certificates.uploadFile') }}",
                parallelUploads: 1,
                maxFiles: 1,
                addRemoveLinks: true,
                thumbnailWidth: 160,
                previewTemplate: '<div class="dz-preview dz-file-preview mb-3"><div class="d-flex flex-row "><div class="p-0 w-30 position-relative"><div class="dz-error-mark"><span><i></i></span></div><div class="dz-success-mark"><span><i></i></span></div><div class="preview-container"><img data-dz-thumbnail class="img-thumbnail border-0" /><i class="simple-icon-doc preview-icon" ></i></div></div><div class="pl-3 pt-2 pr-2 pb-1 w-70 dz-details position-relative"><div><span data-dz-name></span></div><div class="text-primary text-extra-small" data-dz-size /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div><a href="#/" class="remove" data-dz-remove><i class="glyph-icon simple-icon-trash"></i></a></div>',
            });
        });
    </script>
@endpush

@push('footer')
@endpush
