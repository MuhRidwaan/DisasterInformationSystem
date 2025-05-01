@extends('admin.main')

@section('title', 'Edit Permission | Page')

@section('content')

    <div class="page-container">

        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Edit Permission: {{ $permission->name }}</h4>
                </div>

                <form class="form-horizontal p-4" action="{{ route('admin.permissions.update', $permission->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="name" class="col-3 col-form-label">Permission Name</label>
                        <div class="col-9">
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $permission->name }}">
                        </div>
                    </div>

                    <div class="justify-content-end row">
                        <div class="col-9">
                            <a href="{{ route('admin.permissions.index') }}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
