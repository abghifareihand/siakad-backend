<?php

use App\Http\Controllers\API\UserController;
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

Route::middleware('auth:sanctum')->group(function () {
    // get user
    Route::get('user', [UserController::class, 'fetch']);
    // update user
    Route::post('user', [UserController::class, 'update']);
    // logout user
    Route::post('logout', [UserController::class, 'logout']);
});

// login user
Route::post('login', [UserController::class, 'login']);
