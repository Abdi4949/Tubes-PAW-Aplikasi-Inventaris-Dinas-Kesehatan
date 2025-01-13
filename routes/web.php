<?php

use App\Http\Controllers\Admin\AssetsController;
use Illuminate\Support\Facades\Route;

Route::get('/Assets', [AssetsController::class, 'index']);
