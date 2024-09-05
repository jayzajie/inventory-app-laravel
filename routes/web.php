<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;

Route::get('/', [ItemController::class, 'index'])->name('home');

Route::resource('items', ItemController::class);

Route::resource('categories', CategoryController::class)->only(['store', 'destroy']);

Route::resource('suppliers', SupplierController::class);
