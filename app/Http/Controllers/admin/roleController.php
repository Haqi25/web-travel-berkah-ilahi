<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;


class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
             $roles = Role::all();



        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'role_name' => 'string|max:255|required|unique:roles,role_name',
            'description' => 'string|max:255|required'
        ],
          [
        'role_name.required' => 'Nama Role wajib diisi',
        'role_name.unique' => 'Nama Role sudah ada',
        'description.string' => 'Deskripsi Harus bertipe string'
       ]
    );


        $role = Role::create($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role telah dibuat');
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

        $role = Role::findOrfail($id);
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'role_name' => 'string|max:255|unique:roles,role_name',
            'description' => 'string|max:255|required'
        ],
         [
            'role_name.required' => 'Nama Role wajib diisi',
            'role_name.unique' => 'Nama Role harus berbeda',
            'description.required' => 'Deskripsi wajib diisi',
            'description.max' => 'Kolom deskripsi tidak boleh lebih dari 255 karakter'
         ],
        );

        $role = Role::findOrfail($id);
        $role->update($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->delete($id);

      return redirect()->route('roles.index')->with('success', 'Role telah dihapus');

    }
}

