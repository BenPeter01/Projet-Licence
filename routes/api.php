<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;

// Routes d'authentification
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// Routes pour les offres d'emploi
Route::get('/jobs', [JobController::class, 'index']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth:api');
Route::get('/jobs/{id}', [JobController::class, 'show']);
Route::put('/jobs/{id}', [JobController::class, 'update'])->middleware('auth:api');
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->middleware('auth:api');

// Routes pour les candidatures
Route::get('/applications', [ApplicationController::class, 'index']);
Route::post('/applications', [ApplicationController::class, 'store']);
Route::get('/applications/{id}', [ApplicationController::class, 'show'])->middleware('auth:api');
Route::put('/applications/{id}', [ApplicationController::class, 'update'])->middleware('auth:api');
Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->middleware('auth:api');

