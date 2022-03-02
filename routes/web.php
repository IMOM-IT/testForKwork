<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('users')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/{id}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::get('update/user', [\App\Http\Controllers\UserController::class, 'update']);
    Route::get('update/users', [\App\Http\Controllers\UserController::class, 'updateUsers']);
});
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'order']);
Route::get('/delete-order', [\App\Http\Controllers\OrderController::class, 'delete']);
