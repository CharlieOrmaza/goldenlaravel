<?php

class RentadeunidadsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /rentadeunidads
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
			$reservacion->tipo = 'RentadeUnidades';
			$reservacion->estado = 'Activa';
			if ($reservacion->save()) {
				$rentadeunidads = new Rentadeunidad;
				$rentadeunidads->papeleta = $noPapeleta;
				$rentadeunidads->save();
				return Redirect::to('rentadeUnidades/edit/'.$noPapeleta);
			}else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
				return Redirect::to('consultas');
			}

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /rentadeunidads/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /rentadeunidads
	 *
	 * @return Response
	 */
	public function store()
	{
	}

	/**
	 * Display the specified resource.
	 * GET /rentadeunidads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($papeleta)
	{
		     $rentadeunidads =   DB::table('rentadeunidads')->where('papeleta', $papeleta)->first();
             $reservacion = DB::table('reservations')->where('papeleta', $papeleta)->first();
		     return View::make('rentadeunidads.show')->with('rentadeunidads',$rentadeunidads)->with('reservacion',$reservacion);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /rentadeunidads/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($papeleta)
	{
			 $rentadeunidads =  DB::table('rentadeunidads')->where('papeleta', $papeleta)->first();
             $reservacion = DB::table('reservations')->where('papeleta', $papeleta)->first();
		     Session::put('papeleta', $papeleta);
		     return View::make('rentadeunidads.edit')->with('rentadeunidads',$rentadeunidads)->with('reservacion',$reservacion);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /rentadeunidads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		    $rentadeunidads = Rentadeunidad::find($id);
			$rentadeunidads->empresaTuristica = Input::get('empresaTuristica');
			$rentadeunidads->tipoUnidad = Input::get('tipoUnidad');
			$rentadeunidads->tipo = Input::get('tipo');
			$rentadeunidads->descripcionviaje = Input::get('descripcionviaje');
			$rentadeunidads->fechayhoraSalida = Input::get('fechayhoraSalida');
			$rentadeunidads->fechayhoraRegreso = Input::get('fechayhoraRegreso');
			$noPapeleta=$rentadeunidads->papeleta;
            $reservacion = Reservation::where('papeleta', $noPapeleta)->first();
            $reservacion->destino = Input::get('des');
		    $reservacion->operador = Input::get('ope');
		    $reservacion->tipo = 'RentadeUnidades';
			$reservacion->estado = 'Activa';
			$reservacion->costoPax = Input::get('costoP');
			$reservacion->costoNeto = Input::get('costoN');
			$reservacion->observacionesPax = Input::get('obPax');
			$reservacion->observacionesAgencia = Input::get('obAg');
			$reservacion->tiempoLimite= Input::get('tmLim');

 	        if ($rentadeunidads->save()) {
	    	$reservacion->save();
				Session::flash('message','Actualizado correctamente!');
				Session::flash('class','success');
	    	} else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
	    	}

             return Redirect::to('rentadeUnidades/edit/'.$noPapeleta);

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /rentadeunidads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}