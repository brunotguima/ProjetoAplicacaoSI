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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('saidas', 'SaidaController');
Route::apiResource('entradas', 'EntradaController');
Route::get('veiculos/qrcode/{id}', 'VeiculoController@createQR');
Route::get('users/qrcode/{id}', 'UserController@createQR');
