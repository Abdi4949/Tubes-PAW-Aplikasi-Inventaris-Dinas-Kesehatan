<?php

use App\Http\Controllers\Admin\AssetsController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/Assets', [AssetsController::class, 'index']);
Route::get('/Assets/create', [AssetsController::class, 'create']);
Route::get('/Assets/edit/{id}', [AssetsController::class, 'edit']);
Route::post('/Assets/store', [AssetsController::class, 'store']);
Route::delete('/Assets/{id}', [AssetsController::class, 'delete']);
Route::put('/Assets/{id}', [AssetsController::class, 'update']);
Route::get('/assets/export', [AssetsController::class, 'export'])->name('assets.export');

// Route Login
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Middleware untuk user yang sudah login
Route::middleware('auth')->group(function() {
    // Route yang bisa diakses oleh semua role
    Route::get('/', [DashboardController::class, 'index']);

    // Route khusus untuk admin
    // Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route::group([['auth', 'role:admin']], function () {
        // dd("admin");
        Route::get('/Assets', [AssetsController::class, 'index']);
        Route::get('/Assets/create', [AssetsController::class, 'create']);
        Route::get('/Assets/edit/{id}', [AssetsController::class, 'edit']);
        Route::post('/Assets/store', [AssetsController::class, 'store']);
        Route::delete('/Assets/{id}', [AssetsController::class, 'delete']);
        Route::put('/Assets/{id}', [AssetsController::class, 'update']);


        Route::get('/User', [AdminUserController::class, 'index']);
        Route::get('/User/create', [AdminUserController::class, 'create']);
        // Route::get('/User/edit/{id}', [AdminUserController::class, 'edit']);
        Route::post('/User/store', [AdminUserController::class, 'store']);
        Route::delete('/User/{id}', [AdminUserController::class, 'delete']);
        Route::put('/User/{id}', [AdminUserController::class, 'update']);
    // });

    // Route khusus untuk user
    // Route::group([['auth', 'role:user']], function () {
    //     // dd("ussss");
    //     Route::get('/Assets', [AssetsController::class, 'index']); // User hanya dapat read
    // });


});