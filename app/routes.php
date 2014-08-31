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




Route::get('clientes/show/{id}','ClientesController@show');
Route::get('clientes/edit/{id}','ClientesController@edit');
Route::get('clientes/destroy/{id}','ClientesController@destroy');

Route::resource('clientes', 'ClientesController');

Route::get('/', function()
{
	return View::make('pages.home');
});
Route::get('about', function()
{
	return View::make('pages.about');
});
Route::get('projects', function()
{
	return View::make('pages.projects');
});
Route::get('contact', function()
{
	return View::make('pages.contact');
});

Route::resource('reservaciones', 'ReservacionesController');