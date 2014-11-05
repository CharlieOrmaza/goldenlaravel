@extends('layouts.default')
@section('content')

<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>


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
	  			<hr>
	  			     <p>
					<h4>Datos del Pax</h4>
				    </p>
			    	<script type="text/javascript">
						$(document).ready(function(){
							$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

							$.get("/clientes/lista2/{{$hotel->noPapeleta }}", function (data) {
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
	  				Hotel: <strong>{{ $hotel->nombreHotel }}</strong>
	  			</p>
				<p>
	  				Plan: <strong>{{ $hotel->plan }}</strong>
	  			</p>
	  			<p>
	  				Confirmar Hotel: <strong>{{ $hotel->confirmoHotel }}</strong>
	  			</p>
				<p>
	  				Destino: <strong>{{ $hotel->destino }}</strong>
	  			</p>
	  			<p>
	  				Operador: <strong>{{ $hotel->operador}}</strong>
	  			</p>
	  			<p>
	  				Fecha de Entrada: <strong>{{ $hotel->fechaDeEntrada }}</strong>
	  			</p>
	  			<p>
	  				Fecha de Salida: <strong>{{ $hotel->fechaDeSalida }}</strong>
	  			</p>
	  			<p>
	  				Junior: <strong>{{ $hotel->junior }}</strong>
	  			</p>
	  			<p>
	  				Tarifa: <strong>{{ $hotel->tarifa}}</strong>
	  			</p>
	  			<p>
	  				Clave: <strong>{{ $hotel->clave }}</strong>
	  			</p>
	  			<p>
	  				Menores de 12: <strong>{{ $hotel->menores12 }}</strong>
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
	          No existe información para éste Hotel.
	        </p>
	        @endif
	        <a href="/consultas" class="btn btn-default">Regresar</a>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop