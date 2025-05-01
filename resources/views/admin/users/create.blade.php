@extends('admin.main')

@section('title', 'Create Data Users | Page')

@section('content')


    <div class="page-container">

        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Input Data User Form</h4>
                </div>

                <form class="form-horizontal p-4" action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Name</label>
                        <div class="col-9">
                            <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Email</label>
                        <div class="col-9">
                            <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-3 col-form-label">Password</label>
                        <div class="col-9">
                            <input type="password" class="form-control" name="password" id="inputPassword3"
                                placeholder="Password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputPassword5" class="col-3 col-form-label">Re Password</label>
                        <div class="col-9">
                            <input type="password" class="form-control" name="re_password" id="inputPassword5"
                                placeholder="Retype Password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword5" class="col-3 col-form-label">Role Access</label>
                        <div class="col-9">
                            <select class="form-control select2" name="role" data-toggle="select2">
                                <option>Select</option>
                                <option value="admin">Admin</option>
                                <option value="masyarakat">Masyarakat</option>
                                <option value="operator">Operator</option>
                                <option value="relawan">Relawan</option>
                                <option value="management">Management</option>

                            </select>
                        </div>
                    </div>

                    <div class="justify-content-end row">
                        <div class="col-9">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>


@endsection
