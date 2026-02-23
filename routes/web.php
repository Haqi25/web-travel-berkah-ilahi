<?php

use App\Http\Controllers\guest\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index'])->name('schedules');