<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\orderDetail;

use function Pest\Laravel\get;

class orderController extends Controller
{
    public function index(){


         $user = Auth::user();
      if ($user->role->role_name == 'admin') {
       
      
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
    } else {
       
        $orders = Order::whereHas('schedule', function($query) use ($user) {
            $query->where('driver_id', $user->id);
        })->with(['schedule'])->get();
    }
        return view('admin.order.index', compact('orders'));

       

    }

    public function show($id){


    $order= Order::findOrFail($id);
     $orderDetail=  orderDetail::where('order_id', $order->id)->get();


    return view('admin.order.show', compact('order', 'orderDetail'));
       
    }

    public function updateStatus(Request $request, $id)
    {

        $order = Order::findOrFail($id);

        
        
        $order->status = 'PAID';
       
          

        $order->save();


        return redirect()->route('orders')->with('success', "Order berhasil diubah menjadi {$request->status}");
    }

    public function doneOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = 'done';
        $order->save();

        $order->details()->forceDelete();
        return redirect()->route('orders')->with('success', "Order berhasil diubah menjadi {$request->status}");
    }

    public function rejectOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = 'cancelled';

        $order->save();

        $order->details()->forceDelete();
         return redirect()->route('orders')->with('success', "Order berhasil diubah menjadi {$request->status}. Kursi nomor {$order->seat_number} sekarang tersedia kembali!");
    }
}
