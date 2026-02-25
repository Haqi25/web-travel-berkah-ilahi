<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public function index(){

        $schedules = Schedule::where('status', 'ACTIVE')->orderBy('created_at', 'asc')->get();


        return view('guest.schedule', compact('schedules'));
    }
}
