
<?php

class ConsultasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$consultas = Reservation::get();
		$consultas = DB::select('select clientes.id as idCliente, clientes.nombre,reservations.id,
		reservations.papeleta,reservations.tiempolimite,reservations.tipo,
		reservations.estado,reservations.created_at from clientes,reservations where reservations.idCliente=clientes.id');
        return View::make('consultas.index')->with('consultas',$consultas);
	}

	

}