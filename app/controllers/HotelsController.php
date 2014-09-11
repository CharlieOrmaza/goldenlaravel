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

		$hotel = new Hotel;
		$hotel->noPapeleta = Input::get('numP');
		$hotel->idCliente = Input::get('nameP');
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
		

		if ($hotel->save()) {
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
	public function show($id)
	{
		 $hotel = Hotel::find($id);

		return View::make('hotels.show')->with('hotel',$hotel);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /hotels/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 $hotel = Hotel::find($id);

        return View::make('hotels.edit')->with('hotel',$hotel);
		
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
		$hotel->idCliente = Input::get('nameP');
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

		if ($hotel->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

		return Redirect::to('hotels.edit/'.$id);
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