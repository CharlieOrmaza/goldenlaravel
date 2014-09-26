@extends('layouts.default')
@section('content')
@include ('includes.menu')
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	<h1>Tours</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información del Tour</h4>
  		</div>

  		<div class="panel-body">
	  		@if (!empty($tours))
	  			<p>
	  				Numero de Papeleta: <strong>{{ $tours->papeleta }}</strong>
	  			</p>
	  			<hr>
	  			
	  			     <p>
					<h4>Datos del Pax</h4>
				    </p>
			    	<script type="text/javascript">
						$(document).ready(function(){
							$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

							$.get("/clientes/lista2/{{$tours->papeleta }}", function (data) {
								$('#tablaClientes').html(data);
							});

						});
					</script>
						<div id='tablaClientes' align="center"><img src="/img/preloader-01.gif"></div>

	  			<hr>
	  			<p>
					<h4>Datos del Tour</h4>
				</p>
	  			<p>
	  				Operador: <strong>{{ $tours->operador}}</strong>
	  			</p>
                <p>
	  				Tour: <strong>{{ $tours->tour }}</strong>
	  			</p>
	  			<p>
	  				Fecha: <strong>{{ $tours->fecha }}</strong>
	  			</p>
	  			<p>
	  				Clave del Operador: <strong>{{ $tours->claveOperador }}</strong>
	  			</p>
	  			<p>
	  				Clave del Tour: <strong>{{ $tours->claveTour }}</strong>
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
	          No existe información para éste Circuito.
	        </p>
	        @endif
	        <a href="/consultas" class="btn btn-default">Regresar</a>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop