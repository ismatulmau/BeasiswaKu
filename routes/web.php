<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Pencari\DashboardPencariController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

});

Route::prefix('pencari')->middleware(['auth', 'role:pencari'])->group(function () {
    Route::get('/dashboard', [DashboardPencariController::class, 'index'])->name('pencari.dashboard');

});

Route::prefix('pemberi')->middleware(['auth', 'role:pemberi'])->group(function () {
});


require __DIR__.'/auth.php';
