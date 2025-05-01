@extends('admin.main')

@section('title', 'Permissions | Page')

@section('content')

    <div class="page-container">

        {{-- Card --}}
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Permissions</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary m-2 rounded-pill">Add
                        Permission</a>
                </div>

                <div class="card-body">
                    <form method="GET" class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" name="search" value="{{ $search }}" class="form-control"
                                placeholder="Cari nama permission...">
                        </div>
                        <div class="col-md-2">
                            <select name="per_page" onchange="this.form.submit()" class="form-select">
                                @foreach ([10, 25, 50, 100] as $size)
                                    <option value="{{ $size }}" {{ $perPage == $size ? 'selected' : '' }}>
                                        {{ $size }} / halaman
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Cari</button>
                        </div>
                    </form>

                    <div class="table-responsive-sm">
                        <table class="table table-dark table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Permission Name</th>

                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissionsPaginator as $i => $perm)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $perm->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.permissions.edit', $perm->id) }}"
                                                class="btn btn-warning btn-sm rounded-pill">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.permissions.destroy', $perm->id) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin mau hapus {{ $perm->name }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm rounded-pill">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3 d-flex justify-content-center">
                            {{ $permissionsPaginator->links() }}
                        </div>
                    </div>
                </div>

            </div> <!-- end card body-->
        </div> <!-- end card -->

    </div>
    <!-- container -->

@endsection
