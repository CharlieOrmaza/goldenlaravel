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
	<h1>Cruceros</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Actualizar Crucero</h4>
  		</div>
                 
  		<div class="panel-body">
  			@if (!empty($cruceros))
    			<form method="post" action="/cruceros/update/{{ $cruceros->id }}">
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
					<h4>Datos del Crucero</h4>
				    </p>
				    <table class="table">
                    	<thead>
                    		<td></td><td></td><td></td><td></td>
                    	</thead>
                    	<tbody>
				        	<tr>
				      			<th>
				      				 Operador: 
				      			</th>
				      			<th>
				      				Nombre del Barco: 
				      			</th>
				      			<th>
				      			    Numero de Personas:
				      			</th>
				        	</tr>
				        	<tr>
				        		<th>
				        			<input  value="{{ $cruceros->operador  }}" type="text" name="ope"  placeholder="Operador" class="form-control" required>
				        		</th>
				        		<th>
				      				<input value="{{ $cruceros->nombreBarco }}" type="text" name="nombreBarco" placeholder="Nombre del Barco"  class="form-control" required>
				      			</th>
				        		<th>
				        		    <input value="{{ $cruceros->numeroPersonas }}" type="number" placeholder="Numero de Personas" name="numeroPersonas"  class="form-control" required>
				      			</th>
				        	</tr>
				        <tbody>
                    </table>
		          	<p>
		            	Naviera:  <input value="{{ $cruceros->naviera}}" type="text" name="naviera" placeholder="Naviera" class="form-control" required>
		          	</p>
		          	<p>
		            	Descripcion de la Ruta: 
		            	<textarea  name="desR" placeholder="Descripcion de la ruta" class="form-control" >{{ $cruceros->descripcionRuta}}</textarea>
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
	                	No existe información para este Crucero.
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