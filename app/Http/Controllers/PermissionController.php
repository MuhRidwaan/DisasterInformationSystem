<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search', '');
    
        $permissions = Permission::select('id', 'name', 'guard_name', 'created_at')->get();
    
        // Konversi ke Collection
        $collection = collect($permissions);
    
        // Filter berdasarkan pencarian nama jika ada
        if ($search) {
            $collection = $collection->filter(function ($item) use ($search) {
                return stripos($item->name, $search) !== false; // Hanya cari berdasarkan name
            })->values(); // Reset index setelah filter
        }
    
        // Ambil data sesuai halaman
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $pagedData = $collection->slice(($currentPage - 1) * $perPage, $perPage)->values();
    
        $permissionsPaginator = new LengthAwarePaginator(
            $pagedData,
            $collection->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    
        return view('admin.permissions.index', compact('permissionsPaginator', 'perPage', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
    
        Permission::create(['name' => $request->name]);
    
        return redirect()->route('admin.permissions.index')->with('success', 'Permission created successfully.');
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
        $permission = Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('permission'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id . ',id',
        ]);
    
        $permission = Permission::findOrFail($id);
        $permission->name = $request->name;
        $permission->save();
    
        return redirect()->route('admin.permissions.index')->with('success', 'Permission updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
    
        return redirect()->route('admin.permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
