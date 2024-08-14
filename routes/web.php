<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatGemini;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['IfLogin'])->group(function () { 
    Route::get('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'register']);
    
    Route::post('/registerAction', [AuthController::class, 'registerAction']);
    Route::post('/loginAction', [AuthController::class, 'loginAction']);
});

Route::middleware(['Authorization'])->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout']);
    Route::get("/chat", [ChatGemini::class, 'chat']);
    Route::post("/sendMessage",[ChatGemini::class, 'sendMessage']);
    Route::delete('/deleteMessage/{id}', [ChatGemini::class, 'deleteChat']);
});

