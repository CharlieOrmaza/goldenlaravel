@extends('layouts.default')
@section('content')
@include ('includes.menu')

	<h1>Hoteles</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información del Hotel</h4>
  		</div>

  		<div class="panel-body">
	  		@if (!empty($hotel))
	  			<p>
	  				Numero de Papeleta: <strong>{{ $hotel->noPapeleta }}</strong>
	  			</p>
	  			<p>
	  				idCliente: <strong>{{ $hotel->idCliente }}</strong>
	  			</p>
	  			<p>
	  				Destino: <strong>{{ $hotel->destino }}</strong>
	  			</p>
	  			<p>
	  				Operador: <strong>{{ $hotel->operador}}</strong>
	  			</p>
	  			<p>
	  				Hotel: <strong>{{ $hotel->nombreHotel }}</strong>
	  			</p>
	  			<p>
	  				Fecha de Entrada: <strong>{{ $hotel->fechaDeEntrada }}</strong>
	  			</p>
	  			<p>
	  				Fecha de Salida: <strong>{{ $hotel->fechaDeSalida }}</strong>
	  			</p>
	  			<p>
	  				Habitaciones Sencillas: <strong>{{ $hotel->sgl }}</strong>
	  			</p>
	  			<p>
	  				Habitaciones Dobles: <strong>{{ $hotel->dbl }}</strong>
	  			</p>
				 <p>
	  				Habitaciones Triples: <strong>{{ $hotel->tpl }}</strong>
	  			</p>
	  			<p>
	  				Habitaciones Cuadruples: <strong>{{ $hotel->cpl }}</strong>
	  			</p>
                <p>
	  				Otras Habitaciones: <strong>{{ $hotel->otros }}</strong>
	  			</p>



	        @else
	        <p>
	          No existe información para éste Hotel.
	        </p>
	        @endif
	        <a href="/hoteles" class="btn btn-default">Regresar</a>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop