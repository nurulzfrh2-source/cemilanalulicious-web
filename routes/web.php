<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

// index adalah method di MhswController
Route::get('/mhsw', [App\Http\Controllers\MhswController::class, 'index']);
Route::get('/mhsw/create', [App\Http\Controllers\MhswController::class, 'create']);
Route::post('/mhsw', [App\Http\Controllers\MhswController::class, 'store']);
Route::get('/mhsw/{id}/edit', [App\Http\Controllers\MhswController::class, 'edit']);
Route::put('/mhsw/{id}', [App\Http\Controllers\MhswController::class, 'update']);
Route::delete('/mhsw/{id}', [App\Http\Controllers\MhswController::class, 'destroy']);