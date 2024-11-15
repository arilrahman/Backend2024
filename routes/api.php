<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumniController;

// Rute publik untuk register dan login alumni
Route::post('/alumni/register', [AuthController::class, 'register']); // Register alumni
Route::post('/alumni/login', [AuthController::class, 'login']); // Login alumni

// Rute yang dilindungi oleh autentikasi (login) untuk alumni
Route::middleware('auth:sanctum')->group(function () {
    // Mendapatkan data pengguna yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Logout alumni
    Route::post('/alumni/logout', [AuthController::class, 'logout']); // Logout alumni

    // Rute untuk mengelola data alumni
    Route::get('/alumni', [AlumniController::class, 'index']); // Get all alumni
    Route::post('/alumni', [AlumniController::class, 'store']); // Add new alumni
    Route::get('/alumni/{id}', [AlumniController::class, 'show']); // Get alumni by ID
    Route::put('/alumni/{id}', [AlumniController::class, 'update']); // Update specific alumni
    Route::delete('/alumni/{id}', [AlumniController::class, 'destroy']); // Delete specific alumni

    // Rute untuk fitur pencarian dan filter status alumni
    Route::get('/alumni/search/{name}', [AlumniController::class, 'search']); // Search alumni by name
    Route::get('/alumni/status/fresh-graduate', [AlumniController::class, 'freshGraduate']); // Get fresh graduate alumni
    Route::get('/alumni/status/employed', [AlumniController::class, 'employed']); // Get employed alumni
    Route::get('/alumni/status/unemployed', [AlumniController::class, 'unemployed']); // Get unemployed alumni
});
