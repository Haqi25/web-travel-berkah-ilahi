<?php

use App\Http\Controllers\guest\homeController;
use App\Http\Controllers\guest\paymentController;
use App\Http\Controllers\guest\scheduleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [homeController::class, 'index'])->name('home');
// Route::get('/schedules', [scheduleController::class, 'index'])->name('schedules');
Route::get('/schedules', function(){
    return view('user.schedule');
}); 
// Route::get('/checkout/{id}', [paymentController::class, 'checkout'])->name('checkout');

Route::get('/checkout', function(){
    return view('user.checkout');
});
Route::post('/payment',  [paymentController::class, 'storeOrder'])->name('payment');

Route::post('/payments/webhook', [paymentController::class, 'handleCallback']);

Route::get('/success/{orderId}', [paymentController::class, 'checkoutSuccess']);
Route::get('/', function (){
    return view('user.landingPage');
});