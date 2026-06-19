<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Enums\Permission;

Route::prefix('suppliers')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->middleware('permission:'.Permissions::VIEW_SUPPLIERS->value);
    Route::get('/{id}', [SupplierController::class, 'getById'])->middleware('permission:'.Permissions::VIEW_SUPPLIERS->value);
    Route::post('/', [SupplierController::class, 'store'])->middleware('permission:'.Permissions::CREATE_SUPPLIERS->value);
    Route::put('/{id}', [SupplierController::class, 'update'])->middleware('permission:'.Permissions::EDIT_SUPPLIERS->value);
    Route::delete('/{id}', [SupplierController::class, 'destroy'])->middleware('permission:'.Permissions::DELETE_SUPPLIERS->value);
});