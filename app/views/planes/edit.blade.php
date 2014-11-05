@extends('layouts.default')
@section('content')

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
	<h1>Vuelos</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Actualizar Vuelo</h4>
  		</div>
                 
  		<div class="panel-body">
  			@if (!empty($plane))
    			<form method="post" action="/aviones/update/{{ $plane->id }}">
		            <p>
						<h3>Papeleta</h3><hr>
					</p>
		          	<p>
		            	Numero de Papeleta: <b>{{Session::get('papeleta')}}</b>
		          	</p>
		          	<hr>
	  			    <p>
					<h4>Datos del Pax</h4>
				    </p>
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
		            
		          	<hr>
	  			    <p>
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
				      				Destino: 
				      			</th>
				      			<th>
				      				Operador: 
				      			</th>
				      			<th>
				      				Aerolinea: 
				      			</th>
				      			<th>
				      				Clave: 
				      			</th>
				        	</tr>
				        	<tr>
				        		<th>
				        			<input  value="{{ $plane->destino  }}" type="text" name="des"  placeholder="Destino" class="form-control" required>	
				        		</th>
				        		<th>
				      				<input value="{{ $plane->operador}}" type="text" name="ope" placeholder="Operador" class="form-control" required>
				      			</th>
				      			<th>
				      				<input value="{{ $plane->aerolinea  }}" type="text" placeholder="Aerolinea" name="aero"  class="form-control" required>
				      			</th>
				      			<th>
				      				<input value="{{ $plane->clave }}" type="text" placeholder="Clave" name="clave" placeholder="" class="form-control" required>
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
				        			<input value="{{ $plane->equipaje }}" type="text" placeholder="Equipaje" name="equipaje"  class="form-control" required>
				        		</th>
				        		<th>
				      				<input value="{{ $plane->tarifa }}" type="text" placeholder="Tarifa" name="tarifa" class="form-control" required>
				      			</th>
				      			<th>
				      				<input value="{{ $plane->FechaSalida }}" type="date" name="fechaS"  class="form-control" required>
				      			</th>
				      			<th>
				      				<input value="{{ $plane->FechaRegreso}}" type="date" name="fechaR"  class="form-control" required>
				      			</th>

				        	</tr>
				        <tbody>
                    </table>
		          	
		          	<p>Itinerario (Ciudad Salida - Ciudad Destino - Fecha y hora de vuelo "DD/MM/AAAA - HH:MM:SS" ):

				    <textarea  name="itinerario" placeholder="Itinerario" class="form-control" >{{ $plane->itinerario }}</textarea>
		          	</p>
		          	<hr>
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
	                	No existe información para este Avion.
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