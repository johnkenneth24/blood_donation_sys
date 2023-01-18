<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'landingHome'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
});

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', [HomeController::class, 'home'])->name('dashboard');
});
