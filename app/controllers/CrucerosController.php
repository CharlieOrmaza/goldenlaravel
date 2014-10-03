<?php

class CrucerosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /cruceros
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
			$reservacion->tipo = 'Crucero';
			$reservacion->estado = 'Activa';
			if ($reservacion->save()) {
				$cruceros = new Crucero;
				$cruceros->papeleta = $noPapeleta;
				$cruceros->save();
				return Redirect::to('cruceros/edit/'.$noPapeleta);
			}else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
				return Redirect::to('consultas');
			}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /cruceros/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /cruceros
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /cruceros/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($papeleta)
	{
		     $cruceros =   DB::table('cruceros')->where('papeleta', $papeleta)->first();
             $reservacion = DB::table('reservations')->where('papeleta', $papeleta)->first();
		     return View::make('cruceros.show')->with('cruceros',$cruceros)->with('reservacion',$reservacion);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /cruceros/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($papeleta)
	{
			 $cruceros =  DB::table('cruceros')->where('papeleta', $papeleta)->first();
             $reservacion = DB::table('reservations')->where('papeleta', $papeleta)->first();
		     Session::put('papeleta', $papeleta);
		     return View::make('cruceros.edit')->with('cruceros',$cruceros)->with('reservacion',$reservacion);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /cruceros/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			$cruceros = Crucero::find($id);
			$cruceros->operador = Input::get('ope');
			$cruceros->naviera = Input::get('naviera');
			$cruceros->nombreBarco = Input::get('nombreBarco');
			$cruceros->descripcionRuta = Input::get('desR');
			$cruceros->numeroPersonas = Input::get('numeroPersonas');
			$noPapeleta=$cruceros->papeleta;
            $reservacion = Reservation::where('papeleta', $noPapeleta)->first();
            $reservacion->destino = Input::get('des');
		    $reservacion->operador = Input::get('ope');
		    $reservacion->tipo = 'Crucero';
			$reservacion->estado = 'Activa';
			$reservacion->costoPax = Input::get('costoP');
			$reservacion->costoNeto = Input::get('costoN');
			$reservacion->observacionesPax = Input::get('obPax');
			$reservacion->observacionesAgencia = Input::get('obAg');
			$reservacion->tiempoLimite= Input::get('tmLim');

 	        if ($cruceros->save()) {
	    	$reservacion->save();
				Session::flash('message','Actualizado correctamente!');
				Session::flash('class','success');
	    	} else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
	    	}

             return Redirect::to('cruceros/edit/'.$noPapeleta);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /cruceros/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}