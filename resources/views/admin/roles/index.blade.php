@extends('admin.main')

@section('title', 'Data Roles | Page')

@section('content')

    <div class="page-container">

        {{-- Card --}}
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Data Roles</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary m-2 rounded-pill">Add Role</a>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-dark table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                {{-- <th>Permissions</th> --}}
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $idx => $role)
                                <tr>
                                    <td>{{ $idx + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    {{-- <td>
                                        @foreach ($role->permissions as $permission)
                                            <span class="badge bg-info">{{ $permission->name }}</span>
                                        @endforeach
                                    </td> --}}
                                    <td class="text-center">
                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                            class="btn btn-warning btn-sm rounded-pill">
                                            Edit
                                        </a>
                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                            class="btn btn-info btn-sm rounded-pill">
                                            Detail
                                        </a>
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin mau hapus role {{ $role->name }}?')">
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
                                    <td colspan="4" class="text-center">Tidak ada role.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->

    </div> <!-- container -->

@endsection
