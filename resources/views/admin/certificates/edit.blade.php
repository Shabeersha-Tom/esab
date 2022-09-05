@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit Certificate</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-6 mb-4 mb-xl-0">
                <div class="card drop-area">
                    <div class="card-body">
                        <form id="mainForm" method="POST" action="{{ route('admin.certificates.edit', $certificate) }}">
                            @csrf
                            <x-form.error name="file_error" />
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Certificate Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter title" value="{{ old('name', $certificate->certificate_name) }}"
                                        required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Certificate Number</label>
                                    <input type="number" class="form-control" name="cer_number" id="cer_number"
                                        placeholder="Enter number"
                                        value="{{ old('cer_number', $certificate->certificate_no) }}" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Test</label>
                                    <input type="text" class="form-control" name="test"
                                        value="{{ old('test', $certificate->test) }}" id="test"
                                        placeholder="Enter Test" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Item 1</label>
                                    <input type="text" class="form-control" name="item_1" id="item_1"
                                        placeholder="Enter Item 1" value="{{ old('item_1', $certificate->item_1) }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Item 2</label>
                                    <input type="text" class="form-control" name="item_2" id="item_2"
                                        placeholder="Enter Item 2" value="{{ old('item_2', $certificate->item_2) }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Lot 1</label>
                                    <input type="text" class="form-control" name="lot_1" id="lot_1"
                                        placeholder="Enter Lot 1" value="{{ old('lot_1', $certificate->lot_1) }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Lot 2</label>
                                    <input type="text" class="form-control" name="lot_2" id="lot_2"
                                        placeholder="Enter Lot 2" value="{{ old('lot_2', $certificate->lot_2) }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Status</label>
                                    <select class="form-control" name="status" id="">
                                        <option value="1" {{ $certificate->status == 1 ? 'selected' : '' }}>Enabled
                                        </option>
                                        <option value="0" {{ $certificate->status == 0 ? 'selected' : '' }}>Disabled
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <input type="submit" name="update" class="btn btn_primary mt-4" value="Save data only"
                                    id="formSubmit">
                                <input type="submit" name="editcertificate" class="btn btn_primary mt-4"
                                    value="Save and edit certificate" id="formSubmit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header')
    <style>
        label.error {
            padding: 5px 0;
            color: #f00;
            margin: 0;
            font-size: 15px;
        }
    </style>
@endpush

@push('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#mainForm").validate({
            rules: {
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
                            },
                            current_id: "{{ $certificate->id }}",
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
        $('#cer_number, #test, #item_1, #item_2, #lot_1, #lot_2').change(function() {
            $title = "";
            $title += $('#cer_number').val() ? $('#cer_number').val() + '_' : "";
            $title += $('#test').val() ? $('#test').val() + '_' : "";
            $title += $('#item_1').val() ? $('#item_1').val() + '_' : "";
            $title += $('#lot_1').val() ? $('#lot_1').val() + '_' : "";
            $title += $('#item_2').val() ? $('#item_2').val() + '_' : "";
            $title += $('#lot_2').val() ? $('#lot_2').val() : "";

            $title = trimChar($title, '_');

            $('#title').val($title);

        });

        function trimChar(string, charToRemove) {
            while (string.charAt(0) == charToRemove) {
                string = string.substring(1);
            }

            while (string.charAt(string.length - 1) == charToRemove) {
                string = string.substring(0, string.length - 1);
            }

            return string;
        }
    </script>
@endpush
