<?php

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/projects', ProjectPageController::class)->name('projects');
    Route::get('/timer', [TimerPageController::class, 'index'])->name('timer');
    Route::post('/timer/start', [TimerPageController::class, 'start'])->name('timer.start');
    Route::post('/timer/stop', [TimerPageController::class, 'stop'])->name('timer.stop');
    Route::get('/reports', ReportPageController::class)->name('reports');
});
