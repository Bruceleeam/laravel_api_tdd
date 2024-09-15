<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::apiResource('items', ItemController::class);

// Route::get('/items', [ItemController::class, 'index'])
//  ->name('items.index');

// Route::post('/items', [ItemController::class, 'store'])
//  ->name('items.store');

// Route::delete('/items/{item}', [ItemController::class, 'destroy'])
//  ->name('items.destroy');