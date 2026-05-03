<?php

use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\orderController;
use App\Http\Controllers\admin\roleController;
use App\Http\Controllers\admin\routeController;
use App\Http\Controllers\admin\scheduleListController;
use App\Http\Controllers\admin\usersController;
use App\Http\Controllers\admin\vehicleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\guest\homeController;
use App\Http\Controllers\guest\paymentController;
use App\Http\Controllers\guest\scheduleController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/schedules', [scheduleController::class, 'index'])->name('schedules');

Route::get('/checkout/{id}', [paymentController::class, 'checkout'])->name('checkout');
Route::get('/checkout', function(){
    return redirect()->route('home');
});

Route::post('/payment',  [paymentController::class, 'storeOrder'])->name('payment');

Route::post('/payments/webhook', [paymentController::class, 'handleCallback']);

Route::get('/success/{orderId}', [paymentController::class, 'checkoutSuccess'])->name('success');
Route::get('/', [homeController::class, 'index'])->name('home');

//admin dashboard




//user

Route::middleware('guest')->group(function(){
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgetPassword', [PasswordResetLinkController::class, 'create'])->name('request.reset');
    Route::post('requestPasswordReset',[PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('passwordReset/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('passwordStore', [NewPasswordController::class, 'store'])->name('password.store');
    Route::get('verify/otp', [AuthenticatedSessionController::class, 'verifyOtp'])->name('verify.otp');
    Route::post('verify/otp/store', [AuthenticatedSessionController::class, 'verifyOtpStore'])->name('verify.otp.store');
});
 
Route::middleware('auth')->group(function(){
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});


//admin dan driver
Route::middleware('role:admin|driver')->group(function(){
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('orders', [orderController::class, 'index']  )->name('orders');
     Route::get('detailOrder/{id}', [orderController::class, 'show']  )->name('orders.show');
Route::patch('orderStatus/{id}', [orderController::class, 'updateStatus'])->name('orders.updateStatus');
Route::patch('orderStatus/{id}/rejectOrder', [orderController::class, 'rejectOrder'])->name('orders.rejectOrder');
Route::patch('orderStatus/{id}/doneOrder', [orderController::class, 'doneOrder'])->name('orders.doneOrder');
Route::get('editPassword', [PasswordController::class, 'index'])->name('editPassword');
Route::put('updatePassword', [PasswordController::class, 'update'])->name('password.update');

});

//admin
Route::middleware('role:admin')->group(function(){
Route::resource('roles',  roleController::class);
Route::resource('scheduleList', scheduleListController::class);

Route::resource('users', usersController::class);
Route::resource('vehicles', vehicleController::class);
Route::resource('routes', routeController::class);

});