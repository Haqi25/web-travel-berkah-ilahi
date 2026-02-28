<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Session\Session;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;
use Illuminate\Support\Facades\Validator;
class paymentController extends Controller
{
    public function checkout($id){


        $schedule = Schedule::find($id);

        return view('guest.checkout', compact('schedule'));
      


    }

   public function storeOrder(Request $request){
    

    $schedule = Schedule::find($request->id);

    if(!$schedule){
        return response()->json([
            'status' => 'error',
            'message' => 'Data tidak ditemukan'
        ]);


    }

    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
    ]);

    if($validator->fails()){
        return redirect()->route('checkout')->withErrors($validator);
      };

      $user = User::firstOrCreate([
        'name' => $request->input('name'),
        'phone' => $request->input('phone'),
      
        'role_id' => 2
      ]);

   

      $order = Order::create([
        'booking_code' => 'ORD-'.time(),
        'user_id' => $user->id,
        'schedule_id' => $schedule->id,
        'status' => 'pending',
        'total_price' => $schedule->route->price

      ]);

      Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));

      $apiInstance = new InvoiceApi();

      $create_invoice_request = new CreateInvoiceRequest([
       'external_id'      => $order->booking_code,
        'amount'           => (float) $order->total_price,
        'invoice_duration' => 86400,
        'description'      => 'Pembayaran untuk order ' . $order->booking_code,
        'customer'         => [
            'given_names' => $user->name,
            'mobile_number' => $user->phone 
        ],
        'success_redirect_url' => "http://localhost:8000/success/" . $order->booking_code,
        'failed_redirect_url' => "http://localhost:8000",
        ]);

   try {
    $result = $apiInstance->createInvoice($create_invoice_request);

    $order->invoice_url = $result['invoice_url'];
    $order->save();

    
    return redirect($result['invoice_url']);

} catch (\Xendit\XenditSdkException $e) {
    return redirect()->back()->with('error', 'Gagal membuat invoice: ' . $e->getMessage());
}



}

  public function handleCallback(Request $request)
{

    $callbackToken = $request->header('x-callback-token');

    if($callbackToken !== env('XENDIT_CALLBACK_TOKEN')){
        return response()->json([
            'status' => 'error',
            'message'=> 'Token tidak valid'
        ], 403);
    }
    $data = $request->all();
    $externalId = $data['external_id']; 
    $status = $data['status']; 

  
    $order = Order::where('booking_code', $externalId)->first();

    if (!$order) {
       
        
        
        return response()->json([
            'status' => 'error',
            'message' => 'Order tidak ditemukan'
        ], 404);
    }

    $order->status = $status; 
    $order->save();

   
    return response()->json([
        'status' => 'success',
        'message' => 'Berhasil update status ke ' . $status
    ]);
}

public function checkoutSuccess($orderId){
    $order = Order::where('booking_code', $orderId)->first();
    if(!$order){
          return redirect()->route('schedules')->with('error', 'Pesanan tidak ditemukan');
    }

    return view('guest.success', compact('order'));
}
}
