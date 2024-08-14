<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GeminiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/registrasi', [AuthController::class, 'registrasi']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::delete('/logout', [AuthController::class, 'logout']);
    // Chat
    Route::post('/sendChat', [GeminiController::class, 'sendChat']);
    Route::get('/getChat', [GeminiController::class, 'getChat']);
    Route::delete('/deleteChat/{id}', [GeminiController::class, 'deleteChat']);
});
