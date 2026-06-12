<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('users')->middleware(['auth:sanctum'])->group(function () {
	Route::get('/email/{email}', [UserController::class, 'getByEmail'])->middleware('permission:view_users');
	Route::get('/', [UserController::class, 'index'])->middleware('permission:view_users');
	Route::get('/{id}', [UserController::class, 'getById'])->whereNumber('id')->middleware('permission:view_users');
	Route::post('/', [UserController::class, 'store'])->middleware('permission:create_users');
	Route::put('/{id}', [UserController::class, 'update'])->whereNumber('id')->middleware('permission:edit_users');
	Route::delete('/{id}', [UserController::class, 'destroy'])->whereNumber('id')->middleware('permission:delete_users');
});

