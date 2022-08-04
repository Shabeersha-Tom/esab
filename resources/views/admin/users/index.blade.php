@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h1 class="pb-0">Admin Users</h1>
                    <a href="{{ route('admin.users.create') }}" class="btn btn_primary">ADD</a>
                </div>

                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row list disable-text-selection" data-check-all="checkAll">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        @if ($users->count())
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#No</th>
                                            <th scope="col" class="w-50 text-center">
                                                User Name
                                            </th>
                                            <th scope="col" class=" text-center">
                                                Role Name
                                            </th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td class="text-center">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $user->roles->count() ? $user->roles->first()->title : '' }}
                                                </td>
                                                <td>
                                                    @if ($user->roles->count() ? $user->isNotA('superadmin') : true)
                                                        <ul class="action_list">
                                                            <li>
                                                                <a class="pr-4"
                                                                    href="{{ route('admin.users.show', $user) }}">
                                                                    <img src="{{ getAdminAsset('img/view.png') }}"
                                                                        width="20" class="img-fluid" alt="View">
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="pr-4"
                                                                    href="{{ route('admin.users.edit', $user) }}">
                                                                    <img src="{{ getAdminAsset('img/pencil.png') }}"
                                                                        width="20" class="img-fluid" alt="Edit">
                                                                </a>
                                                            </li>
                                                            <li style="margin-bottom: 5px;">
                                                                <form action="{{ route('admin.users.destroy', $user) }}"
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
                            <h3 class="text-center">No Users Found</h3>
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
