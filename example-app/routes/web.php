<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

Route::post('/dashboard', [HomeController::class, 'store']);