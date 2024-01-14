<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\cadastroController;

Route::get('/', [loginController::class, 'index']);

Route::get('/cadastro', [cadastroController::class, 'index']);

Route::get('/home', [homeController::class, 'index']);