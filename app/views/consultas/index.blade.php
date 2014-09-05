@extends('layouts.default')
@section('content')
@include ('includes.menu')

	<h1>Consultas</h1>
	

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Todas las Papeletas</h4>
  		</div>

  		<div class="panel-body">
    		<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>papeleta</th>
						<th>Nombre Pax</th>
						<th>Creado el</th>
						<th>Tiempo Limite</th>
						<th>Tipo</th>
						<th>Estado</th>
						<th>Acciones</th>						
					</tr>
				</thead>
				<tbody>

					@foreach($consultas as $consulta)
						<tr>
							<td>{{ $consulta->id }}</td>
							<td>{{ $consulta->papeleta }}</td>
							<td>{{ $consulta->nombre }}</td>
							<td>{{ $consulta->created_at}}</td>
							<td>{{ $consulta->tiempolimite }}</td>
							<td>{{ $consulta->tipo }}</td>
							<td>{{ $consulta->estado }}</td>
							<td>
								<a href="/clientes/show/{{ $consulta->idCliente }}"><span class="label label-info">Ver</span></a>
								<a href="/clientes/edit/{{ $consulta->idCliente }}"><span class="label label-success">Editar</span></a>
								<a href="{{ url('/clientes/destroy',$consulta->id) }}"><span class="label label-danger">Eliminar</span></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
  		</div>
  	</div>
	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop
