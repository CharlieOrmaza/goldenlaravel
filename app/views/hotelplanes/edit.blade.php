@extends('layouts.default')
@section('content')
@include ('includes.menu')


<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

		$.get("/clientes/lista/{{Session::get('papeleta')}}", function (data) {
			$('#tablaClientes').html(data);
		});

	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var modo=1;
		$('#nuevoCliente').click(function(e){
			e.preventDefault();
			$('#modal1 .modal-title').html('Buscar Pax');
			$('#modal1 .modal-body').html('<img src="/img/preloader-01.gif" height="20">');
			$('#modal1 .btn-primary').show();
			$('#modal1 .btn-primary').html('Nuevo Pax');
			$('#modal1 .btn-default').html('Cerrar');
			$('#modal1').modal();
			$.get("/clientes/buscar/{{Session::get('papeleta')}}", function (data) {
				$('#modal1 .modal-body').html(data);
			});
		});

		$("#modal1").on('hidden.bs.modal', function (e) {
			$('#modal1 .modal-body').html("");
			$('#tablaClientes').html('<img src="/img/preloader-01.gif">');
	    	$.get("/clientes/lista/{{Session::get('papeleta')}}", function (data) {
				$('#tablaClientes').html(data);
			});
	    });

	    $('#modal1 .btn-primary').click(function(e){
	    	//$('#modal1').modal('toggle');
	    	if(modo==1){
	    		modo=2;
	    		$('#modal1 .modal-title').html('Nuevo Pax');
				$('#modal1 .modal-body').html('<img src="/img/preloader-01.gif" height="20">');
				//$('#modal1 .btn-primary').hide();
				$('#modal1 .btn-primary').html('Regresar');
				$('#modal1 .btn-default').html('Cerrar');
				//$('#modal1').modal();
				$.get("/clientes/nuevopax/create", function (data) {
					$('#modal1 .modal-body').html(data);
				});
	    	}else{
	    		modo=1;
	    		$('#modal1 .modal-title').html('Buscar Pax');
				$('#modal1 .modal-body').html('<img src="/img/preloader-01.gif" height="20">');
				//$('#modal1 .btn-primary').show();
				$('#modal1 .btn-primary').html('Nuevo Pax');
				$('#modal1 .btn-default').html('Cerrar');
				$('#modal1').modal();
				$.get("/clientes/buscar/{{Session::get('papeleta')}}", function (data) {
					$('#modal1 .modal-body').html(data);
				});
	    	}
	    });

	});
