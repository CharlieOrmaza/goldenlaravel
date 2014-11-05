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

	Route::get('clientes/nuevopax/create', 'ClientesController@nuevoPax');
	Route::post('clientes/nuevopax/store', 'ClientesController@nuevoPaxStore');
	Route::post('clientes/update/{id}','ClientesController@update');
	Route::post('clientes/store','ClientesController@store');
	Route::get('clientes/show/{id}','ClientesController@show');
	Route::get('clientes/buscar/{papeleta}','ClientesController@buscar');
	Route::get('clientes/edit/{id}','ClientesController@edit');
	Route::get('clientes/destroy/{id}','ClientesController@destroy');
	Route::resource('clientes', 'ClientesController');

    Route::post('autobuses/update/{id}','AutobusesController@update');
	Route::post('autobuses/store','AutobusesController@store');
	Route::get('autobuses/show/{id}','AutobusesController@show');
	Route::get('autobuses/edit/{id}','AutobusesController@edit');
	Route::get('autobuses/destroy/{id}','AutobusesController@destroy');
	Route::resource('autobuses', 'AutobusesController');

    Route::post('circuitos/update/{id}','CircuitosController@update');
	Route::post('circuitos/store','CircuitosController@store');
	Route::get('circuitos/show/{id}','CircuitosController@show');
	Route::get('circuitos/edit/{id}','CircuitosController@edit');
	Route::get('circuitos/destroy/{id}','CircuitosController@destroy');
	Route::resource('circuitos', 'CircuitosController');

    Route::post('cruceros/update/{id}','CrucerosController@update');
	Route::post('cruceros/store','CrucerosController@store');
	Route::get('cruceros/show/{id}','CrucerosController@show');
	Route::get('cruceros/edit/{id}','CrucerosController@edit');
	Route::get('cruceros/destroy/{id}','CrucerosController@destroy');
	Route::resource('cruceros', 'CrucerosController');

    Route::post('Autosrentas/update/{id}','AutosrentasController@update');
	Route::post('Autosrentas/store','AutosrentasController@store');
	Route::get('Autosrentas/show/{id}','AutosrentasController@show');
	Route::get('Autosrentas/edit/{id}','AutosrentasController@edit');
	Route::get('Autosrentas/destroy/{id}','AutosrentasController@destroy');
	Route::resource('Autosrentas', 'AutosrentasController');

    Route::post('rentadeUnidades/update/{id}','RentadeunidadsController@update');
	Route::post('rentadeUnidades/store','RentadeunidadsController@store');
	Route::get('rentadeUnidades/show/{id}','RentadeunidadsController@show');
	Route::get('rentadeUnidades/edit/{id}','RentadeunidadsController@edit');
	Route::get('rentadeUnidades/destroy/{id}','RentadeunidadsController@destroy');
	Route::resource('rentadeUnidades', 'RentadeunidadsController');

    Route::post('tours/update/{id}','ToursController@update');
	Route::post('tours/store','ToursController@store');
	Route::get('tours/show/{id}','ToursController@show');
	Route::get('tours/edit/{id}','ToursController@edit');
	Route::get('tours/destroy/{id}','ToursController@destroy');
	Route::resource('tours', 'ToursController');

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

    Route::post('traslados/update/{id}','TranslationsController@update');
	Route::post('traslados/store','TranslationsController@store');
	Route::get('traslados/show/{id}','TranslationsController@show');
	Route::get('traslados/edit/{id}','TranslationsController@edit');
	Route::get('traslados/destroy/{id}','TranslationsController@destroy');
	Route::resource('traslados', 'TranslationsController');

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
	Route::get('clientes/lista2/{papeleta}', 'ClientesController@papeletaxclientesTabla2');
	Route::get('clientes/cancelar/{papeletaXClientes_id}', 'ClientesController@cancelar');


	Route::resource('traslados', 'TranslationsController');

});


	Route::get('salir', 'UsersController@destroy');
	Route::any('login' ,'UsersController@login');
	Route::resource('/', 'UsersController');



