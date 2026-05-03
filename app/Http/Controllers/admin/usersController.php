<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $users = User::with('role') 
        ->whereHas('role', function($query) {
            $query->whereNotIn('role_name',  ['admin', 'penumpang']); 
        })
        ->orderBy('name')
        ->get();

   
    return view('admin.user.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $roles = Role::all();

        return view('admin.user.create', compact('roles'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate(
        [
            'name' => 'string|max:255|required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:255|unique:users,phone',
            'role_id' => 'required|exists:roles,id',
            'license_number' => 'nullable|string|max:255'
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah dipakai',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Ketidakcocokan dengan password',
            'phone.required' => 'Nomor telepon wajib diisi',
            'phone.unique' => 'Nomor telepon sudah dipakai'
        ]
    );

    DB::transaction(function () use ($validatedData) {

       
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);

      
        if ($user->role_id == 3) { 
            Driver::create([
                'user_id' => $user->id,
                'license_number' => $validatedData['license_number'] ?? null,
            ]);
        }
    });

    return redirect()->route('users.index')->with('success', 'User telah dibuat');
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
        $roles = Role::all();
        $drivers = Driver::with(['user'])->get();
       return view('admin.user.edit', compact('user', 'roles', 'drivers'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
        'phone' => 'required|string|max:255|unique:users,phone,' . $user->id,
        'role_id' => 'required|exists:roles,id',
        'license_number' => 'nullable|string|max:255'
    ]);

    DB::transaction(function () use ($validatedData, $user) {

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->role_id = $validatedData['role_id'];

        if (!empty($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

      
        if ($user->role->role_name === 'driver') {

           
            if ($user->driver) {
                $user->driver->update([
                    'license_number' => $validatedData['license_number'] ?? null,
                ]);
            } else {
               
                Driver::create([
                    'user_id' => $user->id,
                    'license_number' => $validatedData['license_number'] ?? null,
                ]);
            }

        } else {
            
            if ($user->driver) {
                $user->driver->delete(); 
            }
        }

    });

    return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User telah dihapus');
    }
}
