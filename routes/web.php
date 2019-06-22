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

Route::get('/usuarios', 'UsuariosController@index')->name('usuarios.index');
Route::get('/usuarios/criar', 'UsuariosController@create')->name('form_criar_usuario');
Route::post('/usuarios/criar', 'UsuariosController@store');
Route::post('/usuarios/editar/{id}', 'UsuariosController@edit');
Route::put('/usuarios/{id}', 'UsuariosController@update')->name('usuarios.update');
//rota de update
Route::post('/usuarios/remover/{id}', 'UsuariosController@destroy');