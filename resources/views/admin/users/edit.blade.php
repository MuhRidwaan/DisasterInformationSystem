@extends('admin.main')

@section('title', 'Edit Data User | Page')

@section('content')
    <div class="page-container">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Edit Data User Form</h4>
                </div>

                <form class="form-horizontal p-4" action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Name</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}"
                                placeholder="Name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Email</label>
                        <div class="col-9">
                            <input type="email" class="form-control" name="email"
                                value="{{ old('email', $user->email) }}" placeholder="Email">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Password</label>
                        <div class="col-9">
                            <input type="password" class="form-control" name="password"
                                placeholder="Kosongkan jika tidak diubah">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Re Password</label>
                        <div class="col-9">
                            <input type="password" class="form-control" name="re_password" placeholder="Retype Password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Role Access</label>
                        <div class="col-9">
                            <select class="form-control select2" name="role" data-toggle="select2">
                                <option value="">Select</option>
                                @foreach (['admin', 'masyarakat', 'operator', 'relawan', 'management'] as $role)
                                    <option value="{{ $role }}" {{ $user->hasRole($role) ? 'selected' : '' }}>
                                        {{ ucfirst($role) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="justify-content-end row">
                        <div class="col-9">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
