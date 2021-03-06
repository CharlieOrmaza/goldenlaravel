<?php

class ReservationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reservations
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /reservations/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reservations
	 *
	 * @return Response
	 */
	public function store($id=null,$papeleta=null)
	{
		$reservacion = new Papeletaxcliente;
		$reservacion->papeleta= $papeleta;
		$reservacion->idCliente= $id;

		if ($reservacion->save()) {
			return "Se Agrego Cliente a la reservacion";
		} else {
			return "Error al agregar Cliente a la reservacion";
		}
	}

	/**
	 * Display the specified resource.
	 * GET /reservations/{id}
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
	 * GET /reservations/{id}/edit
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
	 * PUT /reservations/{id}
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
	 * DELETE /reservations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($papeleta=null)
	{
		$reserva =  DB::table('reservations')->where('papeleta','=', $papeleta)->first();
        $id=$reserva->id;
      	$reservacion = Reservation::find($id);
      	$reservacion->estado = 'Cancelada';
      	if ($reservacion->save()) {
			Session::flash('message','Se Cancelo correctamente la papeleta No. '.$papeleta.'!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}
      	return Redirect::to('consultas');
	}

}