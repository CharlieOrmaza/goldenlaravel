<?php

class CircuitosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /circuitos
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
			$reservacion->tipo = 'Circuito';
			$reservacion->estado = 'Activa';
			if ($reservacion->save()) {
				$circuitos = new Circuito;
				$circuitos->papeleta = $noPapeleta;
				$circuitos->save();
				return Redirect::to('circuitos/edit/'.$noPapeleta);
			}else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
				return Redirect::to('consultas');
			}

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /circuitos/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /circuitos
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /circuitos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($papeleta)
	{
		     $circuitos =   DB::table('circuitos')->where('papeleta', $papeleta)->first();
             $reservacion = DB::table('reservations')->where('papeleta', $papeleta)->first();
		     return View::make('circuitos.show')->with('circuitos',$circuitos)->with('reservacion',$reservacion);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /circuitos/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($papeleta)
	{
			 $circuitos =  DB::table('circuitos')->where('papeleta', $papeleta)->first();
             $reservacion = DB::table('reservations')->where('papeleta', $papeleta)->first();
		     Session::put('papeleta', $papeleta);
		     return View::make('circuitos.edit')->with('circuitos',$circuitos)->with('reservacion',$reservacion);

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /circuitos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			$circuitos = Circuito::find($id);
			$circuitos->operador = Input::get('ope');
			$circuitos->operadorMayorista = Input::get('opeM');
			$circuitos->nombreCircuito = Input::get('nameC');
			$circuitos->descripcionCircuito = Input::get('desC');
			$circuitos->numeroPersonas = Input::get('numeroPersonas');
			$noPapeleta=$circuitos->papeleta;
            $reservacion = Reservation::where('papeleta', $noPapeleta)->first();
            $reservacion->destino = Input::get('des');
		    $reservacion->operador = Input::get('ope');
		    $reservacion->tipo = 'Circuito';
			$reservacion->estado = 'Activa';
			$reservacion->costoPax = Input::get('costoP');
			$reservacion->costoNeto = Input::get('costoN');
			$reservacion->observacionesPax = Input::get('obPax');
			$reservacion->observacionesAgencia = Input::get('obAg');
			$reservacion->tiempoLimite= Input::get('tmLim');

 	        if ($circuitos->save()) {
	    	$reservacion->save();
				Session::flash('message','Actualizado correctamente!');
				Session::flash('class','success');
	    	} else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
	    	}

             return Redirect::to('circuitos/edit/'.$noPapeleta);

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /circuitos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}