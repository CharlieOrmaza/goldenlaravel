<?php

class AutosrentasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /autosrentas
	 *
	 * @return Response
	 */
	public function index()
	{
		    $papeleta= Papeleta::find(1);
			$noPapeleta= $papeleta->papeleta;
			$papeleta->papeleta = $noPapeleta+1;
			$papeleta->save();
			$reservacion = new Reservation;
			$reservacion->papeleta= $noPapeleta;
			$reservacion->tipo = 'Autobus';
			$reservacion->estado = 'Activa';
			if ($reservacion->save()) {
				$autosrentas = new Autorenta;
				$autosrentas->papeleta = $noPapeleta;
				$autosrentas->save();
				return Redirect::to('autobuses/edit/'.$noPapeleta);
			}else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
				return Redirect::to('consultas');
			}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /autosrentas/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /autosrentas
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /autosrentas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /autosrentas/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /autosrentas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /autosrentas/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}