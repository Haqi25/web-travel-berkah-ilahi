<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class scheduleListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $schedules = Schedule::with(['route', 'driver', 'vehicle'])->orderBy('created_at', 'asc')->get();

        return view('admin.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $routes = Route::all();
    $drivers = Driver::all();
    $vehicles = Vehicle::all();

    return view('admin.schedule.create', compact('routes', 'drivers', 'vehicles'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'route_id' => 'required|exists:routes,id',
                'driver_id' => 'required|exists:drivers,id',
                'vehicle_id'=> 'required|exists:vehicles,id',
                'departure_time' => 'required|date',
                'status' => 'required|in:ACTIVE,FINISHED,CANCELED',

            ],
               [
                'route_id.required' => 'Rute wajib diisi',
                'driver_id.required' => 'Driver wajib diisi',
                'vehicle_id.required' => 'Mobil wajib diisi',
                'departure_time.required' => 'waktu keberangkatan wajib  diisi',
                 'departure_time.date' => 'Format tanggal tidak valid',
                'status.required' => 'status wajib diisi'

               ],

                  

            );
               $validatedData['departure_time'] = Carbon::parse($validatedData['departure_time']);

            Schedule::create($validatedData);
 
            return redirect()->route('scheduleList.index')->with('success', 'Jadwal berhasil dibuat');       
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
        $schedule = Schedule::findOrfail($id);
         $routes = Route::all();
         $drivers = Driver::all();
        $vehicles = Vehicle::all();

        return view('admin.schedule.edit', compact('schedule', 'routes', 'drivers', 'vehicles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validatedData = $request->validate(
            [
                'route_id' => 'required|exists:routes,id',
                'driver_id' => 'required|exists:drivers,id',
                'vehicle_id'=> 'required|exists:vehicles,id',
                'departure_time' => 'required|date',
                'status' => 'required|in:ACTIVE,FINISHED,NONACTIVE',

            ],
               [
                'route_id.required' => 'Rute wajib diisi',
                'driver_id.required' => 'Driver wajib diisi',
                'vehicle_id.required' => 'Mobil wajib diisi',
                'departure_time.required' => 'waktu keberangkatan wajib  diisi',
                 'departure_time.date' => 'format tanggal tidak valid',
                'status.required' => 'status wajib diisi'

               ],

                  

            );

             $validatedData['departure_time'] = Carbon::parse($validatedData['departure_time']);
    
            $schedule = Schedule::findOrfail($id);
            $schedule->update($validatedData);

            return redirect()->route('scheduleList.index')->with('success', 'Data jadwal berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
