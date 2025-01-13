<?php

use App\Http\Controllers\Admin\AssetsController;
use Illuminate\Support\Facades\Route;

Route::get('/Assets', [AssetsController::class, 'index']);
Route::get('/Assets/create', [AssetsController::class, 'create']);
Route::get('/Assets/edit/{id}', [AssetsController::class, 'edit']);
Route::post('/Assets/store', [AssetsController::class, 'store']);
Route::delete('/Assets/{id}', [AssetsController::class, 'delete']);
Route::put('/Assets/{id}', [AssetsController::class, 'update']);
