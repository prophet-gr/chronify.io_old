<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\OrganizationMemberController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TimeEntryController;
use Illuminate\Support\Facades\Route;

// Public auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/email/verification-notification', [AuthController::class, 'resendVerification'])
        ->middleware('throttle:6,1');

    // Organizations
    Route::apiResource('organizations', OrganizationController::class);

    // Organization members
    Route::get('/organizations/{organization}/members', [OrganizationMemberController::class, 'index']);
    Route::post('/organizations/{organization}/members', [OrganizationMemberController::class, 'store']);
    Route::put('/organizations/{organization}/members/{user}', [OrganizationMemberController::class, 'update']);
    Route::delete('/organizations/{organization}/members/{user}', [OrganizationMemberController::class, 'destroy']);

    // Projects (scoped to organization)
    Route::apiResource('organizations.projects', ProjectController::class)->shallow();

    // Tasks (scoped to project)
    Route::apiResource('projects.tasks', TaskController::class)->shallow();

    // Time entries
    Route::apiResource('time-entries', TimeEntryController::class);
    Route::post('/time-entries/{time_entry}/stop', [TimeEntryController::class, 'stop']);
});
