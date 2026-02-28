<?php

use App\Http\Controllers\guest\homeController;
use App\Http\Controllers\guest\paymentController;
use App\Http\Controllers\guest\scheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/schedules', [scheduleController::class, 'index'])->name('schedules');
Route::get('/checkout/{id}', [paymentController::class, 'checkout'])->name('checkout');

Route::post('/payment',  [paymentController::class, 'storeOrder'])->name('payment');

Route::post('/payments/webhook', [paymentController::class, 'handleCallback']);

Route::get('/success/{orderId}', [paymentController::class, 'checkoutSuccess']);