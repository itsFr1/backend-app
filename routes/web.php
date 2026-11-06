<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'admin.dashboard');

Route::view('/admin', 'admin.dashboard');