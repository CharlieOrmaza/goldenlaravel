
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
		$consultas = DB::select('select distinct(reservations.papeleta), clientes.nombre, reservations.id,
		reservations.tiempolimite,reservations.tipo, clientes.id as idCliente,
		reservations.estado,reservations.created_at from clientes,reservations,papeletaxclientes where
		 clientes.id=papeletaxclientes.idCliente and reservations.papeleta = papeletaxClientes.papeleta');
        return View::make('consultas.index')->with('consultas',$consultas);

	}


}