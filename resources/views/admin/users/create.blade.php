@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">

                <div class="mb-0">
                    <h1>Add Admin User</h1>
                    <div class="text-zero top-right-button-container">
                        <!--<a href="admin_users.html" class="btn btn-primary btn-lg top-right-button btn_primary">Back</a>-->
                    </div>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card mb-4">
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.users.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="#">Name</label>
                                    <input type="text" name="name" class="form-control" id="inputEmail4"
                                        placeholder="Enter name" value="{{ old('name') }}" required autofocus>
                                    <x-form.error name="name" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="#">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4"
                                        placeholder="Enter email" value="{{ old('email') }}" required>
                                    <x-form.error name="email" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="#">Password</label>
                                    <input type="password" name="password" class="form-control" id="inputEmail4"
                                        placeholder="Enter password">
                                    <x-form.error name="password" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="#">Confirm Password </label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="inputEmail4" placeholder="Enter confirm password">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Role</label>
                                    <select name="role" class="form-control">
                                        @if ($roles->count())
                                            @foreach ($roles as $role)
                                                <option {{ old('role') == $role->name ? 'selected' : '' }} value="{{ $role->name }}">
                                                    {{ $role->title }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Status</label>
                                    <select name="status" class="form-control">
                                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Enable</option>
                                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Disable</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="submit" class="btn btn-primary d-block mt-2 btn_primary" value="Create">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
