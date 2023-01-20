<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PendingController;


Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'landingHome'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/verify', [AuthController::class, 'verify'])->name('auth.verify');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
});


Route::middleware('auth')->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'indexAdmin'])->name('admin-dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::controller(DonorController::class)->group(function () {
        Route::group([
            'prefix' => 'donors'
        ], function () {
            Route::get('/', 'index')->name('donors.index');
            Route::get('/create', 'create')->name('donors.create');
            Route::get('/edit', 'edit')->name('donors.edit');
            Route::post('/store', 'store')->name('donors.store');
            Route::put('/update', 'update')->name('donors.update');
            ROute::get('/show/{id}', 'show')->name('donors.show');
        });
    });
    Route::controller(PendingController::class)->group(function () {
        Route::group([
            'prefix' => 'pending'
        ], function () {
            Route::get('/', 'index')->name('pending.index');
            Route::get('/create', 'create')->name('pending.create');
            Route::get('/edit', 'edit')->name('pending.edit');
            Route::post('/store', 'store')->name('pending.store');
            Route::put('/update', 'update')->name('pending.update');
            ROute::get('/show/{id}', 'show')->name('pending.show');
        });
    });
});
