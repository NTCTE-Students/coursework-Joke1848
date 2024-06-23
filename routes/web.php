<?php

use App\Http\Controllers\ActionsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewsController::class, 'index'])->name('index');
Route::get('/course/{course}', [ViewsController::class, 'course'])->name('course.show');
Route::get('/logout', [ActionsController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [ViewsController::class, 'register'])->name('register')->middleware('guest');
Route::get('/login', [ViewsController::class, 'login'])->name('login')->middleware('guest');
Route::post('/register', [ActionsController::class, 'register']);
Route::post('/login', [ActionsController::class, 'login']);
Route::post('/checkout/{course}', [OrderController::class, 'checkout'])->name('order.checkout')->middleware('auth');
Route::post('/orders/{id}/review', [ActionsController::class, 'create_review'])->name('checks.review')->middleware('auth');
Route::get('/orders', [ViewsController::class, 'orders'])->name('orders')->middleware('auth');

