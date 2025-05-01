@extends('admin.main')

@section('title', 'Dashboard | Page')

@section('content')


    <div class="page-container">


        {{-- Card --}}
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Data Users</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive-sm">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary m-2 rounded-pill">Add Data</a>
                    </div>

                    <form method="GET" class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Cari nama atau email...">
                        </div>
                        <div class="col-md-2">
                            <select name="per_page" onchange="this.form.submit()" class="form-control">
                                @foreach ([10, 25, 50, 100] as $size)
                                    <option value="{{ $size }}" {{ $perPage == $size ? 'selected' : '' }}>
                                        {{ $size }} per halaman
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                    <table class="table table-dark table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $idx => $user)
                                <tr>
                                    <td>{{ $idx + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $user->role_name }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-warning btn-sm rounded-pill">
                                            Edit
                                        </a>
                                        {{-- <a href="#" class="btn btn-info btn-sm rounded-pill">
                                            detail
                                        </a> --}}
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin mau hapus {{ $user->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-pill">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada user.</td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>

                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->

    </div>
    <!-- container -->


@endsection
