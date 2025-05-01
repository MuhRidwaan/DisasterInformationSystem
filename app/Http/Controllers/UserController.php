<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');
    $perPage = $request->input('per_page', 10); // default 10
    $currentPage = LengthAwarePaginator::resolveCurrentPage();

    // Ambil semua data
    $data = DB::select("
        SELECT u.*, r.name as role_name
        FROM users u
        JOIN model_has_roles mhr ON mhr.model_id = u.id
        JOIN roles r ON r.id = mhr.role_id
    ");

    // Konversi ke Collection untuk filter dan paginate
    $collection = collect($data);

    // 🔍 Filter searching (by name atau email)
    if ($search) {
        $collection = $collection->filter(function ($item) use ($search) {
            return stripos($item->name, $search) !== false ||
                   stripos($item->email, $search) !== false;
        })->values(); // reset index
    }

    // Paginate manual
    $pagedData = $collection->slice(($currentPage - 1) * $perPage, $perPage)->values();
    $users = new LengthAwarePaginator(
        $pagedData,
        $collection->count(),
        $perPage,
        $currentPage,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    return view('admin.users.index', compact('users', 'search', 'perPage'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|min:6|same:re_password',
            're_password' => 'required',
            'role'        => 'required|exists:roles,name',
        ]);

        // Buat user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign role (Spatie)
        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'User berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
    
        // Validasi dasar
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|same:re_password',
            'role' => 'required|string|exists:roles,name'
        ]);
    
        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
    
        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        // Update role
        $user->syncRoles([$request->role]);
    
        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('admin.users.index')
                         ->with('success', 'User berhasil dihapus.');
    }
}
