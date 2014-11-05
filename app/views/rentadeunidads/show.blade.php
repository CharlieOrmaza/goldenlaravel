@extends('layouts.default')
@section('content')
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	<h1>Renta de Unidades</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Información de la Renta de Unidad</h4>
  		</div>

  		<div class="panel-body">
	  		@if (!empty($rentadeunidads))
	  			<p>
	  				Numero de Papeleta: <strong>{{ $rentadeunidads->papeleta }}</strong>
	  			</p>
	  			<hr>
	  			
	  			     <p>
					<h4>Datos del Pax</h4>
				    </p>
			    	<script type="text/javascript">
						$(document).ready(function(){
							$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

							$.get("/clientes/lista2/{{$rentadeunidads->papeleta }}", function (data) {
								$('#tablaClientes').html(data);
							});

						});
					</script>
						<div id='tablaClientes' align="center"><img src="/img/preloader-01.gif"></div>

	  			<hr>
	  			<p>
					<h4>Datos de la Renta de Unidad</h4>
				</p>
				<p>
	  				Empresa Turistica <strong>{{ $rentadeunidads->empresaTuristica }}</strong>
	  			</p>
	  			<p>
	  				Tipo de Unidad: <strong>{{ $rentadeunidads->tipoUnidad }}</strong>
	  			</p>
	  			<p>
	  				Tipo: <strong>{{ $rentadeunidads->tipo }}</strong>
	  			</p>
	  			<p>
	  				Descripcion del viaje: <strong>{{ $rentadeunidads->descripcionviaje }}</strong>
	  			</p>
				<p>
	  				Fecha de Salida: <strong>{{ $rentadeunidads->fechayhoraSalida }}</strong>
	  			</p>
	  			<p>
	  				Fecha de Regreso: <strong>{{ $rentadeunidads->fechayhoraRegreso }}</strong>
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