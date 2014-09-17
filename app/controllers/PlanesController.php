<?php

class PlanesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /planes
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('planes.create');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /planes/create
	 *
	 * @return Response
	 */
	public function create()
	{
	  return View::make('planes.create');	
	}

	/**sewly created resource in storage.
	 * POST /planes
	 *
	 * @return Response
	 */
	public function store()
	{
	
	$reservacion = new Reservation;
		$reservacion->papeleta= Input::get('numP');
		$reservacion->destino = Input::get('des');
		$reservacion->operador = Input::get('ope');
		$reservacion->tipo = 'Avion';
		$reservacion->estado = 'Activa';
		$reservacion->idCliente = '1';
		$reservacion->costoPax = Input::get('costoP');
		$reservacion->costoNeto = Input::get('costoN');
		$reservacion->observacionesPax = Input::get('obPax');
		$reservacion->observacionesAgencia = Input::get('obAg');
		$reservacion->tiempoLimite= Input::get('tmLim');

		if ($reservacion->save()) {
			$plane = new Plane;
			$plane->papeleta = Input::get('numP');
			$plane->destino = Input::get('des');
			$plane->operador = Input::get('ope');
			$plane->aerolinea = Input::get('aero');
			$plane->clave = Input::get('clave');
			$plane->equipaje = Input::get('equipaje');
			$plane->tarifa = Input::get('tarifa');
			$plane->itinerario = Input::get('itinerario');
			$plane->FechaSalida = Input::get('fechaS');
			$plane->FechaRegreso = Input::get('fechaR');
			$plane->save();

			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}
		return Redirect::to('aviones/create');

	}

	/**
	 * Display the specified resource.
	 * GET /planes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($papeleta)
	{
		     $plane =  DB::table('planes')->where('papeleta', $papeleta)->first();
      		 $noPapel=$plane->papeleta;
             $reservacion = DB::table('reservations')->where('papeleta', $noPapel)->first();
		  return View::make('planes.show')->with('plane',$plane)->with('reservacion',$reservacion);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /planes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($papeleta)
	{
		
		     $plane =  DB::table('planes')->where('papeleta', $papeleta)->first();
      		 $noPapel=$plane->papeleta;
             $reservacion = DB::table('reservations')->where('papeleta', $noPapel)->first();
		    
		    return View::make('planes.edit')->with('plane',$plane)->with('reservacion',$reservacion);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /planes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		    $plane = Plane::find($id);
			$plane->papeleta = Input::get('numP');
			$plane->destino = Input::get('des');
			$plane->operador = Input::get('ope');
			$plane->aerolinea = Input::get('aero');
			$plane->clave = Input::get('clave');
			$plane->equipaje = Input::get('equipaje');
			$plane->tarifa = Input::get('tarifa');
			$plane->itinerario = Input::get('itinerario');
			$plane->FechaSalida = Input::get('fechaS');
			$plane->FechaRegreso = Input::get('fechaR');
			 $noPapeleta=$plane->papeleta;	
            $reservacion = Reservation::where('papeleta', $noPapeleta)->first();
            $reservacion->destino = Input::get('des');
		    $reservacion->operador = Input::get('ope'); 
		    $reservacion->tipo = 'Avion';
			$reservacion->estado = 'Activa';
			$reservacion->costoPax = Input::get('costoP');
			$reservacion->costoNeto = Input::get('costoN');
			$reservacion->observacionesPax = Input::get('obPax');
			$reservacion->observacionesAgencia = Input::get('obAg');
			$reservacion->tiempoLimite= Input::get('tmLim');
       
 	   if ($plane->save()) {
          
		$reservacion->save();
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}
   
   return Redirect::to('aviones/edit/'.$noPapeleta);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /planes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$hotel = Hotel::find($id);

		if ($hotel->delete()) {
			Session::flash('message','Eliminado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('hoteles');
	}

}