@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h1 class="pb-0">Update Profile</h1>
                    <a href="{{ route('admin.users.index') }}" class="btn btn_primary">Back</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.update', $user) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="#">Name</label>
                                    <input type="text" name="name" class="form-control" id="inputEmail4"
                                        placeholder="Enter name" value="{{ old('name', $user->name) }}" required>
                                    <x-form.error name="name" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="#">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4"
                                        placeholder="Enter email" value="{{ old('email', $user->email) }}" required>
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
                                        <option>Select a role</option>
                                        @if ($roles->count())
                                            @foreach ($roles as $role)
                                                <option
                                                    {{ old('role', in_array($role->name, $userRoles)) == $role->name ? 'selected' : '' }}
                                                    value="{{ $role->name }}">
                                                    {{ $role->title }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Status</label>
                                    <select name="status" class="form-control">
                                        <option {{ old('status', $user->status) == 1 ? 'selected' : '' }} value="1">
                                            Enable</option>
                                        <option {{ old('status', $user->status) == 0 ? 'selected' : '' }} value="0">
                                            Disable</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="submit" value="Update" class="btn btn_primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('footer')
    <script src="{{ asset('js/vendor/select2.full.js') }}"></script>
    <script>
        $('#deleteBtn').on('click', function() {
            $confirm = confirm("Do you want to delete this user?");
            if ($confirm) {
                $('#deleteForm').submit();
            }
        });
    </script>
@endpush
