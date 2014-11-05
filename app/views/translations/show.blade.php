@extends('layouts.default')
@section('content')
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	<h1>Traslados</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información del Traslado</h4>
  		</div>

  		<div class="panel-body">
	  		@if (!empty($translation))
	  			<p>
	  				Numero de Papeleta: <strong>{{ $translation->papeleta }}</strong>
	  			</p>
	  			<hr>
	  			
	  			<p>
			    <h4>Datos del Pax</h4>
				</p>
			    <script type="text/javascript">
						$(document).ready(function(){
							$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

							$.get("/clientes/lista2/{{$translation->papeleta }}", function (data) {
								$('#tablaClientes').html(data);
							});

						});
				</script>
				<div id='tablaClientes' align="center"><img src="/img/preloader-01.gif"></div>

	  			<hr>
	  			<p>
					<h4>Datos del Traslado</h4>
				</p>
				
	  			<p>
	  				Tipo de Traslado: <strong>{{$translation->tipo }}</strong>
	  			</p>
	  			<p>
	  				Numero de Personas: <strong>{{ $translation->numeroPersonas }}</strong>
	  			</p>
	  			<p>
	  				Origen: <strong>{{ $translation->origen}}</strong>
	  			</p>
	  			<p>
	  				Destino: <strong>{{ $translation->destino }}</strong>
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
	          No existe información para éste Traslado.
	        </p>
	        @endif
	        <a href="/consultas" class="btn btn-default">Regresar</a>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop