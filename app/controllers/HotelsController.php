<?php

class HotelsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /hotels
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('hotels.create');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /hotels/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('hotels.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /hotels
	 *
	 * @return Response
	 */
	public function store()
	{

		$reservacion = new Reservation;
		$reservacion->papeleta= Input::get('numP');
		$reservacion->destino = Input::get('des');
		$reservacion->operador = Input::get('ope');
		$reservacion->tipo = 'Hotel';
		$reservacion->estado = 'Activa';
		$reservacion->idCliente = '1';
		$reservacion->costoPax = Input::get('costoP');
		$reservacion->costoNeto = Input::get('costoN');
		$reservacion->observacionesPax = Input::get('obPax');
		$reservacion->observacionesAgencia = Input::get('obAg');
		$reservacion->tiempoLimite= Input::get('tmLim');

		if ($reservacion->save()) {
			$hotel = new Hotel;
			$hotel->noPapeleta = Input::get('numP');
			$hotel->idCliente = '1';
			$hotel->destino = Input::get('des');
			$hotel->operador = Input::get('ope');
			$hotel->nombreHotel = Input::get('nameH');
			$hotel->fechaDeEntrada = Input::get('fechaE');
			$hotel->fechaDeSalida = Input::get('fechaS');
			$hotel->sgl = Input::get('habS');
			$hotel->dbl = Input::get('habD');
			$hotel->tpl = Input::get('habT');
			$hotel->cpl = Input::get('habC');
			$hotel->otros = Input::get('habO');
			$hotel->save();

			Session::flash('message','Guardado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('hoteles/create');
	}

	/**
	 * Display the specified resource.
	 * GET /hotels/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($noPapeleta)
	{       
      		 $hotel =  DB::table('hotels')->where('noPapeleta', $noPapeleta)->first();
      		 $noPapel=$hotel->noPapeleta;
      		 $id=$hotel->idCliente;
      		 $cliente = Cliente::find($id);
      		 $tipo = 'Hotel';
              $reservacion = DB::table('reservations')->where('papeleta', $noPapeleta)->first();
		return View::make('hotels.show')->with('hotel',$hotel)->with('reservacion',$reservacion)->with('cliente',$cliente);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /hotels/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($noPapeleta)
	{
		 $hotel =  DB::table('hotels')->where('noPapeleta', $noPapeleta)->first();
             $noPapel=$hotel->noPapeleta;
      		 $id=$hotel->idCliente;
      		 $cliente = Cliente::find($id);
      		 $tipo = 'Hotel';
             $reservacion = DB::table('reservations')->where('papeleta', $noPapeleta)->first();   		 
   
        return View::make('hotels.edit')->with('hotel',$hotel)->with('reservacion',$reservacion)->with('cliente',$cliente);
		
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /hotels/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$hotel = Hotel::find($id);
		 
	$hotel->noPapeleta = Input::get('numP');
			$hotel->idCliente = '1';
			$hotel->destino = Input::get('des');
			$hotel->operador = Input::get('ope');
			$hotel->nombreHotel = Input::get('nameH');
			$hotel->fechaDeEntrada = Input::get('fechaE');
			$hotel->fechaDeSalida = Input::get('fechaS');
			$hotel->sgl = Input::get('habS');
			$hotel->dbl = Input::get('habD');
			$hotel->tpl = Input::get('habT');
			$hotel->cpl = Input::get('habC');
			$hotel->otros = Input::get('habO');
	$noPapeleta=$hotel->noPapeleta;		
	   if ($hotel->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}
   
   return Redirect::to('hoteles/edit/'.$noPapeleta);
	    
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /hotels/{id}
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