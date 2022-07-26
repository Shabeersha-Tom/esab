@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h1 class="pb-0">Admin Roles</h1>
                    <a href="{{ route('admin.roles.create') }}" class="btn btn_primary">Add</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <x-form.status />
            </div>
        </div>

        <div class="row list disable-text-selection" data-check-all="checkAll">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        @if ($roles->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#No</th>
                                            <th scope="col" class=" text-center">Role Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td class="text-center">{{ ucfirst($role->title) }}</td>
                                                <td>
                                                    @if ($role->name !== 'superadmin')
                                                        <ul class="action_list">
                                                            <li>
                                                                <a class="pr-4"
                                                                    href="{{ route('admin.roles.show', $role) }}">
                                                                    <img src="{{ getAdminAsset('img/view.png') }}"
                                                                        width="20" class="img-fluid" alt="View">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="pr-4"
                                                                    href="{{ route('admin.roles.edit', $role) }}">
                                                                    <img src="{{ getAdminAsset('img/pencil.png') }}"
                                                                        width="20" class="img-fluid" alt="Edit">
                                                                </a>
                                                            </li>
                                                            <li style="margin-bottom: 5px;">
                                                                <form action="{{ route('admin.roles.destroy', $role) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="p-0 border-0" type="submit">
                                                                        <img src="{{ getAdminAsset('img/delete.png') }}"
                                                                            width="22" class="img-fluid" alt="Delete">
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h3 class="text-center">No data yet.</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('header')
    <style>
        .action_list {
            gap: 0;
        }
    </style>
@endpush
