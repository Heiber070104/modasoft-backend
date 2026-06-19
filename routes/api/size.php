<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SizeController;
use App\Enums\Permissions;

Route::prefix('sizes')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [SizeController::class, 'index'])->middleware('permission:'.Permissions::VIEW_SIZES->value);
    Route::get('/{id}', [SizeController::class, 'getById'])->middleware('permission:'.Permissions::VIEW_SIZES->value);
    Route::post('/', [SizeController::class, 'store'])->middleware('permission:'.Permissions::CREATE_SIZES->value);
    Route::put('/{id}', [SizeController::class, 'update'])->middleware('permission:'.Permissions::EDIT_SIZES->value);
    Route::delete('/{id}', [SizeController::class, 'destroy'])->middleware('permission:'.Permissions::DELETE_SIZES->value);
});