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

	  		 <h4>Datos del Hotel</h4>
				</p>
				<table class="table">
                    	<thead>
                    		<td></td><td></td><td></td>
                    	</thead>
                    	<tbody>
				        	<tr>
				      			<th>
				      				 Hotel: 
				      			</th>
				      			<th>
				      				Plan:
				      			</th> 
				      			<th>
				      				Confirmo Hotel:
				      			</th> 
				        	</tr>
				        	<tr>
				        		<th>
				        			<input value="{{ $hotelplane->nombreHotel }}" type="text" name="nameH"  placeholder="Nombre del Hotel" class="form-control" required>
				        		</th>
				        		<th>
				      				<input  value="{{ $hotelplane->plan  }}" type="text" name="plan" placeholder="Tipo de Plan" class="form-control" required>
				      			</th>
				      			<th>
				      				<input value="{{ $hotelplane->confirmoHotel }}" type="text" name="confirmoHotel" placeholder="Confirmar hotel" class="form-control" >
				      			</th>
				        	</tr>

				        <tbody>
                 </table>
				<table class="table">
                    	<thead>
                    		<td></td><td></td><td></td>
                    	</thead>
                    	<tbody>
				        	<tr>
				        	    <th>
				      			    Destino: 
				      			</th>
				      			<th>
				      				Operador:
				      			</th>
				      			<th>
				      				 Fecha de Entrada: 
				      			</th>
				      			<th>
				      			    Fecha de Salida: 
				      			</th>
				      			
				        	</tr>
				        	<tr>
				        	    <th>
				      				<input  value="{{ $hotelplane->destino  }}" type="text" name="des" placeholder="Destino" class="form-control" required>
				      			</th>
				      			<th>
				      				<input value="{{ $hotelplane->operador}}" type="text" name="ope" placeholder="Operador" class="form-control" required>
				      			</th>
				        		<th>
				        			<input value="{{ $hotelplane->fechaDeEntrada }}" type="date" name="fechaE"  class="form-control" required>
				        		</th>
				        		<th>
				      				<input value="{{ $hotelplane->fechaDeSalida }}" type="date" name="fechadeS"  class="form-control" required>
				      			</th>
				        	</tr>

				        <tbody>
                 </table>    
		           	
		        <table class="table">
                    	<thead>
                    		<td></td><td></td><td></td><td></td>
                    	</thead>
                    	<tbody>
				        	<tr>
				      			<th>
				      				 Junior: 
				      			</th>
				      			<th>
				      				Tarifa: 
				      			</th>
				      			<th>
				      				Clave: 
				      			</th>
				      			<th>
				      				Menores de 12: 
				      			</th>
				        	</tr>
				        	<tr>
				        		<th>
				        			<input value="{{ $hotelplane->junior }}" type="number" name="junior" class="form-control" >
				        		</th>
				        		<th>
				      				<input value="{{ $hotelplane->tarifaHotel }}" type="number" name="tarifa"  class="form-control" >
				      			</th>
				      			<th>
				      				<input value="{{ $hotelplane->claveHotel }}" type="text" name="clave" placeholder="Clave" class="form-control" >
				      			</th>
				      			<th>
				      				<input value="{{ $hotelplane->menores12 }}" type="number" name="menores12"  class="form-control" >
				      			</th>
				        	</tr>
				        <tbody>
                </table>

		        <table class="table">
                    	<thead>
                    		<td></td><td></td><td></td><td></td>
                    	</thead>
                    	<tbody>
				        	<tr>
				      			<th>
				      				 Habitaciones Sencillas: 
				      			</th>
				      			<th>
				      				Habitaciones Dobles: 
				      			</th>
				      			<th>
				      				Habitaciones Triples: 
				      			</th>
				      			<th>
				      				Habitaciones Cuadruples: 
				      			</th>
				      			<th>
				      				Otras Habitaciones: 
				      			</th>
				        	</tr>
				        	<tr>
				        		<th>
				        			<input value="{{ $hotelplane->sgl }}" type="number" name="habS" class="form-control" >
				        		</th>
				        		<th>
				      				<input value="{{ $hotelplane->dbl }}" type="number" name="habD"  class="form-control" >
				      			</th>
				      			<th>
				      				<input value="{{ $hotelplane->tpl }}" type="number" name="habT"  class="form-control" >
				      			</th>
				      			<th>
				      				<input value="{{ $hotelplane->cpl }}" type="number" name="habC"  class="form-control" >
				      			</th>
				      			<th>
				      				<input value="{{ $hotelplane->otros }}" type="number" name="habO"  class="form-control" >
				      			</th>
				        	</tr>
				        <tbody>
                </table>
		          		<hr>
	  			<h4>Datos del Vuelo</h4>
				</p>
		        <p>
                    <table class="table">
                    	<thead>
                    		<td></td><td></td><td></td><td></td>
                    	</thead>
                    	<tbody>
				        	<tr>
				      			<th>
				      				Aerolinea: 
				      			</th>
				      			<th>
				      				Clave: 
				      			</th>
				        	</tr>
				        	<tr>
				      			<th>
				      				<input value="{{ $hotelplane->aerolinea  }}" type="text" placeholder="Aerolinea" name="aero"  class="form-control" required>
				      			</th>
				      			<th>
				      				<input value="{{ $hotelplane->clave }}" type="text" placeholder="Clave" name="clave" placeholder="" class="form-control" required>
				      			</th>

				        	</tr>
				        <tbody>
                    </table>	
		          	</p>
		          	<table class="table">
                    	<thead>
                    		<td></td><td></td><td></td><td></td>
                    	</thead>
                    	<tbody>
				        	<tr>
				      			<th>
				      				Equipaje: 
				      			</th>
				      			<th>
				      				Tarifa: 
				      			</th>
				      			<th>
				      				Fecha de Salida:
				      			</th>
				      			<th>
				      				Fecha de Regreso: 
				      			</th>
				        	</tr>
				        	<tr>
				        		<th>
				        			<input value="{{ $hotelplane->equipaje }}" type="text" placeholder="Equipaje" name="equipaje"  class="form-control" required>
				        		</th>
				        		<th>
				      				<input value="{{ $hotelplane->tarifa }}" type="text" placeholder="Tarifa" name="tarifa" class="form-control" required>
				      			</th>
				      			<th>
				      				<input value="{{ $hotelplane->FechaSalida }}" type="date" name="fechaS"  class="form-control" required>
				      			</th>
				      			<th>
				      				<input value="{{ $hotelplane->FechaRegreso}}" type="date" name="fechaR"  class="form-control" required>
				      			</th>

				        	</tr>
				        <tbody>
                    </table>
		          	
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
				<h4>Datos del Costo</h4>
	  				<table class="table">
                    	<thead>
                    		<td></td><td></td><td></td><td></td>
                    	</thead>
                    	<tbody>
				        	<tr>
				      			<th>
				      				 Costo Pax: 
				      			</th>
				      			<th>
				      				Costo Neto: 
				      			</th>
				      			<th>
				      				Tiempo Limite: 
				      			</th>
				        	</tr>
				        	<tr>
				        		<th>
				        			<input value="{{ $reservacion->costoPax }}" type="number" name="costoP" placeholder="Costo Pax" class="form-control" required>
				        		</th>
				        		<th>
				      				<input value="{{ $reservacion->costoNeto}}" type="number" name="costoN" placeholder="Costo Neto"  class="form-control" required>
				      			</th>
				      			<th>
				      				<input value="{{ $reservacion->tiempoLimite }}" type="date" name="tmLim" placeholder="Tiempo Limite" class="form-control" required>
				      			</th>
				        	</tr>
				        <tbody>
                    </table>
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
	            	No existe información para este Hotel+Avion.
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