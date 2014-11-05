@extends('layouts.default')
@section('content')
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	<h1>Renta de Autos</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información de la Renta del auto</h4>
  		</div>

  		<div class="panel-body">
	  		@if (!empty($autosrentas))
	  			<p>
	  				Numero de Papeleta: <strong>{{ $autosrentas->papeleta }}</strong>
	  			</p>
	  			<hr>
	  			
	  			     <p>
					<h4>Datos del Pax</h4>
				    </p>
			    	<script type="text/javascript">
						$(document).ready(function(){
							$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

							$.get("/clientes/lista2/{{$autosrentas->papeleta }}", function (data) {
								$('#tablaClientes').html(data);
							});

						});
					</script>
						<div id='tablaClientes' align="center"><img src="/img/preloader-01.gif"></div>

	  			<hr>
	  			<p>
					<h4>Datos del Renta</h4>
				</p>
	  			<p>
	  				Operador: <strong>{{ $autosrentas->operador}}</strong>
	  			</p>
                <p>
	  				Arrendadora: <strong>{{ $autosrentas->arrendadora }}</strong>
	  			</p>
	  			<p>
	  				Tipo De Auto: <strong>{{ $autosrentas->tipoDeAuto }}</strong>
	  			</p>
	  			<p>
	  				Fecha de Entraga: <strong>{{ $autosrentas->fechaEntraga }}</strong>
	  			</p>
	  			<p>
	  				Fecha de Devolucion: <strong>{{ $autosrentas->fechaDevolucion}}</strong>
	  			</p>
                <p>
	  				Clave de la Arrendadora: <strong>{{ $autosrentas->claveArrendadora }}</strong>
	  			</p>
	  			<p>
	  				Clave del Operador: <strong>{{ $autosrentas->claveOperador }}</strong>
	  			</p>
	  			<p>
	  				Lugar y hora De la Entrega: <strong>{{ $autosrentas->LugaryhoraDeEntrega }}</strong>
	  			</p>
                <p>
	  				Lugar y hora De la Devolucion: <strong>{{ $autosrentas->LugaryhoraDeDevolucion }}</strong>
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
	          No existe información para ésta Renta
	        </p>
	        @endif
	        <a href="/consultas" class="btn btn-default">Regresar</a>
		</div>
	</div>



	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
@stop