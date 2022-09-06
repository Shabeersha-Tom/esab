@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <h1>Search Certificate</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card search_certificates">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.certificates.search') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input autofocus name="q" required type="text" class="form-control"
                                        id="inputEmail4" placeholder="Search certificate no / test / item / lot ">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <input type="submit" value="Search" class="btn btn_primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
