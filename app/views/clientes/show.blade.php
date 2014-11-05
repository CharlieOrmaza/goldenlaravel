@extends('layouts.default')
@section('content')

	<h1>Clientes</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información del Cliente</h4>
  		</div>

  		<div class="panel-body">
	  		@if (!empty($cliente))
	  			<p>
	  				Nombre: <strong>{{ $cliente->nombre }}</strong>
	  			</p>
	  			<p>
	  				Direccion: <strong>{{ $cliente->direccion }}</strong>
	  			</p>
	  			<p>
	  				Telefono: <strong>{{ $cliente->telefono }}</strong>
	  			</p>
	  			<p>
	  				Correo: <strong>{{ $cliente->email }}</strong>
	  			</p>
	  			<p>
	  				Fecha de Nacimiento: <strong>{{ $cliente->fechaDeNacimiento }}</strong>
	  			</p>
	  			<p>
	  				Pasaporte: <strong>{{ $cliente->pasaporte }}</strong>
	  			</p>
	  			<p>
	  				Referencia: <strong>{{ $cliente->referencia }}</strong>
	  			</p>
	        @else
	        <p>
	          No existe información para éste Cliente.
	        </p>
	        @endif
	        <a href="/clientes" class="btn btn-default">Regresar</a>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop