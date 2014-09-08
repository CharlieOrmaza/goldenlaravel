@extends('layouts.default')
@section('content')
@include ('includes.menu')

	<h1>Clientes</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Actualizar Cliente</h4>
  		</div>

  		<div class="panel-body">
  			@if (!empty($cliente))
    			<form method="post" action="/clientes/update/{{ $cliente->id }}">
		          	<p>
		            	Nombre: <input value="{{ $cliente->nombre }}" type="text" name="nombre" placeholder="Nombre" class="form-control" required>
		          	</p>
		          	<p>
		            	Direccion:<input value="{{ $cliente->direccion }}" type="text" name="direccion" placeholder="Direccion" class="form-control" required>
		          	</p>
		          	<p>
		            	Telefono:<input value="{{ $cliente->telefono }}" type="text" name="telefono" placeholder="Telefono" class="form-control" required>
		          	</p>
		          	<p>
		            	Correo:<input value="{{ $cliente->email }}" type="text" name="email" placeholder="Correo" class="form-control" required>
		          	</p>
		          	<p>
		            	Fecha de Nacimiento<input value="{{ $cliente->fechaDeNacimiento }}" type="date" name="fechaDeNacimiento" placeholder="Fecha de Nacimiento" class="form-control" required>
		          	</p>
		          	<p>
		            	Pasaporte<input value="{{ $cliente->pasaporte }}" type="text" name="pasaporte" placeholder="Pasaporte" class="form-control" required>
		          	</p>
		          	<p>
		            	Referencia<input value="{{ $cliente->referencia }}" type="text" name="referencia" placeholder="Referencia" class="form-control" required>
		          	</p>
		          	<input type="submit" value="Actualizar" class="btn btn-success">
          	@else
	          	<p>
	            	No existe información para este Cliente.
	          	</p>
          	@endif
        		<a href="/clientes" class="btn btn-default">Regresar</a>
      			</form>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop