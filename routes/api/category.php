<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Enums\Permissions;

Route::prefix('categories')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->middleware('permission:'.Permissions::VIEW_CATEGORIES->value);
    Route::get('/{id}', [CategoryController::class, 'getById'])->middleware('permission:'.Permissions::VIEW_CATEGORIES->value);
    Route::post('/', [CategoryController::class, 'store'])->middleware('permission:'.Permissions::CREATE_CATEGORIES->value);
    Route::put('/{id}', [CategoryController::class, 'update'])->middleware('permission:'.Permissions::EDIT_CATEGORIES->value);
    Route::patch('/{id}/toggle-status', [CategoryController::class, 'toggleStatus'])->middleware('permission:'.Permissions::TOGGLE_STATUS_CATEGORIES->value);
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->middleware('permission:'.Permissions::DELETE_CATEGORIES->value);
});