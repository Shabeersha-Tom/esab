@extends('admin.layouts.app', ['body_class' => 'nav-md'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Create User</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />
                <x-errors />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" autocomplete="name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">User Role</label>
                                <select name="role" class="form-control select2-single mb-3">
                                    @foreach ($roles as $role)
                                        <option {{ old('role') == $role->name ? 'selected' : '' }}
                                            value="{{ $role->name }}">{{ $role->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">User Abilities</label>
                                <select name="ability[]" class="form-control select2-multiple mb-3" multiple required>
                                    @foreach ($abilities as $ability)
                                        <option value="{{ $ability->name }}">{{ $ability->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status') == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status') == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
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


            </div>
        </div>
    </div>
@endsection


@push('header')
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css') }}" />
@endpush
@push('footer')
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
@endpush
