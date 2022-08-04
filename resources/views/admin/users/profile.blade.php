@extends('admin.layouts.admin',['body_class'=>'nav-md'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit Profile</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-form.status />
                {{-- <x-errors /> --}}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.user.profile-update') }}">
                            @csrf
                            @method('PUT')
                            <h5>Edit Details</h5>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" disabled id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" autocomplete="name" class="form-control"
                                    value="{{ auth()->user()->name }}">
                            </div>
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.user.password-update') }}">
                            @method('PUT')
                            @csrf
                            <h5>Reset Password</h5>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Current Password</label>
                                <input type="password" name="current_password" class="form-control"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Comfirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5>Security</h5>
                        <h6>Log Out Everywhere Else</h6>
                        <form method="POST" action="{{ route('admin.user.logout-everywhere') }}">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-danger mb-0">Log Out</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
