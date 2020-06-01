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
Route::get('/veiculos/json/{id}', 'VeiculoController@showJSON');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/veiculos', 'VeiculoController@index')->name('veiculos.index')->middleware('can:veiculo-list');
    Route::get('/veiculos/create', 'VeiculoController@create')->name('veiculos.create')->middleware('can:veiculo-create');
    Route::post('/veiculos', 'VeiculoController@store')->name('veiculos.store')->middleware('can:veiculo-create');;
    Route::get('/veiculos/{veiculo}', 'VeiculoController@show')->name('veiculos.show')->middleware('can:veiculo-list');
    Route::get('/veiculos/{veiculo}/edit', 'VeiculoController@edit')->name('veiculos.edit')->middleware('can:veiculo-edit');
    Route::patch('/veiculos/{veiculo}', 'VeiculoController@update')->name('veiculos.update')->middleware('can:veiculo-edit');
    Route::delete('/veiculos/{veiculo}', 'VeiculoController@destroy')->name('veiculos.destroy')->middleware('can:veiculo-destroy');

    Route::get('/roles', 'RoleController@index')->name('roles.index')->middleware('can:role-list');
    Route::get('/roles/create', 'RoleController@create')->name('roles.create')->middleware('can:role-create');
    Route::post('/roles', 'RoleController@store')->name('roles.store')->middleware('can:role-create');
    Route::get('/roles/{role}', 'RoleController@show')->name('roles.show')->middleware('can:role-list');
    Route::get('/roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('can:role-edit');
    Route::patch('/roles/{role}', 'RoleController@update')->name('roles.update')->middleware('can:role-edit');
    Route::delete('/roles/{role}', 'RoleController@delete')->name('roles.destroy')->middleware('can:role-destroy');

    Route::get('/users', 'UserController@index')->name('users.index')->middleware('can:user-list');
    Route::get('/users/create', 'UserController@create')->name('users.create')->middleware('can:user-create');
    Route::post('/users', 'UserController@store')->name('users.store')->middleware('can:user-create');
    Route::get('/users/{user}', 'UserController@show')->name('users.show')->middleware('can:user-list');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit')->middleware('can:user-edit');
    Route::patch('/users/{user}', 'UserController@update')->name('users.update')->middleware('can:user-destroy');
    Route::delete('/users/{user}', 'UserController@delete')->name('users.destroy')->middleware('can:user-destroy');

    Route::get('/mecanicos', 'MecanicoController@index')->name('mecanicos.index')->middleware('can:mecanico-list');
    Route::get('/mecanicos/create', 'MecanicoController@create')->name('mecanicos.create')->middleware('can:mecanico-create');
    Route::post('/mecanicos', 'MecanicoController@store')->name('mecanicos.store')->middleware('can:mecanico-create');
    Route::get('/mecanicos/{mecanico}', 'MecanicoController@show')->name('mecanicos.show')->middleware('can:mecanico-list');
    Route::get('/mecanicos/{mecanico}/edit', 'MecanicoController@edit')->name('mecanicos.edit')->middleware('can:mecanico-edit');
    Route::patch('/mecanicos/{mecanico}', 'MecanicoController@update')->name('mecanicos.update')->middleware('can:mecanico-edit');
    Route::delete('/mecanicos/{mecanico}', 'MecanicoController@destroy')->name('mecanicos.destroy')->middleware('can:mecanico-destroy');

    Route::get('/manutencoes', 'ManutencaoController@index')->name('manutencoes.index')->middleware('can:manutencao-list');
    Route::get('/manutencoes/create', 'ManutencaoController@create')->name('manutencoes.create')->middleware('can:manutencao-create');
    Route::post('/manutencoes', 'ManutencaoController@store')->name('manutencoes.store')->middleware('can:manutencao-create');
    Route::get('/manutencoes/{manutencao}', 'ManutencaoController@show')->name('manutencoes.show')->middleware('can:manutencao-list');
    Route::get('/manutencoes/{manutencao}/edit', 'ManutencaoController@edit')->name('manutencoes.edit')->middleware('can:manutencao-edit');
    Route::patch('/manutencoes/{manutencao}', 'ManutencaoController@update')->name('manutencoes.update')->middleware('can:manutencao-edit');
    Route::delete('/manutencoes/{manutencao}', 'ManutencaoController@destroy')->name('manutencoes.destroy')->middleware('can:manutencao-destroy');

    Route::get('/grafico/{veiculo}', 'VeiculoController@grafico')->name('veiculos.grafico');
    Route::get('/estatistica', 'EstatisticaController@index')->name('estatisticas.index')->middleware('can:ver-estatisticas');
    Route::get('/estatistica/json', 'EstatisticaController@geraGrafico')->name('estatisticas.geraGrafico');
});
