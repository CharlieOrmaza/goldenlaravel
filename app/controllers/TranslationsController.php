<?php

class TranslationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /translations
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
		$reservacion->tipo = 'Traslados';
		$reservacion->estado = 'Activa';
		if ($reservacion->save()) {
			$translation = new Translation;
			$translation->papeleta = $noPapeleta;
			$translation->save();
			return Redirect::to('traslados/edit/'.$noPapeleta);
		}else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
			return Redirect::to('consultas');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /translations/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /translations
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /translations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($papeleta)
	{
		     $translation =  DB::table('translations')->where('papeleta', $papeleta)->first();
      		 $noPapel=$translation->papeleta;
             $reservacion = DB::table('reservations')->where('papeleta', $noPapel)->first();
		    return View::make('translations.show')->with('translation',$translation)->with('reservacion',$reservacion);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /translations/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($papeleta)
	{
		     $translation =  DB::table('translations')->where('papeleta', $papeleta)->first();
      		 $noPapel=$translation->papeleta;
             $reservacion = DB::table('reservations')->where('papeleta', $noPapel)->first();
             Session::put('papeleta', $papeleta);
             return View::make('translations.edit')->with('translation',$translation)->with('reservacion',$reservacion);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /translations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		    $translation = Translation::find($id);
			$translation->destino = Input::get('des');
			$translation->origen = Input::get('ori');
			$translation->numeroPersonas = Input::get('numero');
			$translation->tipo = Input::get('tipo');
			 $noPapeleta=$translation->papeleta;
            $reservacion = Reservation::where('papeleta', $noPapeleta)->first();
            $reservacion->destino = Input::get('des');
		    $reservacion->operador = Input::get('ope');
		    $reservacion->tipo = 'Traslados';
			$reservacion->estado = 'Activa';
			$reservacion->costoPax = Input::get('costoP');
			$reservacion->costoNeto = Input::get('costoN');
			$reservacion->observacionesPax = Input::get('obPax');
			$reservacion->observacionesAgencia = Input::get('obAg');
			$reservacion->tiempoLimite= Input::get('tmLim');

 	   if ($translation->save()) {
		$reservacion->save();
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

   return Redirect::to('traslados/edit/'.$noPapeleta);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /translations/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}