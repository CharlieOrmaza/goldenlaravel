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

Route::group(array('before' => 'auth'), function()
{
});
Route::get('clientes/nuevopax/create', 'ClientesController@nuevoPax');
Route::post('clientes/nuevopax/store', 'ClientesController@nuevoPaxStore');
Route::post('clientes/update/{id}','ClientesController@update');
Route::post('clientes/store','ClientesController@store');
Route::get('clientes/show/{id}','ClientesController@show');
Route::get('clientes/buscar/{papeleta}','ClientesController@buscar');
Route::get('clientes/edit/{id}','ClientesController@edit');
Route::get('clientes/destroy/{id}','ClientesController@destroy');
Route::resource('clientes', 'ClientesController');

Route::post('hoteles/update/{id}','HotelsController@update');
Route::post('hoteles/store','HotelsController@store');
Route::get('hoteles/show/{id}','HotelsController@show');
Route::get('hoteles/edit/{id}','HotelsController@edit');
Route::get('hoteles/destroy/{id}','HotelsController@destroy');
Route::resource('hoteles', 'HotelsController');

Route::post('aviones/update/{id}','PlanesController@update');
Route::post('aviones/store','PlanesController@store');
Route::get('aviones/show/{id}','PlanesController@show');
Route::get('aviones/edit/{id}','PlanesController@edit');
Route::get('aviones/destroy/{id}','PlanesController@destroy');
Route::resource('aviones', 'PlanesController');

Route::post('hotelAvion/update/{id}','HotelplanesController@update');
Route::post('hotelAvion/store','HotelplanesController@store');
Route::get('hotelAvion/show/{id}','HotelplanesController@show');
Route::get('hotelAvion/edit/{id}','HotelplanesController@edit');
Route::get('hotelAvion/destroy/{id}','HotelplanesController@destroy');
Route::resource('hotelAvion', 'HotelplanesController');

Route::get('reservation/store/{id}/{papeleta}', 'ReservationsController@store');
Route::get('reservation/destroy/{papeleta}', 'ReservationsController@destroy');
Route::resource('reservation', 'ReservationsController');

Route::resource('consultas', 'ConsultasController');

Route::post('pagos/store','PagosController@store');
Route::get('pagos/nuevo/{papeleta?}','pagosController@create');
Route::resource('pagos', 'PagosController');


Route::get('clientes/lista/{papeleta}', 'ClientesController@papeletaxclientesTabla');
Route::get('clientes/cancelar/{papeletaXClientes_id}', 'ClientesController@cancelar');



Route::get('salir', 'UsersController@destroy');
Route::any('login' ,'UsersController@login');
Route::resource('/', 'UsersController');



