<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PendingController;
use App\Http\Controllers\RegDonorController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RegisterDonorController;


Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'landingHome'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/verify', [AuthController::class, 'verify'])->name('auth.verify');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    // Route::post('/register', [HomeController::class, 'register'])->name('register-donor');
    Route::post('/register-donor', [RegisterDonorController::class, 'store'])->name('register-donor');

    Route::controller(RegDonorController::class)->group(function () {
        Route::group([
            'prefix' => 'register'
        ], function () {
            Route::get('/', 'index')->name('register.index');
            // Route::get('/create', 'create')->name('events.create');
            // Route::get('/edit', 'edit')->name('events.edit');
            // Route::post('/store', 'store')->name('events.store');
            // Route::put('/update', 'update')->name('events.update');
            // Route::get('/show/{id}', 'show')->name('events.show');
        });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'indexAdmin'])->name('admin-dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::controller(DonorController::class)->group(function () {
        Route::group([
            'prefix' => 'donor'
        ], function () {
            Route::get('/', 'index')->name('donor.index');
            Route::get('/create', 'create')->name('donor.create');
            Route::get('/edit', 'edit')->name('donor.edit');
            Route::post('/store', 'store')->name('donor.store');
            Route::put('/update', 'update')->name('donor.update');
            ROute::get('/show/{id}', 'show')->name('donor.show');
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
    Route::controller(EventController::class)->group(function () {
        Route::group([
            'prefix' => 'events'
        ], function () {
            Route::get('/', 'index')->name('events.index');
            Route::get('/create', 'create')->name('events.create');
            Route::get('/edit/{id}', 'edit')->name('events.edit');
            Route::post('/store', 'store')->name('events.store');
            Route::put('/update/{id}', 'update')->name('events.update');
            Route::get('/show/{id}', 'show')->name('events.show');
        });
    });

    Route::controller(UsersController::class)->group(function () {
        Route::group([
            'prefix' => 'users'
        ], function () {
            Route::get('/', 'index')->name('users.index');
            Route::get('/create', 'create')->name('users.create');
            Route::get('/edit/{id}', 'edit')->name('users.edit');
            Route::post('/store', 'store')->name('users.store');
            Route::put('/update/{id}', 'update')->name('users.update');
            Route::get('/show/{id}', 'show')->name('users.show');
        });
    });
});
