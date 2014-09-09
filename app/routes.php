<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::post('clientes/update/{id}','ClientesController@update');
Route::post('clientes/store','ClientesController@store');
Route::get('clientes/show/{id}','ClientesController@show');
Route::get('clientes/edit/{id}','ClientesController@edit');
Route::get('clientes/destroy/{id}','ClientesController@destroy');

Route::resource('clientes', 'ClientesController');


Route::resource('hoteles', 'HotelsController');

Route::resource('consultas', 'ConsultasController');

Route::post('pagos/store/{papeleta}','PagosController@store');
Route::get('pagos/nuevo/{papeleta?}','pagosController@create');
Route::resource('pagos', 'PagosController');

Route::resource('/', 'UsersController');
Route::post('login' ,'UsersController@login');