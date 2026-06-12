<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

require __DIR__.'/api/accounting.php';
require __DIR__.'/api/auth.php';
require __DIR__.'/api/category.php';
require __DIR__.'/api/operation.php';
require __DIR__.'/api/product.php'; 
require __DIR__.'/api/report.php'; 
require __DIR__.'/api/payment.php';
require __DIR__.'/api/pending_count.php';
require __DIR__.'/api/return.php';
require __DIR__.'/api/third_party.php';
require __DIR__.'/api/user.php';
require __DIR__.'/api/size.php';
