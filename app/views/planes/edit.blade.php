@extends('layouts.default')
@section('content')
@include ('includes.menu')

	<h1>Vuelos</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Actualizar Vuelo</h4>
  		</div>

  		<div class="panel-body">
  			@if (!empty($plane))
    			<form method="post" action="/aviones/update/{{ $plane->id }}">
		          	<p>
		            	Numero de Papeleta: <input value="{{ $plane->papeleta }}" type="text" name="numP"  class="form-control" required>
		          	</p>
		          	<hr>
	  			     <p>
					<h4>Datos del Pax</h4>
				    </p>
		             <p>
		            	Destino:<input  value="{{ $plane->destino  }}" type="text" name="des"  class="form-control" required>
		          	</p>
		          	<p>
		            	Operador:<input value="{{ $plane->operador}}" type="text" name="ope"  class="form-control" required>
		          	</p>
		          	<hr>
	  			<p>
					<h4>Datos del Vuelo</h4>
				</p>
		          	<p>
		            	Aerolinea: <input value="{{ $plane->aerolinea  }}" type="text" name="aero"  class="form-control" required>
		          	</p>
		          	<p>
		            	Clave: <input value="{{ $plane->clave }}" type="text" name="clave"  class="form-control" required>
		          	</p>
		          	<p>
		            	Equipaje: <input value="{{ $plane->tarifa }}" type="text" name="equipaje"  class="form-control" required>
		          	</p>
		          	<p>
		            	Tarifa: <input value="{{ $plane->tarifa }}" type="text" name="tarifa" class="form-control" >
		          	</p>
		          	<p>
		            	Itinerario: <input value="{{ $plane->itinerario }}" type="text" name="itinerario"  class="form-control" >
		          	</p>
		          	<p>
		            	Fecha de Salida: <input value="{{ $plane->FechaSalida }}" type="text" name="fechaS"  class="form-control" >
		          	</p>
		          	<p>
		            	Fecha de Regreso: <input value="{{ $plane->FechaRegreso}}" type="text" name="fechaR"  class="form-control" >
		          	</p>
		          		<hr>
	  			<p>
					<h4>Datos del Costo</h4>
				</p>
				 <p>
		           Costo Pax:<input value="{{ $reservacion->costoPax }}" type="text" name="costoP"  class="form-control" required>
		         </p>
	  			<p>
	  			Costo Neto:<input value="{{ $reservacion->costoNeto}}" type="text" name="costoN"  class="form-control" required>
	  			</p>
	  			<p>
	  			Tiempo Limite:<input value="{{ $reservacion->tiempoLimite }}" type="text" name="tmLim"  class="form-control" required>
	  			</p>
	  			<p>
	  			Observaciones Pax:<input value="{{$reservacion->observacionesPax }}" type="text" name="obPax"  class="form-control" required>
	  			</p>
	  			<p>
	  			Observaciones Agencia:<input value="{{ $reservacion->observacionesAgencia}}" type="text" name="obAg"  class="form-control" required>
	  			</p>
	  			


		          	<input type="submit" value="Actualizar" class="btn btn-success">
          	@else
	          	<p>
	            	No existe información para este Hotel.
	          	</p>
          	@endif
        		<a href="/consultas" class="btn btn-default">Regresar</a>
      			</form>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop