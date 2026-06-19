<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Enums\Permissions;

Route::prefix('users')->middleware(['auth:sanctum'])->group(function () {
	Route::get('/email/{email}', [UserController::class, 'getByEmail'])->middleware('permission:'.Permissions::VIEW_USERS->value);
	Route::get('/', [UserController::class, 'index'])->middleware('permission:'.Permissions::VIEW_USERS->value);
	Route::get('/{id}', [UserController::class, 'getById'])->whereNumber('id')->middleware('permission:'.Permissions::VIEW_USERS->value);
	Route::post('/', [UserController::class, 'store'])->middleware('permission:'.Permissions::CREATE_USERS->value);
	Route::put('/{id}', [UserController::class, 'update'])->whereNumber('id')->middleware('permission:'.Permissions::EDIT_USERS->value);
	Route::patch('/{id}/toggle-status', [UserController::class, 'toggleStatus'])->whereNumber('id')->middleware('permission:'.Permissions::TOGGLE_STATUS_USERS->value);
	Route::delete('/{id}', [UserController::class, 'destroy'])->whereNumber('id')->middleware('permission:'.Permissions::DELETE_USERS->value);
});

