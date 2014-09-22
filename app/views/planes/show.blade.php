@extends('layouts.default')
@section('content')
@include ('includes.menu')
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	<h1>Vuelos</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información del Vuelo</h4>
  		</div>

  		<div class="panel-body">
	  		@if (!empty($plane))
	  			<p>
	  				Numero de Papeleta: <strong>{{ $plane->papeleta }}</strong>
	  			</p>
	  			<hr>
	  			
	  			     <p>
					<h4>Datos del Pax</h4>
				    </p>
			    	<script type="text/javascript">
						$(document).ready(function(){
							$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

							$.get("/clientes/lista2/{{$plane->papeleta }}", function (data) {
								$('#tablaClientes').html(data);
							});

						});
					</script>
						<div id='tablaClientes' align="center"><img src="/img/preloader-01.gif"></div>

	  			<hr>
	  			<p>
					<h4>Datos del Vuelo</h4>
				</p>
				<p>
	  				Destino: <strong>{{ $plane->destino }}</strong>
	  			</p>
	  			<p>
	  				Operador: <strong>{{ $plane->operador}}</strong>
	  			</p>
	  			<p>
	  				Aerolinea: <strong>{{$plane->aerolinea }}</strong>
	  			</p>
	  			<p>
	  				Clave: <strong>{{ $plane->clave }}</strong>
	  			</p>
	  			<p>
	  				Equipaje: <strong>{{ $plane->equipaje }}</strong>
	  			</p>
	  			<p>
	  				Tarifa: <strong>{{ $plane->tarifa  }}</strong>
	  			</p>
	  			<p>
	  				Itinerario: <strong>{{ $plane->itinerario }}</strong>
	  			</p>
				 <p>
	  				Fecha de Salida: <strong>{{ $plane->FechaSalida }}</strong>
	  			</p>
	  			<p>
	  				Fecha de Regreso: <strong>{{ $plane->FechaRegreso }}</strong>
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
	          No existe información para éste Avion.
	        </p>
	        @endif
	        <a href="/consultas" class="btn btn-default">Regresar</a>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop