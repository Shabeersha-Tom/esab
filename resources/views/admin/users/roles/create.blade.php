@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h1 class="pb-0">Create Admin Roles</h1>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn_primary">Back</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12 col-md-12 mb-4">
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Role Name</label>
                                    <input name="role_name" value="{{ old('role_name') }}" autocomplete="off" type="text"
                                        class="form-control" id="inputEmail4" placeholder="Enter role name">
                                    <x-form.error name="role_name" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3"><b>Admin Role</b></h5>
                            <div class="form-group mb-0 form-check-inline position-relative flex-wrap">
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="role_list"
                                        name="ability[admin-role-list]">
                                    <label class="custom-control-label" for="role_list">List View</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="role_view"
                                        name="ability[admin-role-view]">
                                    <label class="custom-control-label" for="role_view">Details View</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="role_add"
                                        name="ability[admin-role-add]">
                                    <label class="custom-control-label" for="role_add">Add</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="role_edit"
                                        name="ability[admin-role-edit]">
                                    <label class="custom-control-label" for="role_edit">Edit</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="role_delete"
                                        name="ability[admin-role-delete]">
                                    <label class="custom-control-label" for="role_delete">Delete</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3"><b>Admin Users</b></h5>
                            <div class="form-group mb-0 form-check-inline position-relative flex-wrap">
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="user_list"
                                        name="ability[admin-user-list]">
                                    <label class="custom-control-label" for="user_list">List View</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="user_view"
                                        name="ability[admin-user-view]">
                                    <label class="custom-control-label" for="user_view">Details View</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="user_add"
                                        name="ability[admin-user-add]">
                                    <label class="custom-control-label" for="user_add">Add</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="user_edit"
                                        name="ability[admin-user-edit]">
                                    <label class="custom-control-label" for="user_edit">Edit</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="user_delete"
                                        name="ability[admin-user-delete]">
                                    <label class="custom-control-label" for="user_delete">Delete</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3"><b>Certificates</b></h5>
                            <div class="form-group mb-0 form-check-inline position-relative flex-wrap">
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="ability[certificates-list]"
                                        name="certificate_list">
                                    <label class="custom-control-label" for="certificate_list">List View</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="certificate_view"
                                        name="ability[certificates-view]">
                                    <label class="custom-control-label" for="certificate_view">Details View</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="certificate_add"
                                        name="ability[certificates-add]">
                                    <label class="custom-control-label" for="certificate_add">Add</label>
                                </div>
                                <div class="custom-control custom-checkbox form-check-inline mb-2">
                                    <input type="checkbox" class="custom-control-input" id="certificate_delete"
                                        name="ability[certificates-delete]">
                                    <label class="custom-control-label" for="certificate_delete">Delete</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <input type="submit" value="Create" class="btn btn_primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
