@extends('layouts.default')
@section('content')
@include ('includes.menu')

	<h1 class="panel">Clientes</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Crear Cliente</h4>
  		</div>

  		<div class="panel-body">
  			<form method="post" action="store">
				<p>
					<input type="text" name="nombre" placeholder="Nombre" class="form-control" required>
				</p>
				<p>
					<input type="text" name="direccion" placeholder="Direccion" class="form-control" required>
				</p>
				<p>
					<input type="text" name="telefono" placeholder="Telefono" class="form-control" required>
				</p>
				<p>
					<input type="text" name="email" placeholder="Correo" class="form-control" required>
				</p>
				<p>
					<input type="date" name="fechaDeNacimiento" placeholder="Fecha de Nacimiento" class="form-control" required>
				</p>
				<p>
					<input type="text" name="pasaporte" placeholder="Pasaporte" class="form-control" required>
				</p>
				<p>
					<input type="text" name="referencia" placeholder="Referencia" class="form-control" required>
				</p>

				<p>
					<input type="submit" value="Guardar" class="btn btn-success">
					<a href="/clientes" class="btn btn-default">Regresar</a>
				</p>
			</form>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop