<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});

// Authentication routes
Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class);

// Resource routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
});
