<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class scheduleController extends Controller
{
    public function index(){

        $schedules = Schedule::with(['vehicle', 'route'])->where('status', 'ACTIVE')->orderBy('created_at', 'asc')->get();

        $totalSchedules = Schedule::where('status', 'ACTIVE')->count();

        return view('user.schedule', compact('schedules', 'totalSchedules'));
    }

   
}
