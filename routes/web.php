<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', function () {
    return view('welcome');
})->middleware(['verified']);

Route::prefix('admin')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
});
