<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Route;

class routeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $routes = Route::all();

        return view('admin.route.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::all();

        return view('admin.route.create', compact('routes'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
        'origin' => 'required|max:255|string',
        'destination' => 'required|max:255|string',
        'price' => 'required|numeric|min:0',
       ], 
       [
        'origin.required' => 'Asal wajib diisi',
        'destination.required' => 'Tujuan wajib diisi',
        'price.required' =>  'Harga wajib diisi',
        'origin.max' => 'Kolom asal melebihi batas',
        'destination.max' => 'Kolom tujuan melebihi batas',
        'price.numeric' => 'Harga hanya boleh angka',
        'price.min' => 'Harga minimal harus 0'
       ]);


      Route::create($validatedData);

      return redirect()->route('routes.index')->with('success', 'Rute berhasil ditambahkan');


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
        
        $route = Route::findOrfail($id);

        return view('admin.route.edit', compact('route'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
               $validatedData = $request->validate([
        'origin' => 'required|max:255|string',
        'destination' => 'required|max:255|string',
        'price' => 'required|numeric|min:0',
       ], 
       [
        'origin.required' => 'Asal wajib diisi',
        'destination.required' => 'Tujuan wajib diisi',
        'price.required' =>  'Harga wajib diisi',
        'origin.max' => 'Kolom asal melebihi batas',
        'destination.max' => 'Kolom tujuan melebihi batas',
        'price.numeric' => 'Harga hanya boleh angka',
        'price.min' => 'Harga minimal harus 0'
       ]);

      
       $route = Route::FindOrfail($id);
       $route->update($validatedData);

       return redirect()->route('routes.index')->with('success', 'Rute berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $route = Route::FindOrfail($id);
        $route->delete();

        return redirect()->route('routes.index')->with('success', 'Rute berhasil dihapus');
    }
}
