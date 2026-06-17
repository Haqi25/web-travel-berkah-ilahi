<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Schedule;
use App\Models\orderDetail;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class newPaymentController extends Controller
{
    

    public function bookingForm(Request $request){

        $schedule = Schedule::findOrFail($request->id);

        if(!$schedule){
            return redirect()->route('schedules');
        }

        $validator = Validator::make($request->all(), [
        'customer_name' => 'required',
        'customer_phone' => 'required',
        'pickup_address' => 'required',
        // 'pickup_latitude' => 'required',
        // 'pickup_longitude' => 'required',
        'seats' => 'required|array|min:1',
        'terms_accepted' => 'required',

        
     
    ]);

    if($validator->fails()){
        return redirect()->route('booking', $schedule->id)->withErrors($validator);
      };

     
$phoneInput = $request->input('customer_phone');


$formattedPhone = $phoneInput;

if (str_starts_with($phoneInput, '0')) {
    $formattedPhone = '+62' . substr($phoneInput, 1);
} elseif (str_starts_with($phoneInput, '8')) {
    $formattedPhone = '+62' . $phoneInput;
} elseif (!str_starts_with($phoneInput, '+62')) {
 
    $formattedPhone = '+62' . $phoneInput;
}



  
    
      $order = Order::create([
        'booking_code' => 'ORD-'.time(),
        'customer_name' => $request->input('customer_name'),
        'customer_phone' => $formattedPhone,
        'pickup_address' => $request->input('pickup_address'),
        'pickup_latitude' => $request->input('pickup_latitude'),
         'pickup_longitude' => $request->input('pickup_longitude'),
         'schedule_id' => $schedule->id,
        'status' => 'pending',
        'total_price'    => $schedule->route->price * count($request->input('seats')),
        'payment_method' => '-',
        'terms_accepted' => true,
        'terms_accepted_at' => now()
       
      ], 
    
      
    );
    foreach ($request->input('seats') as $seat) {
    orderDetail::create([
        'order_id' => $order->id,
        'passenger_name' => $order->customer_name, 
        'passenger_phone' => $order->customer_phone ?? '-', 
        'seat_number' => $seat,
        'schedule_id' => $schedule->id
    ]);
}

 
      return redirect()->route('payment', ['orderId'=> $order->booking_code])->with('success', 'Silahkan melakukan pembayaran');
      
    }
    public function payment($orderId){

        $order = Order::with(['details', 'schedule.route', 'schedule.vehicle' ])->where('booking_code', $orderId)->first();
        if(!$order){
            return redirect()->route('schedules');
        }

        if($order->status == 'PAID' || $order->status == 'done' || $order->status == 'cancelled'){
            return redirect()->route('success', $order->booking_code);
        }

        return view('user.payment', compact('order'));
    }

   public function paymentForm(Request $request)
{
    $order = Order::where('booking_code', $request->booking_code)
        ->firstOrFail();

        $request->validate([
    'payment_method' => 'required',
     'payment_proof' => 'required_if:payment_method,transfer|image|mimes:jpg,jpeg,png|max:2048',
]);
    

    $paymentProof = null;

    if ($request->hasFile('payment_proof')) {
        $paymentProof = $request->file('payment_proof')
            ->store('payment_proof', 'public');
    }

    $order->update([
        'payment_method' => $request->payment_method,
        'payment_proof' => $paymentProof,
    ]);

    
    return redirect()
        ->route('success', $order->booking_code)
        ->with('success', 'Pesanan Berhasil Dibuat');
}
}
