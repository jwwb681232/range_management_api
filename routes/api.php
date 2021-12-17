<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


//登陆
Route::post('/auth/login', ['App\Api\Controllers\AuthController','login']);
Route::post('/auth/login/card', ['App\Api\Controllers\AuthController','loginWithCard']);

Route::get('/unit',['App\Api\Controllers\UnitController','index']);

//Route::get('/admin/unit',['App\Api\Controllers\Admin\UnitController','index']);

Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::get('/admin/unit',['App\Api\Controllers\Admin\UnitController','index']);
});
