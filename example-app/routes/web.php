<?php

use Illuminate\Support\Facades\Route;

// use 
// use
// use 

Route::get('/', function () {return view('login');});

Route::get('/cadastro', function () {return view('cadastro');});

Route::get('/home', function () {return view('home');});