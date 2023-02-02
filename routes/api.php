<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => "v1/auth"],function(){

    Route::post("login",[AuthController::class,"ingresar"]);
    Route::post("registro",[AuthController::class,"registrar"]);

    Route::group(['middleware' => 'auth:sanctum'], function(){
        Route::post("perfil",[AuthController::class,"perfil"]);
        Route::get("logout",[AuthController::class,"salir"]);
        
    });
        
});

Route::post("prueba",[AuthController::class,"prueba"]);

