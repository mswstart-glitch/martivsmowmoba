<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ReviewController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.attempt');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware('auth:admin')->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
        Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.status');

        Route::resource('news', AdminNewsController::class)->except(['show']);
        Route::resource('instructors', InstructorController::class)->except(['show']);
        Route::resource('reviews', ReviewController::class)->except(['show']);
    });
});
