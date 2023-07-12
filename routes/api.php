<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmployeesController;
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


Route::group(["middleware" => ['auth:sanctum']],function () {
    Route::resource('/employees', EmployeesController::class);
    Route::post('/logout',[AuthController::class , 'logout']); 
});

// Route::apiResource('posts', PostController::class)->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {

    Route::post('/auth/register', 'createUser');
    Route::post('/auth/login', 'loginUser');
    
});