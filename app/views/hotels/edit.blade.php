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
    			<form method="post" action="/hoteles/update/{{ $hotel->id }}">
		          	<p>
		            	Numero de Papeleta: <input value="{{ $hotel->noPapeleta }}" type="text" name="numP"  class="form-control" required>
		          	</p>
		          	<hr>
	  			     <p>
					<h4>Datos del Pax</h4>
				    </p>
		          	<p>
		            	Nombre:<input value="{{ $cliente->nombre }}" type="text" name="nameP"  class="form-control" required>
		          	</p>
		          	<p>
		            	Telefono:<input value="{{ $cliente->telefono }}" type="text" name="tel"  class="form-control" required>
		          	</p>
		          	<p>
		            	Email: <input value="{{ $cliente->email }}" type="text" name="email"  class="form-control" required>
		          	</p>
		          	<p>
		            	Referencia: <input value="{{ $cliente->referencia }}" type="text" name="Ref"  class="form-control" required>
		          	</p>

		          	<p>
		            	Destino:<input value="{{ $hotel->destino  }}" type="text" name="des"  class="form-control" required>
		          	</p>
		          	<p>
		            	Operador:<input value="{{ $hotel->operador}}" type="text" name="ope"  class="form-control" required>
		          	</p>
		          	<hr>
	  			<p>
					<h4>Datos del Hotel</h4>
				</p>
		          	<p>
		            	Hotel:<input value="{{ $hotel->nombreHotel }}" type="text" name="nameH"  class="form-control" required>
		          	</p>
		          	<p>
		            	Fecha de Entrada<input value="{{ $hotel->fechaDeEntrada }}" type="text" name="fechaE"  class="form-control" required>
		          	</p>
		          	<p>
		            	Fecha de Salida<input value="{{ $hotel->fechaDeSalida }}" type="text" name="fechaS"  class="form-control" required>
		          	</p>
		          	<p>
		            	Habitaciones Sencillas:<input value="{{ $hotel->sgl }}" type="text" name="habS" class="form-control" required>
		          	</p>
		          	<p>
		            	Habitaciones Dobles:<input value="{{ $hotel->dbl }}" type="text" name="habD"  class="form-control" required>
		          	</p>
		          	<p>
		            	Habitaciones Triples:<input value="{{ $hotel->tpl }}" type="text" name="habT"  class="form-control" required>
		          	</p>
		          	<p>
		            	Habitaciones Cuadruples:<input value="{{ $hotel->cpl }}" type="text" name="habC"  class="form-control" required>
		          	</p>
		             <p>
		            	Otras Habitaciones:<input value="{{ $hotel->otros }}" type="text" name="habO"  class="form-control" required>
		          	</p>
		          		<hr>
	  			<p>
					<h4>Datos del Costo</h4>
				</p>
				 <p>
		           Costo Pax:<input value="{{ $reservacion->costoPax }}" type="text" name="CostoP" placeholder="" class="form-control" required>
		         </p>
	  			<p>
	  			Costo Neto:<input value="{{ $reservacion->costoNeto}}" type="text" name="CostoN" placeholder="" class="form-control" required>
	  			</p>
	  			<p>
	  			Tiempo Limite:<input value="{{ $reservacion->tiempoLimite }}" type="text" name="TiempoL" placeholder="" class="form-control" required>
	  			</p>
	  			<p>
	  			Observaciones Pax:<input value="{{$reservacion->observacionesPax }}" type="text" name="ObPax" placeholder="" class="form-control" required>
	  			</p>
	  			<p>
	  			Observaciones Agencia:<input value="{{ $reservacion->observacionesAgencia}}" type="text" name="ObAgencia" placeholder="" class="form-control" required>
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