<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
class vehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();

        return view('admin.vehicle.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
         $vehicles = Vehicle::all();

        return view('admin.vehicle.create', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255|unique:vehicles,plate_number',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'seat_layout' => 'required|max:255',
            'capacity' => 'required|integer|min:1',
           'status' => 'required|in:AVAILABLE,IN_USE,MAINTENANCE',

        ],

        [
            'name.required' => 'Nama mobil wajib diisi',
            'plate_number.required' => 'Plat nomor wajib diisi',
            'plate_number.unique' => 'Plat nomor sudah digunakan',
            'image.image' => 'Harus berupa gambar',
            'image.required' => 'Gambar wajib diisi',
            'image.mimes' => 'Gambar hanya boleh berupa file jpeg, png dan jpg',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'capacity.required' => 'Kapasitas mobil wajib diisi',
            'seat_layout.required' => 'Tata letak kursi wajib diisi',
            'status.required' => 'Keadaan (status) mobil wajib diisi',
        ]
    );

    if ($request->hasFile('image')) {
    $path = $request->file('image')->store('vehicles', 'public');
    $validatedData['image'] = $path;
}
       Vehicle::create($validatedData);

        return redirect()->route('vehicles.index')->with('success', 'Data Mobil terbaru telah ditambah');
      


               
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
       $vehicle = Vehicle::findOrfail($id);

       return view('admin.vehicle.edit', compact('vehicle'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Vehicle $vehicle)
    {
          $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255|unique:vehicles,plate_number,' . $vehicle->id,
            'image' => 'image|mimes:jpeg,png,jpg|max:2048,' . $vehicle->id,
            'seat_layout' => 'required|max:255',
            'capacity' => 'required|integer|min:1',
           'status' => 'required|in:AVAILABLE,IN_USE,MAINTENANCE',

        ],

        [
            'name.required' => 'Nama mobil wajib diisi',
            'plate_number.required' => 'Plat nomor wajib diisi',
            'plate_number.unique' => 'Plat nomor sudah digunakan',
            'image.image' => 'Harus berupa gambar',
        
            'image.mimes' => 'Gambar hanya boleh berupa file jpeg, png dan jpg',
            'image.max' => 'Ukuran gambar maksimal 2MB',
            'capacity.required' => 'Kapasitas mobil wajib diisi',
            'seat_layout.required' => 'Tata letak kursi wajib diisi',
            'status.required' => 'Keadaan (status) mobil wajib diisi',
        ]
    );

    if ($request->hasFile('image')) {
    $path = $request->file('image')->store('vehicles', 'public');
    $validatedData['image'] = $path;
}
     $vehicle->update($validatedData);


        return redirect()->route('vehicles.index')->with('success', 'Data Mobil berhasil diubah');
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = Vehicle::findOrFail($id);
         
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Data Mobil berhasil dihapus');
    }
}
