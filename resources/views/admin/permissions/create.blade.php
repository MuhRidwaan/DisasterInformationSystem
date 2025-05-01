@extends('admin.main')

@section('title', 'Create Permission | Page')

@section('content')

    <div class="page-container">

        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Create Permission</h4>
                </div>

                <form class="form-horizontal p-4" action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <label for="name" class="col-3 col-form-label">Permission Name</label>
                        <div class="col-9">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Permission name">
                        </div>
                    </div>

                    <div class="justify-content-end row">
                        <div class="col-9">
                            <a href="{{ route('admin.permissions.index') }}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
