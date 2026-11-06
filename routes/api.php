<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::post('/admin/login', [AuthController::class, 'login']);

Route::get('/notes', [NoteController::class, 'index']);
Route::get('/notes/search/{keyword}', [NoteController::class, 'search']);
Route::get('/notes/archived/list', [NoteController::class, 'archived']);
Route::get('/notes/{id}', [NoteController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);

Route::get('/notes-stats', [NoteController::class, 'stats']);
Route::get('/recent-notes', [NoteController::class, 'recent']);


/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('admin.auth')->group(function () {

    Route::post('/admin/logout', [AuthController::class, 'logout']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/profile', [AdminController::class, 'profile']);

    Route::post('/notes', [NoteController::class, 'store']);
    Route::put('/notes/{id}', [NoteController::class, 'update']);
    Route::delete('/notes/{id}', [NoteController::class, 'destroy']);

    Route::put('/notes/{id}/archive', [NoteController::class, 'archive']);
    Route::put('/notes/{id}/restore', [NoteController::class, 'restore']);

    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
});