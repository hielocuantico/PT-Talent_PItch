<?php

use App\Http\Controllers\UsersController;
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

Route::get('users/search/{userName}', [UsersController::class, 'show']);
Route::get('users', [UsersController::class, 'index']);
Route::post('users', [UsersController::class, 'store']);
Route::put('users/{users}', [UsersController::class, 'update']);
Route::delete('users/{users}', [UsersController::class, 'destroy']);