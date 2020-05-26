<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('movimentacao.create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/json/{user}', 'UserController@showJSON');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/veiculos', 'VeiculoController@index')->name('veiculos.index')->middleware('can:veiculo-list');
    Route::get('/veiculos/create', 'VeiculoController@create')->name('veiculos.create')->middleware('can:veiculo-create');
    Route::post('/veiculos', 'VeiculoController@store')->name('veiculos.store');
    Route::get('/veiculos/{veiculo}', 'VeiculoController@show')->name('veiculos.show');
    Route::get('/veiculos/{veiculo}/edit', 'VeiculoController@edit')->name('veiculos.edit')->middleware('can:veiculo-edit');
    Route::patch('/veiculos/{veiculo}', 'VeiculoController@update')->name('veiculos.update');
    Route::delete('/veiculos/{veiculo}', 'VeiculoController@delete')->name('veiculos.destroy')->middleware('can:veiculo-destroy');

    Route::get('/roles', 'RoleController@index')->name('roles.index')->middleware('can:role-list');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create')->middleware('can:role-create');
    Route::post('/roles', 'RoleController@store')->name('roles.store');
    Route::get('/roles/{role}', 'RoleController@show')->name('roles.show');
    Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('can:role-edit');
    Route::patch('/roles/{role}', 'RoleController@update')->name('roles.update');
    Route::delete('/roles/{role}', 'RoleController@delete')->name('roles.destroy')->middleware('can:role-destroy');

    Route::get('/users', 'UserController@index')->name('users.index')->middleware('can:user-list');
    Route::get('/users/create', 'UserController@create')->name('users.create')->middleware('can:user-create');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::get('/users/{user}', 'UserController@show')->name('users.show');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('can:user-edit');
    Route::patch('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@delete')->name('users.destroy')->middleware('can:user-destroy');
});
