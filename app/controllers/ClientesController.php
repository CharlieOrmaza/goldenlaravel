<?php

class ClientesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clientes = Cliente::orderBy('id','nombre')->get();
		//$clientes = Cliente::all();
		//$clientes = Cliente::get();
		//$clientes = DB::select('select * from clientes');
        return View::make('clientes.index')->with('clientes',$clientes);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        
        return View::make('clientes.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$cliente = new Cliente;

		$cliente->nombre = Input::get('nombre');
		$cliente->direccion = Input::get('direccion');
		$cliente->telefono = Input::get('telefono');
		$cliente->email = Input::get('email');
		$cliente->fechaDeNacimiento = Input::get('fechaDeNacimiento');
		$cliente->referencia = Input::get('referencia');
		$cliente->pasaporte = Input::get('pasaporte');

		if ($cliente->save()) {
			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('clientes/create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id = null)
	{
        $cliente = Cliente::find($id);

		return View::make('clientes.show')->with('cliente',$cliente);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id = null)
	{
        $cliente = Cliente::find($id);

		return View::make('clientes.edit')->with('cliente',$cliente);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$cliente = Cliente::find($id);

		$cliente->nombre = Input::get('nombre');
		$cliente->direccion = Input::get('direccion');
		$cliente->telefono = Input::get('telefono');
		$cliente->email = Input::get('email');
		$cliente->fechaDeNacimiento = Input::get('fechaDeNacimiento');
		$cliente->referencia = Input::get('referencia');
		$cliente->pasaporte = Input::get('pasaporte');

		if ($cliente->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('clientes/edit/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cliente = Cliente::find($id);

		if ($cliente->delete()) {
			Session::flash('message','Eliminado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('clientes');
	}

}