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
Route::get('/mode',['App\Api\Controllers\ModeController','index']);
Route::get('/common/time',['App\Api\Controllers\CommonController','time']);
Route::post('/common/setting/auto-sync',['App\Api\Controllers\CommonController','setAutoSync']);
Route::get('/common/setting/auto-sync',['App\Api\Controllers\CommonController','autoSync']);

//Route::get('/admin/unit',['App\Api\Controllers\Admin\UnitController','index']);

Route::group(['middleware'=>['auth:sanctum','auth.user.mode']],function(){

    Route::prefix('/admin')->group(function(){
        Route::get('/user/{id}',['App\Api\Controllers\Admin\UserController','show']);
        Route::get('/user',['App\Api\Controllers\Admin\UserController','index']);
        Route::post('/user',['App\Api\Controllers\Admin\UserController','store']);
        Route::put('/user',['App\Api\Controllers\Admin\UserController','update']);
        Route::delete('/user',['App\Api\Controllers\Admin\UserController','destroy']);
        Route::put('/user/password',['App\Api\Controllers\Admin\UserController','changePassword']);

        Route::get('/unit',['App\Api\Controllers\Admin\UnitController','index']);
        Route::post('/unit',['App\Api\Controllers\Admin\UnitController','store']);
        Route::put('/unit',['App\Api\Controllers\Admin\UnitController','update']);
        Route::delete('/unit',['App\Api\Controllers\Admin\UnitController','destroy']);

        Route::get('/card/{id}',['App\Api\Controllers\Admin\CardController','show']);
        Route::get('/card',['App\Api\Controllers\Admin\CardController','index']);
        Route::post('/card',['App\Api\Controllers\Admin\CardController','store']);
        Route::put('/card',['App\Api\Controllers\Admin\CardController','update']);
        Route::delete('/card',['App\Api\Controllers\Admin\CardController','destroy']);
    });

    Route::prefix('/operational')->group(function (){
        Route::get('/audio',['App\Api\Controllers\Operational\AudioController','index']);

        Route::get('/rts-script',['App\Api\Controllers\Operational\RtsScriptController','index']);
        Route::post('/rts-script/sync/{index}',['App\Api\Controllers\Operational\RtsScriptController','sync']);

        Route::get('/scenario',['App\Api\Controllers\Operational\ScenarioController','index']);
        Route::post('/scenario',['App\Api\Controllers\Operational\ScenarioController','store']);
        Route::put('/scenario/{id}',['App\Api\Controllers\Operational\ScenarioController','update']);
        Route::delete('/scenario/{id}',['App\Api\Controllers\Operational\ScenarioController','destroy']);
    });
});
