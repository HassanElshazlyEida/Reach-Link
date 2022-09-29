<?php

use App\Http\Controllers\Api\AdsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TagController;

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
Route::post("/login",[LoginController::class,'login'])->name('login');
Route::post("/register",[RegisterController::class,'register'])->name('register');


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::apiResource('/categories', CategoryController::class);
Route::apiResource('/tags', TagController::class);
Route::get('/ads/filter', [AdsController::class,'filter']);
Route::get('/user/{advertiser}/ads', [AdsController::class,'advertiser']);
