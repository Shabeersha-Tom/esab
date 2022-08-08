<form id="mainForm" method="POST" action="{{ route('admin.certificates.uploadmanual') }}">
    @csrf
    <input type="hidden" id="file_id" name="file_id">
    <x-form.error name="file_error" />
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputPassword4">Certificate Title</label>
            <input type="text" class="form-control" name="title" id="inputEmail4"
                placeholder="Enter title" value="{{ old('name') }}" required />
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputPassword4">Certificate Number</label>
            <input type="number" class="form-control" name="cer_number" id="inputEmail4"
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