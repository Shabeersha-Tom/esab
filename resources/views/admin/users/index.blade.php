@extends('admin.layouts.app',['body_class'=>'','title'=>'Users'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Users</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-lg top-right-button mr-1">ADD NEW
                        USER</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-status />
                <x-errors />
            </div>
        </div>

        <div class="row">
            @if ($users)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No:</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">User Role</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->roles->first() ? $user->roles->first()->title : '' }}</td>
                                            <td>{{ $user->status ? "Enabled":"Disabled" }}</td>
                                            <td>
                                                <a href="{{ route('users.show', $user) }}"
                                                    class="btn btn-primary mb-1">Show</a>
                                                <a href="{{ route('users.edit', $user) }}"
                                                    class="btn btn-secondary mb-1">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('header')
@endpush
