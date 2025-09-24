<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\CuriController;


Route::get('/carta/{id}', [CardController::class, 'show']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
