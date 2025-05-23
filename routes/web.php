<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pemdes\ProjectController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Pemdes\DashboardController as PemdesDashboardController;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/home', function () {
    return view('welcome');
})->middleware(['auth', 'verified']);

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
});

Route::prefix('pemdes')->name('pemdes.')->middleware(['auth', 'verified', 'role:pemdes'])->group(function () {
    Route::get('/', [PemdesDashboardController::class, 'index'])->name('index');
    Route::resource('projects', ProjectController::class);
});
