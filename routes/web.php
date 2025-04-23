<?php

use App\Http\Controllers\AccuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
// Landing Page END


// Accu & Type 
Route::resource('accu', AccuController::class);
Route::resource('type', TypeController::class);
// Accu & Type END


// Inventory
Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
// Inventory END


// Purchase
Route::get('purchase', [PurchaseController::class, 'index'])->name('purchase.index');
Route::post('purchase/store', [PurchaseController::class, 'store'])->name('purchase.store');
// Purchase END
