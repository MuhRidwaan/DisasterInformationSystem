@extends('admin.main')

@section('title', 'Create Role | Page')

@section('content')

    <div class="page-container">

        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Create Role</h4>
                </div>

                <form class="form-horizontal p-4" action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-3 col-form-label">Role Name</label>
                        <div class="col-9">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Role name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Permissions</label>
                        <div class="col-9">
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                        class="form-check-input" id="perm_{{ $permission->id }}">
                                    <label class="form-check-label" for="perm_{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="justify-content-end row">
                        <div class="col-9">
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
