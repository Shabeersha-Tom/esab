@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">

                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h1 class="pb-0">View Profile</h1>
                    <a href="{{ route('admin.users.index') }}" class="btn btn_primary">Back</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="#">Name</label>
                                <input type="text" value="{{ $user->name }}" class="form-control" id="inputEmail4"
                                    placeholder="Enter name" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="#">Email</label>
                                <input type="email" value="{{ $user->email }}" class="form-control" id="inputEmail4"
                                    placeholder="Enter email" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Role</label>
                                <input type="text"
                                    value="{{ $user->roles->count() ? $user->roles->first()->title : '' }}"
                                    class="form-control" id="inputEmail4" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Status</label>
                                <input value="{{ $user->status == 1 ? 'Enabled' : 'Disabled' }}" type="text" class="form-control"
                                    id="inputEmail4" disabled>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
