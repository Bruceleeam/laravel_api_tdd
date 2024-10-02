<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

Route::apiResource("users", UserController::class);

Route::apiResource("users.items", ItemController::class)
->except('show')
->shallow();

// ITEMS
// Route::get('/items', [ItemController::class, 'index'])
//  ->name('items.index');

// Route::post('/items', [ItemController::class, 'store'])
//  ->name('items.store');

// Route::delete('/items/{item}', [ItemController::class, 'destroy'])
//  ->name('items.destroy');

// USERS
// Route::get('/users', [UserController::class, 'index'])
// ->name('users.index');

// Route::get('/users/{user}', [UserController::class, 'show'])
// ->name('users.show');

// Route::post('/users', [UserController::class, 'store'])
//     ->name('users.store');

// Route::delete('/users/{user}', [UserController::class, 'destroy'])
//     ->name('users.destroy');

// Route::patch('/users/{user}', [UserController::class, 'update'])
//     ->name('users.update');
