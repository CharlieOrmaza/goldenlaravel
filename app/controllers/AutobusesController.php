<?php

class AutobusesController extends \BaseController {

		/**
		 * Display a listing of the resource.
		 * GET /rentaautos
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
				$autobuses = new Autobus;
				$autobuses->papeleta = $noPapeleta;
				$autobuses->save();
				return Redirect::to('autobuses/edit/'.$noPapeleta);
			}else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
				return Redirect::to('consultas');
			} 
		}

		/**
		 * Show the form for creating a new resource.
		 * GET /rentaautos/create
		 *
		 * @return Response
		 */
		public function create()
		{
			//
		}

		/**
		 * Store a newly created resource in storage.
		 * POST /rentaautos
		 *
		 * @return Response
		 */
		public function store()
		{
			//
		}

		/**
		 * Display the specified resource.
		 * GET /rentaautos/{id}
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function show($papeleta)
		{
		     $autobuses =  DB::table('autobuses')->where('papeleta', $papeleta)->first();
             $reservacion = DB::table('reservations')->where('papeleta', $papeleta)->first();
		     return View::make('autobuses.show')->with('autobuses',$autobuses)->with('reservacion',$reservacion);
		}

		/**
		 * Show the form for editing the specified resource.
		 * GET /rentaautos/{id}/edit
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function edit($papeleta)
		{
			 $autobuses =  DB::table('autobuses')->where('papeleta', $papeleta)->first();
             $reservacion = DB::table('reservations')->where('papeleta', $papeleta)->first();
		     Session::put('papeleta', $papeleta);
		     return View::make('autobuses.edit')->with('autobuses',$autobuses)->with('reservacion',$reservacion); 
		}

		/**
		 * Update the specified resource in storage.
		 * PUT /rentaautos/{id}
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function update($id)
		{
			$autobuses = Autobus::find($id);
			$autobuses->operador = Input::get('ope');
			$autobuses->linea = Input::get('linea');
			$autobuses->fechaSalida = Input::get('fechaS');
			$autobuses->fechaRegreso = Input::get('fechaR');
			$autobuses->tipo = Input::get('tipo');
			$autobuses->origenyHorario = Input::get('origenyHorario');
			$autobuses->destinoyHorario = Input::get('destinoyHorario');
			$autobuses->numeroPersonas = Input::get('numeroPersonas');
			$noPapeleta=$autobuses->papeleta;
            $reservacion = Reservation::where('papeleta', $noPapeleta)->first();
            $reservacion->destino = Input::get('des');
		    $reservacion->operador = Input::get('ope');
		    $reservacion->tipo = 'Autobus';
			$reservacion->estado = 'Activa';
			$reservacion->costoPax = Input::get('costoP');
			$reservacion->costoNeto = Input::get('costoN');
			$reservacion->observacionesPax = Input::get('obPax');
			$reservacion->observacionesAgencia = Input::get('obAg');
			$reservacion->tiempoLimite= Input::get('tmLim');

 	        if ($autobuses->save()) {
	    	$reservacion->save();
				Session::flash('message','Actualizado correctamente!');
				Session::flash('class','success');
	    	} else {
				Session::flash('message','Ha ocurrido un error!');
				Session::flash('class','danger');
	    	}

             return Redirect::to('autobuses/edit/'.$noPapeleta);

		}

		/**
		 * Remove the specified resource from storage.
		 * DELETE /rentaautos/{id}
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function destroy($id)
		{
			//
		}

	}