<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as Auth;

Route::prefix("auth")->group(function () {
    Route::post("/login", [Auth::class, "login"]);
    Route::post("/me", [Auth::class, "me"])->middleware('auth:sanctum');
    Route::post("/logout", [Auth::class, "logout"])->middleware('auth:sanctum');
});