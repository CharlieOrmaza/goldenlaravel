@extends('layouts.default')
@section('content')
@include ('includes.menu')

	<h1>Hoteles</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Actualizar Hotel</h4>
  		</div>

  		<div class="panel-body">
  			@if (!empty($hotel))
    			<form method="post" action="hoteles/update/{{ $hotel->id }}">
		          	<p>
		            	Numero de Papeleta: <input value="{{ $hotel->noPapeleta }}" type="text" name="numP" placeholder="Nombre" class="form-control" required>
		          	</p>
		          	<p>
		            	id Cliente:<input value="{{ $hotel->idCliente }}" type="text" name="nameP" placeholder="Direccion" class="form-control" required>
		          	</p>
		          	<p>
		            	Destino:<input value="{{ $hotel->destino  }}" type="text" name="des" placeholder="Telefono" class="form-control" required>
		          	</p>
		          	<p>
		            	Operador:<input value="{{ $hotel->operador}}" type="text" name="ope" placeholder="Correo" class="form-control" required>
		          	</p>
		          	<p>
		            	Hotel:<input value="{{ $hotel->nombreHotel }}" type="text" name="nameH" placeholder="Fecha de Nacimiento" class="form-control" required>
		          	</p>
		          	<p>
		            	Fecha de Entrada<input value="{{ $hotel->fechaDeEntrada }}" type="text" name="fechaE" placeholder="Pasaporte" class="form-control" required>
		          	</p>
		          	<p>
		            	Fecha de Salida<input value="{{ $hotel->fechaDeSalida }}" type="text" name="fechaS" placeholder="Referencia" class="form-control" required>
		          	</p>
		          	<p>
		            	Habitaciones Sencillas:<input value="{{ $hotel->sgl }}" type="text" name="habS" placeholder="Fecha de Nacimiento" class="form-control" required>
		          	</p>
		          	<p>
		            	Habitaciones Dobles:<input value="{{ $hotel->dbl }}" type="text" name="habD" placeholder="Fecha de Nacimiento" class="form-control" required>
		          	</p>
		          	<p>
		            	Habitaciones Triples:<input value="{{ $hotel->tpl }}" type="text" name="habT" placeholder="Fecha de Nacimiento" class="form-control" required>
		          	</p>
		          	<p>
		            	Habitaciones Cuadruples:<input value="{{ $hotel->cpl }}" type="text" name="habC" placeholder="Fecha de Nacimiento" class="form-control" required>
		          	</p>
		             <p>
		            	Otras Habitaciones:<input value="{{ $hotel->otros }}" type="text" name="habO" placeholder="Fecha de Nacimiento" class="form-control" required>
		          	</p>


		          	<input type="submit" value="Actualizar" class="btn btn-success">
          	@else
	          	<p>
	            	No existe información para este Hotel.
	          	</p>
          	@endif
        		<a href="/hoteles" class="btn btn-default">Regresar</a>
      			</form>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop