<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserAccountController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Index/Index');
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);


Route::resource('listing', ListingController::class)
    ->only(['create', 'store', 'update', 'edit', 'destroy'])->middleware('auth');

Route::resource('listing', ListingController::class)
    ->except(['create', 'store', 'update', 'edit', 'destroy']);

Route::resource('user-account', UserAccountController::class)->only(['create', 'store']);

Route::get('login', [AuthController::class, 'create'])->name('login');

Route::post('login', [AuthController::class, 'store'])->name('login.store');

Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');
