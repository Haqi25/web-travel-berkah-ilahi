<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class dashboardController extends Controller
{
    
     
    public function index(){

        $totalBooking = Order::count();
        $totalBookingNow = Order::whereDate('created_at', now())->count();

        $totalIncome = Order::sum('total_price');
        $totalIncomeNow = Order::whereDate('created_at', now())->sum('total_price');

        return view('admin.dashboard', compact('totalBooking', 'totalBookingNow', 'totalIncome', 'totalIncomeNow'));
        
    }
}
