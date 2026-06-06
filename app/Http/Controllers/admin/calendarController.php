<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class calendarController extends Controller
{
    
    public function index(){

        $orders = Order::with(['user', 'schedule'])->get();

        $events = [];

         foreach ($orders as $order) {
        $events[] = [
            'title' => $order->user->name,
            'start' => $order->schedule->departure_time->format('Y-m-d'),
             'url' => route('orders.show', $order->id)
        ];
    }

    return view('admin.calender.index', compact('events'));
    }

}
