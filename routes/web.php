<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('process.login')->middleware('guest');
Route::get('/register', [AuthController::class, 'create'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('store')->middleware('guest');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout')->middleware('auth');


Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/admin', [ProductController::class, 'index'])->name('dashboard.admin')->middleware('auth');
Route::get('/products/show/{product}', [ProductController::class, 'show'])->name('product.show')->middleware('auth');
Route::middleware(['auth', 'can:is-admin'])->group(function(){
    Route::get('/create', [ProductController::class, 'create'])->name('product.create')->middleware('auth');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store')->middleware('auth');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit')->middleware('auth');
    Route::put('/update/{product}', [ProductController::class, 'update'])->name('product.update')->middleware('auth');
    Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('product.delete')->middleware('auth');
});
