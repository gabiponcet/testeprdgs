<?php

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

Route::get('/usuarios', 'UsuariosController@index');
Route::get('/usuarios/criar', 'UsuariosController@create');
Route::post('/usuarios/criar', 'UsuariosController@store');
Route::post('/usuarios/remover/{id}', 'UsuariosController@destroy');