</script>
	<h1>Hoteles + Avion</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Agregar Hotel y Avion </h4>
  		</div>
  		<div class="panel-body">
  			@if (!empty($hotelplane))
    			<form method="post" action="/hotelAvion/update/{{ $hotelplane->id }}">
        <p>
					<h3>Papeleta</h3><hr>
				</p>
  		        <p>
  		        	Numero de Papeleta: <b>{{Session::get('papeleta')}}</b>
				</p>
  			    <p>
					<h3>Datos del Pax</h3><hr>
				</p>
  			    <p>
					<button class="btn btn-primary btn-lg" id="nuevoCliente" >
					  <img src="/img/iconos/buscar.png" height="20"> Buscar Pax
					</button>
		    		<div class="modal fade" id="modal1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title text-primary"></h4>
					      </div>
					      <div class="modal-body">
					      </div>
					      <div class="modal-footer">
					        <button type="button" id="modal-button1" class="btn btn-default" data-dismiss="modal"></button>
					        <button type="button" id="modal-button2" class="btn btn-primary"></button>
					      </div>
					    </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					<div id='tablaClientes' align="center"><img src="/img/preloader-01.gif"></div>
  			    </p>
                <p>

	  			<p>
					<h4>Datos del Hotel</h4>
				</p>
		          	<p>
		            	Destino:<input  value="{{ $hotelplane->destino  }}" type="text" name="des" placeholder="Destino" class="form-control" required>
		          	</p>
		          	<p>
		            	Operador:<input value="{{ $hotelplane->operador}}" type="text" name="ope" placeholder="Operador" class="form-control" required>
		          	</p>

		          	<p>
		            	Hotel:<input value="{{ $hotelplane->nombreHotel }}" type="text" name="nameH"   placeholder="Nombre del Hotel" class="form-control" required>
		          	</p>
		          	<p>
		            	Fecha de Entrada:<input value="{{ $hotelplane->fechaDeEntrada }}" type="date" name="fechaE"  placeholder="Fecha de Entrada al hotel" class="form-control" required>
		          	</p>
		          	<p>
		            	Fecha de Salida: <input value="{{ $hotelplane->fechaDeSalida }}" type="date" name="fechaS"   placeholder="Fecha de Salida del hotel" class="form-control" required>
		          	</p>
		          	<p>
		            	Habitaciones Sencillas:<input value="{{ $hotelplane->sgl }}" type="text" name="habS"  placeholder="Numero de Habitaciones" class="form-control" >
		          	</p>
		          	<p>
		            	Habitaciones Dobles:<input value="{{ $hotelplane->dbl }}" type="text" name="habD"  placeholder="Numero de Habitaciones" class="form-control" >
		          	</p>
		          	<p>
		            	Habitaciones Triples:<input value="{{ $hotelplane->tpl }}" type="text" name="habT" placeholder="Numero de Habitaciones" class="form-control" >
		          	</p>
		          	<p>
		            	Habitaciones Cuadruples:<input value="{{ $hotelplane->cpl }}" type="text" name="habC" placeholder="Numero de Habitaciones" class="form-control" >
		          	</p>
		             <p>
		            	Otras Habitaciones:<input value="{{ $hotelplane->otros }}" type="text" name="habO" placeholder="Numero de Habitaciones" class="form-control" >
		          	</p>
		          		<hr>
	  			<h4>Datos del Vuelo</h4>
				</p>
		          	<p>
		            	Aerolinea: <input value="{{ $hotelplane->aerolinea  }}" type="text" name="aero" placeholder="Aerolinea" class="form-control" required>
		          	</p>
		          	<p>
		            	Clave: <input value="{{ $hotelplane->clave }}" type="text" name="clave"  placeholder="Clave"  class="form-control" required>
		          	</p>
		          	<p>
		            	Equipaje: <input value="{{ $hotelplane->tarifa }}" type="text" name="equipaje" placeholder="Equipaje"  class="form-control" required>
		          	</p>
		          	<p>
		            	Tarifa: <input value="{{ $hotelplane->tarifa }}" type="text" name="tarifa" placeholder="Tarifa" class="form-control" >
		          	</p>
		          	<p>Itinerario (Ciudad Salida - Ciudad Destino - Fecha y hora de vuelo "DD/MM/AAAA - HH:MM:SS" ):

				   <textarea  name="itinerario" placeholder="Itinerario" class="form-control" >{{ $hotelplane->itinerario }}</textarea>
		            	 
		          	</p>
		          	<p>
		            	Fecha de Salida del Vuelo: <input value="{{ $hotelplane->FechaSalida }}" type="date" name="fechaS" placeholder="Fecha de Salida"  class="form-control" required>
		          	</p>
		          	<p>
		            	Fecha de Regreso del Vuelo: <input value="{{ $hotelplane->FechaRegreso}}" type="date" name="fechaR" placeholder="Fecha de Regreso" class="form-control" required>
		          	</p>
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
	  			Tiempo Limite:<input value="{{ $reservacion->tiempoLimite }}" type="date" name="tmLim" placeholder="Tiempo Limite" class="form-control" required>
	  			</p>
	  			<p>
	  			Observaciones Pax:
				   <textarea  name="obPax" placeholder="Observaciones Pax" class="form-control" >{{$reservacion->observacionesPax }}</textarea>
	  			</p>
	  			<p>
	  			Observaciones Agencia:
	  			<textarea name="obAg" placeholder="Observaciones Agencia" class="form-control" >{{ $reservacion->observacionesAgencia }}</textarea>
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