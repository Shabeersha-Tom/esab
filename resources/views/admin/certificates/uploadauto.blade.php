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
                        <form id="mainForm" method="POST" action="{{ route('admin.certificates.uploadauto') }}">
                            @csrf
                            <input type="hidden" id="file_id" name="file_id">
                            <x-form.error name="file_error" />
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">QR Code Position</label>
                                    <select name="position" id="position" class="form-control">
                                        <option {{ old('position') == 'top_left' ? 'selected' : '' }} value="top_left">
                                            Top Left
                                        </option>
                                        <option {{ old('position') == 'top_right' ? 'selected' : '' }} value="top_right">
                                            Top Right
                                        </option>
                                        <option {{ old('position') == 'bottom_left' ? 'selected' : '' }}
                                            value="bottom_left">
                                            Bottom Left
                                        </option>
                                        <option {{ old('position') == 'bottom_right' ? 'selected' : '' }}
                                            value="bottom_right">
                                            Bottom Right
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Certificate Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter title" value="{{ old('name') }}" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Certificate Number</label>
                                    <input type="number" class="form-control" name="cer_number" id="cer_number"
                                        placeholder="Enter number" value="{{ old('cer_number') }}" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Test</label>
                                    <input type="text" class="form-control" name="test" value="{{ old('test') }}"
                                        id="inputEmail4" placeholder="Enter Test" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Item 1</label>
                                    <input type="text" class="form-control" name="item_1" id="inputEmail4"
                                        placeholder="Enter Item 1" value="{{ old('item_1') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Item 2</label>
                                    <input type="text" class="form-control" name="item_2" id="inputEmail4"
                                        placeholder="Enter Item 2" value="{{ old('item_2') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Lot 1</label>
                                    <input type="text" class="form-control" name="lot_1" id="inputEmail4"
                                        placeholder="Enter Lot 1" value="{{ old('lot_1') }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Lot 2</label>
                                    <input type="text" class="form-control" name="lot_2" id="inputEmail4"
                                        placeholder="Enter Lot 2" value="{{ old('lot_2') }}" />
                                </div>
                            </div>
                        </form>
                        <div class="dropzone dz-clickable upload_certificate">
                            <div class="dz-default dz-message">
                                <span class="glyph-icon simple-icon-cloud-upload d-block"></span>
                                <span>Drop files here to upload</span>
                            </div>
                        </div>
                        <input type="button" class="btn w-100 btn_primary mt-4" value="Submit" id="formSubmit">
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

        .dropzone .dz-preview.dz-complete .dz-success-mark {
            -webkit-animation: slide-in 3s ease-in;
            -moz-animation: slide-in 3s ease-in;
            -ms-animation: slide-in 3s ease-in;
            -o-animation: slide-in 3s ease-in;
            animation: slide-in 3s ease-in;
        }

        label.error {
            padding: 5px 0;
            color: #f00;
            margin: 0;
            font-size: 15px;
        }
    </style>
    <script src="{{ getAdminAsset('js/vendor/dropzone.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            Dropzone.autoDiscover = false;
            $(".dropzone").dropzone({
                url: "{{ route('admin.certificates.uploadFile') }}",
                parallelUploads: 1,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".pdf",
                maxFiles: 1,
                addRemoveLinks: true,
                thumbnailWidth: 160,
                previewTemplate: '<div class="dz-preview dz-file-preview mb-3"><div class="d-flex flex-row "><div class="p-0 w-30 position-relative"><div class="dz-error-mark"><span><i></i></span></div><div class="dz-success-mark"><span><i></i></span></div><div class="preview-container"><img data-dz-thumbnail class="img-thumbnail border-0" /><i class="simple-icon-doc preview-icon" ></i></div></div><div class="pl-3 pt-2 pr-2 pb-1 w-70 dz-details position-relative"><div><span data-dz-name></span></div><div class="text-primary text-extra-small" data-dz-size /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div><a href="#/" class="remove" data-dz-remove><i class="glyph-icon simple-icon-trash"></i></a></div>',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(file, response) {
                    $('#file_id').val(response.success);
                },
                error: function(file, response) {
                    alert(
                        'There was an error uploading the file, please refresh the page and try again'
                    );
                }
            });
        });
    </script>
@endpush

@push('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#mainForm").validate({
            rules: {
                position: {
                    required: true,
                },
                title: {
                    required: true,
                },
                cer_number: {
                    required: true,
                    remote: {
                        url: "{{ route('admin.certificates.checkNumber') }}",
                        type: "post",
                        data: {
                            _token: "{{ csrf_token() }}",
                            cer_number: function() {
                                return $("#cer_number").val();
                            }
                        },
                        dataType: 'json'
                    }
                },
            },
            messages: {
                position: "Please enter a position",
                title: "Please enter certificate name",
                cer_number: {
                    required: "Please enter certificate number",
                    remote: "This certificate already exist",
                },
            }
        });
    </script>
    <script>
        $('#formSubmit').on('click', function() {
            if (!$('#file_id').val()) {
                alert('Please upload a file first');
                return false;
            } else {
                $('#mainForm').submit();
            }
        });
    </script>
@endpush
