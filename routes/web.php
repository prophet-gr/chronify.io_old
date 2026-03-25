<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectPageController;
use App\Http\Controllers\ReportPageController;
use App\Http\Controllers\TimerPageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    }
    return view('landing');
});

// Auth routes (guests only for forms, logout for authenticated)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth:sanctum')->name('logout');

// Static pages
Route::view('/about', 'pages.about')->name('about');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/cookies', 'pages.cookies')->name('cookies');
Route::view('/gdpr', 'pages.gdpr')->name('gdpr');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/projects', ProjectPageController::class)->name('projects');
    Route::get('/timer', [TimerPageController::class, 'index'])->name('timer');
    Route::post('/timer/start', [TimerPageController::class, 'start'])->name('timer.start');
    Route::post('/timer/stop', [TimerPageController::class, 'stop'])->name('timer.stop');
    Route::get('/reports', ReportPageController::class)->name('reports');
});
