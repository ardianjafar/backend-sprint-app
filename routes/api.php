<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinceController;

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


Route::prefix('admin')->group(function () {
    Route::get('index', [App\Http\Controllers\Api\CheckOngkirController::class,'index']);
    Route::post('/ongkir', [App\Http\Controllers\Api\CheckOngkirController::class,'check_ongkir']);
    Route::get('/cities/{province_id}', [App\Http\Controllers\Api\CheckOngkirController::class,'getCities']);

    //route login
    Route::post('/login', [App\Http\Controllers\Api\Admin\LoginController::class, 'index']);

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth:api'], function() {

        //data user
        Route::get('/user', [App\Http\Controllers\Api\Admin\LoginController::class, 'getUser']);

        //refresh token JWT
        Route::get('/refresh', [App\Http\Controllers\Api\Admin\LoginController::class, 'refreshToken']);

        //logout
        Route::post('/logout', [App\Http\Controllers\Api\Admin\LoginController::class, 'logout']);
    });

});

Route::prefix('web')->group(function () {
    Route::get('/sprint-a',[App\Http\Controllers\ProvinceController::class, 'index']);
});