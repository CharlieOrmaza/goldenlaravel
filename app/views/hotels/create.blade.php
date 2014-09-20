@extends('layouts.default')
@section('content')
@include ('includes.menu')

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

		$.get("/clientes/lista/2000", function (data) {
			$('#tablaClientes').html(data);
		});

	});
</script>
<script type="text/javascript">
	$(document).ready(function(){

		$('#nuevoCliente').click(function(e){
			e.preventDefault();
			$('#modal1 .modal-title').html('Buscar Pax');
			$('#modal1 .modal-body').html('<img src="/img/preloader-01.gif" height="20">');
			$('#modal1 .btn-primary').html('Continuar');
			$('#modal1 .btn-default').html('Cerrar');
			$('#modal1').modal();
			$.get("/clientes/buscar/2000", function (data) {
				$('#modal1 .modal-body').html(data);
			});
		});

	});
</script>

	<h1>GoldenTour</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo Hotel</h4>
  		</div>
<form method="post" action="store">
  		<div class="panel-body">
                <p>
					<h3>Papeleta</h3><hr>
				</p>
  		        <p>
					<input type="text" name="numP" placeholder="Numero de Papeleta" class="form-control" required>
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
					<h3>Datos del hotel</h3><hr>
				</p>
                <p>
                	Hotel:
					<input type="text" name="nameH" placeholder="Hotel" class="form-control" required>
				</p>
				<p>
					Fecha de Entrada:
					<input type="date" name="fechaE" placeholder="Fecha de entrada" class="form-control" required>
				</p>
				<p>
					Fecha de Salida:
					<input type="date" name="fechaS" placeholder="" class="form-control" required>
				</p>

				<p>
					Habitaciones Sencilla:
					<input type="number" name="habS" placeholder="Habitaciones Sencilla" class="form-control">
				</p>

				<p>
					Habitaciones Dobles:
					<input type="number" name="habD" placeholder="Habitaciones Dobles" class="form-control">
				</p>

				<p>
					Habitaciones Triples:
					<input type="number" name="habT" placeholder="Habitaciones Triples"  class="form-control">
				</p>

				<p>
					Habitaciones Cuadruples:
					<input type="number" name="habC" placeholder="Habitaciones Cuadruples" class="form-control">
				</p>

				<p>
					Otras Habitaciones:
					<input type="number" name="habO" placeholder="Otras Habitaciones" class="form-control">
				</p>

				<p>
					<h3>Datos del Costo</h3><hr>
				</p>
				<p>
					Costo Pax:
					<input type="text" name="costoP" placeholder="Costo Pax" class="form-control" required>
				</p>
				<p>
					Costo Neto:    
					<input type="text" name="costoN" placeholder="Costo Neto" class="form-control" required>
				</p>
				<p>
					Tiempo Limite:
					<input type="date" name="tmLim" placeholder="Tiempo Limite" class="form-control" required>
				</p>
				<p>
					Observaciones Pax:
				   <textarea  name="obPax" placeholder="Observaciones Pax" class="form-control" required> </textarea>
					
				</p>
				<p>
					Observaciones Agencia:
					<textarea name="obAg" placeholder="Observaciones Agencia" class="form-control" required> </textarea>
				</p>

				<p>
					<input type="submit" value="Guardar" class="btn btn-success">
					<a href="/consultas" class="btn btn-default" > Regresar</a>
				</p>


			
		</div>

		</form>
	</div>





	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif

						