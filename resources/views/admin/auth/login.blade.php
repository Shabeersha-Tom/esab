@extends('admin.auth.layout.auth')
@section('content')
    <div class="container">
        <div class="row h-100">
            <div class="col-12 col-md-4 mx-auto my-auto">
                <div class="card auth-card">
                    <div class="form-side">
                        <h6 class="mb-1">admin login</h6>
                        <p>
                            If you have an ESAB Login account, please
                            log in below.
                        </p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label class="form-group has-float-label mb-4">
                                <input name="email" type="email" autocomplete="email" class="form-control" />
                                <span>E-mail</span>
                                <x-form.error name="email"/>
                            </label>
                            <label class="form-group has-float-label mb-4">
                                <input  name="password" autocomplete="password" class="form-control" type="password"
                                    placeholder="" />
                                <span>Password</span>
                            </label>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary btn-lg btn_primary">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
