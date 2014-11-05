@extends('layouts.default')
@section('content')
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	<h1>Circuitos</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información del Circuito</h4>
  		</div>

  		<div class="panel-body">
	  		@if (!empty($circuitos))
	  			<p>
	  				Numero de Papeleta: <strong>{{ $circuitos->papeleta }}</strong>
	  			</p>
	  			<hr>
	  			
	  			     <p>
					<h4>Datos del Pax</h4>
				    </p>
			    	<script type="text/javascript">
						$(document).ready(function(){
							$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

							$.get("/clientes/lista2/{{$circuitos->papeleta }}", function (data) {
								$('#tablaClientes').html(data);
							});

						});
					</script>
						<div id='tablaClientes' align="center"><img src="/img/preloader-01.gif"></div>

	  			<hr>
	  			<p>
					<h4>Datos del Circuito</h4>
				</p>
	  			<p>
	  				Operador: <strong>{{ $circuitos->operador}}</strong>
	  			</p>
                <p>
	  				Operador Mayorista: <strong>{{ $circuitos->operadorMayorista }}</strong>
	  			</p>
	  			<p>
	  				Nombre del Circuito: <strong>{{ $circuitos->nombreCircuito }}</strong>
	  			</p>
	  			<p>
	  				Descripcion del Circuito: <strong>{{ $circuitos->descripcionCircuito }}</strong>
	  			</p>
	  			<p>
	  				Numero de personas: <strong>{{ $circuitos->numeroPersonas }}</strong>
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