@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <h1>Upload Certificate (Auto)</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-6 mb-4 mb-xl-0">
                <div class="card drop-area ">
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">QR Code Position</label>
                                    <select class="form-control">
                                        <option value="1">Top Left</option>
                                        <option value="2">Top Right</option>
                                        <option value="3">Bottom Left</option>
                                        <option value="3">Bottom Right</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Certificate Title</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Certificate Number</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Enter number">
                                </div>
                            </div>
                        </form>
                        <form action="/file-upload">
                            <div class="dropzone dz-clickable upload_certificate">
                                <div class="dz-default dz-message">

                                    <span class="glyph-icon simple-icon-cloud-upload d-block"></span> <span>Drop files here
                                        to upload</span>
                                </div>
                            </div>
                        </form>
                        <a href="certificate_view.html" class="btn w-100 btn_primary mt-4">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header')
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/dropzone.min.css') }}" />
@endpush

@push('footer')
    <script src="{{ getAdminAsset('js/vendor/dropzone.min.js') }}"></script>
@endpush
