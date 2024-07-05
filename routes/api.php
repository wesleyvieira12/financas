<?php

use App\Http\Controllers\Api\AtivoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ativos', [AtivoController::class,'index'])->name('api.ativos');
