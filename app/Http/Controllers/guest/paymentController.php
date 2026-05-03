<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Order;
use App\Models\orderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Session\Session;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;
use Xendit\Invoice\CustomerObject;
class paymentController extends Controller
{
    public function checkout($id){


        $schedule = Schedule::find($id);
     
      $bookedSeats = orderDetail::whereHas('order', function($query) use ($schedule) {
        $query->where('schedule_id', $schedule->id)
              ->whereIn('status', ['pending', 'PAID']); 
    })
    ->pluck('seat_number')
    ->toArray();
        

        
        return view('user.checkout', compact('schedule', 'bookedSeats'));
      


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
        'pickup_address' => 'required',
        'pickup_latitude' => 'required',
        'pickup_longitude' => 'required',
        'seats' => 'required|array|min:1',
        
     
    ]);

    if($validator->fails()){
        return redirect()->route('checkout', $schedule->id)->withErrors($validator);
      };

     
$phoneInput = $request->input('phone');


$formattedPhone = $phoneInput;

if (str_starts_with($phoneInput, '0')) {
    $formattedPhone = '+62' . substr($phoneInput, 1);
} elseif (str_starts_with($phoneInput, '8')) {
    $formattedPhone = '+62' . $phoneInput;
} elseif (!str_starts_with($phoneInput, '+62')) {
 
    $formattedPhone = '+62' . $phoneInput;
}

$user = User::firstOrCreate([
    'phone' => $formattedPhone

], [
    'name' => $request->input('name'),
    'pickup_address' => $request->input('pickup_address'),
    'pickup_latitude' => $request->input('pickup_latitude'),
    'pickup_longitude' => $request->input('pickup_longitude'),
    'role_id' => 2
]);

  
    
      $order = Order::create([
        'booking_code' => 'ORD-'.time(),
        'user_id' => $user->id,
        'schedule_id' => $schedule->id,
        'status' => 'pending',
        'total_price'    => $schedule->route->price * count($request->input('seats')),
        'payment_method' => $request->input('payment_method'),
       
      ], 
    
      
    );
    foreach ($request->input('seats') as $seat) {
    orderDetail::create([
        'order_id' => $order->id,
        'passenger_name' => $user->name, 
        'passenger_phone' => $user->phone ?? '-', 
        'seat_number' => $seat,
        'schedule_id' => $schedule->id
    ]);
}

     if($request->payment_method == 'cash'){
      return redirect()->route('success', ['orderId'=> $order->booking_code])->with('success', 'Pesanan Berhasil Dibuat');
      } 

      else {
        Configuration::setXenditKey(config('xendit.xendit.api_key'));

      $apiInstance = new InvoiceApi();

   $customer = new CustomerObject([
    'given_names' => $user->name,
    'mobile_number' => $user->phone 
]);

      $create_invoice_request = new CreateInvoiceRequest([
       'external_id'      => $order->booking_code,
        'amount'           => (float) $order->total_price,
        'invoice_duration' => 86400,
        'description'      => 'Pembayaran untuk order ' . $order->booking_code,
        'customer'         => $customer,
          
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
 
         


    

     


}

  public function handleCallback(Request $request)
{

    $callbackToken = $request->header('x-callback-token');

    if($callbackToken !== config('xendit.xendit.callback_token')){
        return response()->json([
            'status' => 'error',
            'message'=> 'Token tidak valid'
        ], 403);
    }
    $data = $request->all();
    $externalId = $data['external_id']; 
    $status = $data['status']; 
    $payment_method = $data['payment_method'];
    $payment_channel = $data['payment_channel'];
    

  
    $order = Order::where('booking_code', $externalId)->first();

    if (!$order) {
       
        
        
        return response()->json([
            'status' => 'error',
            'message' => 'Order tidak ditemukan'
        ], 404);
    }

    $order->status = $status; 
    $order->payment_channel = $payment_channel;
    $order->payment_method = $payment_method;
    $order->save();

   
    return response()->json([
        'status' => 'success',
        'message' => 'Berhasil update status ke ' . $status
    ]);
}

public function checkoutSuccess($orderId){
    $order = Order::with(['details', 'schedule.route', 'schedule.vehicle'])
                  ->where('booking_code', $orderId)
                  ->first();
    if(!$order){
          return redirect()->route('schedules')->with('error', 'Pesanan tidak ditemukan');
    }

    return view('guest.success', compact('order'));
}
}
