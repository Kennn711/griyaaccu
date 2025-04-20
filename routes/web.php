<?php

use App\Http\Controllers\AccuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('/griyaaccu/accu', AccuController::class);
Route::resource('/griyaaccu/type', TypeController::class);
