@extends('layouts.default')
@section('content')

	<h1>Todos los clientes</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Lista de Clientes</h4>
  		</div>

  		<div class="panel-body">
    		<table class="table table-striped" id="table_id">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Email</th>
						<th>Fecha de Nacimiento</th>
						<th>Referencia</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($clientes as $cliente)
						<tr>
							<td>{{ $cliente->id }}</td>
							<td>{{ $cliente->nombre }}</td>
							<td>{{ $cliente->direccion }}</td>
							<td>{{ $cliente->telefono }}</td>
							<td>{{ $cliente->email }}</td>
							<td>{{ $cliente->fechaDeNacimiento }}</td>
							<td>{{ $cliente->referencia }}</td>
							<td>
								<a href="/clientes/show/{{ $cliente->id }}"><span class="label label-info">Ver</span></a>
								<a href="/clientes/edit/{{ $cliente->id }}"><span class="label label-success">Editar</span></a>
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