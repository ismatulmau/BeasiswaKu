<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Pencari\DashboardPencariController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pemberi\BeasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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



Route::prefix('pemberi')->name('pemberi.')->group(function () {
    Route::resource('beasiswa', BeasiswaController::class);
});

require __DIR__.'/auth.php';
