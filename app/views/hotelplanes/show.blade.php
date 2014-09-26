@extends('layouts.default')
@section('content')
@include ('includes.menu')
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	<h1>Hotel + Avion</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información del Hotel+Avion</h4>
  		</div>

  		<div class="panel-body">
	  		@if (!empty($hotelplane))
	  			<p>
	  				Numero de Papeleta: <strong>{{ $hotelplane->papeleta }}</strong>
	  			</p>
	  			<hr>
	  			
	  			     <p>
					<h4>Datos del Pax</h4>
				    </p>
			    	<script type="text/javascript">
						$(document).ready(function(){
							$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

							$.get("/clientes/lista2/{{$hotelplane->papeleta }}", function (data) {
								$('#tablaClientes').html(data);
							});

						});
					</script>
						<div id='tablaClientes' align="center"><img src="/img/preloader-01.gif"></div>

	  			<hr>
	  			<p>
					<h4>Datos del Hotel</h4>
				</p>
				<p>
	  				Hotel: <strong>{{ $hotelplane->nombreHotel }}</strong>
	  			</p>
				<p>
	  				Plan: <strong>{{ $hotelplane->plan }}</strong>
	  			</p>
	  			<p>
	  				Confirmar Hotel: <strong>{{ $hotelplane->confirmoHotel }}</strong>
	  			</p>
				<p>
	  				Destino: <strong>{{ $hotelplane->destino }}</strong>
	  			</p>
	  			<p>
	  				Operador: <strong>{{ $hotelplane->operador}}</strong>
	  			</p>
	  			<p>
	  				Fecha de Entrada: <strong>{{ $hotelplane->fechaDeEntrada }}</strong>
	  			</p>
	  			<p>
	  				Fecha de Salida: <strong>{{ $hotelplane->fechaDeSalida }}</strong>
	  			</p>
	  			<p>
	  				Junior: <strong>{{ $hotelplane->junior }}</strong>
	  			</p>
	  			<p>
	  				Tarifa: <strong>{{ $hotelplane->tarifaHotel}}</strong>
	  			</p>
	  			<p>
	  				Clave: <strong>{{ $hotelplane->claveHotel }}</strong>
	  			</p>
	  			<p>
	  				Menores de 12: <strong>{{ $hotelplane->menores12 }}</strong>
	  			</p>
	  			<p>
	  				Habitaciones Sencillas: <strong>{{ $hotelplane->sgl }}</strong>
	  			</p>
	  			<p>
	  				Habitaciones Dobles: <strong>{{ $hotelplane->dbl }}</strong>
	  			</p>
				 <p>
	  				Habitaciones Triples: <strong>{{ $hotelplane->tpl }}</strong>
	  			</p>
	  			<p>
	  				Habitaciones Cuadruples: <strong>{{ $hotelplane->cpl }}</strong>
	  			</p>
                <p>
	  				Otras Habitaciones: <strong>{{ $hotelplane->otros }}</strong>
	  			</p>
	  			<hr>
	  			<p>
					<h4>Datos del Vuelo</h4>
				</p>
	  			<p>
	  				Aerolinea: <strong>{{$hotelplane->aerolinea }}</strong>
	  			</p>
	  			<p>
	  				Clave: <strong>{{ $hotelplane->clave }}</strong>
	  			</p>
	  			<p>
	  				Equipaje: <strong>{{ $hotelplane->equipaje }}</strong>
	  			</p>
	  			<p>
	  				Tarifa: <strong>{{ $hotelplane->tarifa  }}</strong>
	  			</p>
	  			<p>
	  				Itinerario: <strong>{{ $hotelplane->itinerario }}</strong>
	  			</p>
				 <p>
	  				Fecha de Salida: <strong>{{ $hotelplane->FechaSalida }}</strong>
	  			</p>
	  			<p>
	  				Fecha de Regreso: <strong>{{ $hotelplane->FechaRegreso }}</strong>
	  			</p>
                
	  			<hr>
	  			<p>
					<h4>Datos del Costo</h4>
				</p>
                 <p>
	  				Costo Pax: <strong>{{ $reservacion->costoPax }}</strong>
	  			</p>
	  			<p>
	  				Costo Neto: <strong>{{ $reservacion->costoNeto }}</strong>
	  			</p>
	  			<p>
	  				Tiempo Limite: <strong>{{ $reservacion->tiempoLimite  }}</strong>
	  			</p>
	  			<p>
	  				Observaciones Pax: <strong>{{ $reservacion->observacionesPax   }}</strong>
	  			</p>
				 <p>
	  				Observaciones Agencia: <strong>{{ $reservacion->observacionesAgencia  }}</strong>
	  			</p>
	  		
	  			


	        @else
	        <p>
	          No existe información para éste Hotel+Avion.
	        </p>
	        @endif
	        <a href="/consultas" class="btn btn-default">Regresar</a>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop