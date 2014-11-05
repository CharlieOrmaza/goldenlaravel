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
			$reservacion->tipo = 'RentadeAutos';
			$reservacion->estado = 'Activa';
			if ($reservacion->save()) {
				$autosrentas = new Autosrenta;
				$autosrentas->papeleta = $noPapeleta;
				$autosrentas->save();
				return Redirect::to('Autosrentas/edit/'.$noPapeleta);
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
	public function show($papeleta)
	{
	 	 $autosrentas =   DB::table('autosrentas')->where('papeleta', $papeleta)->first();
         $reservacion = DB::table('reservations')->where('papeleta', $papeleta)->first();
	  	 return View::make('Autosrentas.show')->with('autosrentas',$autosrentas)->with('reservacion',$reservacion);	
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /autosrentas/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($papeleta)
	{
			 $autosrentas = DB::table('autosrentas')->where('papeleta', $papeleta)->first();
             $reservacion = DB::table('reservations')->where('papeleta', $papeleta)->first();
		     Session::put('papeleta', $papeleta);
		     return View::make('Autosrentas.edit')->with('autosrentas',$autosrentas)->with('reservacion',$reservacion);

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
			$autosrentas = Autosrenta::find($id);
			$autosrentas->operador = Input::get('ope');
			$autosrentas->arrendadora = Input::get('arrendadora');
			$autosrentas->tipoDeAuto = Input::get('tipoDeAuto');
			$autosrentas->fechaEntraga = Input::get('fechaEntraga');
			$autosrentas->fechaDevolucion = Input::get('fechaDevolucion');
			$autosrentas->LugaryhoraDeEntrega = Input::get('LugaryhoraDeEntrega');
			$autosrentas->LugaryhoraDeDevolucion = Input::get('LugaryhoraDeDevolucion');
			$autosrentas->claveOperador = Input::get('claveOperador');
			$autosrentas->claveArrendadora = Input::get('claveArrendadora');
			$noPapeleta=$autosrentas->papeleta;
			 $reservacion = Reservation::where('papeleta', $noPapeleta)->first();
            $reservacion->destino = Input::get('des');
		    $reservacion->operador = Input::get('ope');
		    $reservacion->tipo = 'RentadeAutos';
			$reservacion->estado = 'Activa';
			$reservacion->costoPax = Input::get('costoP');
			$reservacion->costoNeto = Input::get('costoN');
			$reservacion->observacionesPax = Input::get('obPax');
			$reservacion->observacionesAgencia = Input::get('obAg');
			$reservacion->tiempoLimite= Input::get('tmLim');
 	        if ($autosrentas->save()) {
	    	$reservacion->save();
				Session::flash('message','Actualizado correctamente!');
				Session::flash('class','success');
	    	} else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
	    	}

             return Redirect::to('Autosrentas/edit/'.$noPapeleta);
           
		
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