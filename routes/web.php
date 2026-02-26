<?php

use App\Http\Controllers\guest\homeController;
use App\Http\Controllers\guest\scheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/schedules', [scheduleController::class, 'index'])->name('schedules');
Route::get('/checkout', function(){
    return view('guest.checkout');
});

Route::get('/invoice', function(){
    return view('guest.invoice');
});