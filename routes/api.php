<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;


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

Route::group(['middleware' => 'auth:sanctum','namespace'=>'api'], function () {
    Route::get('user', [UserController::class,'index']);
});
Route::group(['prefix' => 'auth','namespace'=>'api'], function () {
    Route::post("login",[LoginController::class,'login']);
    Route::post("register",[RegisterController::class,'register']);

});

