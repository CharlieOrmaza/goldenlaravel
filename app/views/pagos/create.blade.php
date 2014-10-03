@extends('layouts.default')
@section('content')
@include ('includes.menu')



<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="radio"]').click(function(){
			if($(this).attr("name")=="formaDePago"){
				if($(this).attr("value")=="Tarjeta"){
					$(".box2").hide();
					$(".box1").show();

				}else if($(this).attr("value")=="Cupon"){
					$(".box1").hide();
					$(".box2").show();
				}else{
					$(".box1").hide();
					$(".box2").hide();
				}


			}

        });
    });
</script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id2').DataTable({
			"dom": 'T<"clear">lfrtip',
			"tableTools": {
				"sSwfPath": "/dataTables/TableTools/swf/copy_csv_xls_pdf.swf"
			}
		} );

    });
</script>

	<h1>Pagos</h1>
	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Datos Papeleta</h4>
  		</div>

  		<div class="panel-body">
  			@if (!empty($reservacion))
  				@foreach($reservacion as $res)
  					<script type="text/javascript">
						$(document).ready(function(){
							$('#tablaClientes').html('<img src="/img/preloader-01.gif">');

							$.get("/clientes/lista/{{ $res->papeleta }}", function (data) {
								$('#tablaClientes').html(data);
							});
						});
					</script>
  					<p>
						<h3>Papeleta</h3><hr>
					</p>
	  		        <p>
	  		        	Papeleta: <strong>{{ $res->papeleta }}</strong>
					</p>
	  			    <p>
						<h3>Datos Pax</h3><hr>
					</p>
						<div id='tablaClientes' align="center"><img src="/img/preloader-01.gif"></div>
					<p>
						<h3>Datos de Reservacion</h3><hr>
					</p>
		  			<p>
		  				Costo Pax: <strong>{{ $res->costoPax }}</strong>
		  				<?php $costoPax= $res->costoPax; ?>
		  			</p>
		  			<p>
		  				Costo Neto: <strong>{{ $res->costoNeto }}</strong>
		  				<?php $costoNeto= $res->costoNeto; ?>
		  			</p>
		  			<p>
		  				Tiempo Limite: <strong>{{ $res->tiempoLimite }}(aaaa-mm-dd)</strong>
		  			</p>
					<hr>
		  			@if($res->estado != 'Cancelada' and $res->estado != 'Completo')
	  				<div class="panel panel-info">
				  		<div class="panel-heading">
				  			<h4>Nuevo Pago</h4>
				  		</div>

				  		<div class="panel-body">
				  			<form method="post" action="../store">
								<p>
									Cantidad:<input type="number" name="cantidad" placeholder="Ingresa Cantidad" class="form-control" required>
								</p>
								<p>Forma de Pago:</p>
								<p>
									Efectivo <input type="radio" name="formaDePago" value="Efectivo" checked="true">
									- Tarjeta <input type="radio" name="formaDePago" value="Tarjeta" >
									- Credito <input type="radio" name="formaDePago" value="Credito" >
									- Cupon <input type="radio" name="formaDePago" value="Cupon" >

								</p >

								<p class="box1" style="display: none;">
									Tarjeta:<input type="text" name="tarjeta" placeholder="Ingresa tipo de Tarjeta" class="form-control" >
									Comisión:<input type="number" step='any' name="comision" placeholder="Ingresa la comision si genera" class="form-control" >
								</p>

								<p class="box2" style="display: none;">
									Clave Cupon:<input type="text" name="cupon" placeholder="Ingresa Clave del Cupon" class="form-control" >

								</p>
								<p>Pago de:</p>
								<p>
									Pax <input type="radio" name="tipoDePago" value="Pax" checked="true">
									- Agencia <input type="radio" name="tipoDePago" value="Agencia" >

								</p>


								<p>
									<input type="hidden" name="papeleta" value="{{$res->papeleta}}" >
									<input type="submit" value="Guardar" class="btn btn-success">
									<a href="/consultas" class="btn btn-default">Regresar</a>
								</p>
							</form>
						</div>
					</div>
					@endif
					<?php break; ?>
  				@endforeach

  				<div class="panel panel-info">
			  		<div class="panel-heading">
			  			<h4>Pagos de Pax</h4>
			  		</div>

			  		<div class="panel-body">
			  		<table class="table table-striped" id="table_id">
						<thead>
							<tr>
								<td>Id</td>
								<td>Usuario</td>
								<td>Forma de Pago</td>
								<td>tarjeta</td>
								<td>Cupon</td>
								<td>Fecha de Pago</td>
								<td>Saldo Anterior</td>
								<td>Abono</td>
								<td>Saldo Pendiente</td>
							</tr>
						</thead>
						<tbody>
					  		@foreach($pagos as $pago)
					  			@if($pago->pagoDe=="Pax")

					  				<tr>
					  					<td>{{ $pago->id }}</td>
					  					<td>{{ $pago->usuario }}</td>
					  					<td>{{ $pago->formaDePago }}</td>
					  					<td>{{ $pago->tarjeta }}</td>
					  					<td>{{ $pago->cupon }}</td>
					  					<td>{{ $pago->created_at }}</td>
					  					<td>{{ $costoPax }}</td>
					  					<td>
					  					<?php if($pago->cantidad <= 0){
					  						echo '<span class="label label-danger">';}
							  			elseif($pago->cantidad > $costoNeto ){
							  				echo '<span class="label label-info">';}
							  			else{ echo '<span>';} ?>
							  					{{ $pago->cantidad }}
							  				</span>
							  			</td>
					  					<?php $costoPax = $costoPax-$pago->cantidad; ?>
					  					<td>{{ $costoPax }}</td>
					  				</tr>

					  			@endif
					  		@endforeach
				  		</tbody>
					</table>
					</div>
				</div>
				<div class="panel panel-info">
			  		<div class="panel-heading">
			  			<h4>Pagos de Agencia</h4>
			  		</div>

			  		<div class="panel-body">
			  		<table class="table table-striped" id="table_id2">
						<thead>
							<tr>
								<td>Id</td>
								<td>Usuario</td>
								<td>Forma de Pago</td>
								<td>tarjeta</td>
								<td>Cupon</td>
								<td>Fecha de Pago</td>
								<td>Saldo Anterior</td>
								<td>Abono</td>
								<td>Saldo Pendiente</td>
							</tr>
						</thead>
						<tbody>
					  		@foreach($pagos as $pago)
					  			@if($pago->pagoDe=="Agencia")

					  				<tr>
					  					<td>{{ $pago->id }}</td>
					  					<td>{{ $pago->usuario }}</td>
					  					<td>{{ $pago->formaDePago }}</td>
					  					<td>{{ $pago->tarjeta }}</td>
					  					<td>{{ $pago->cupon }}</td>
					  					<td>{{ $pago->created_at }}</td>
					  					<td>{{ $costoNeto }}</td>
					  					<td>
					  					<?php if($pago->cantidad <= 0){
					  						echo '<span class="label label-danger">';}
							  			elseif($pago->cantidad > $costoNeto ){
							  				echo '<span class="label label-success">';}
							  			else{ echo '<span>';} ?>
							  					{{ $pago->cantidad }}
							  				</span>
							  			</td>
					  					<?php $costoNeto = $costoNeto-$pago->cantidad; ?>
					  					<td>{{ $costoNeto }}</td>

					  				</tr>
					  				</div>
					  			@endif
					  		@endforeach
				  		</tbody>
					</table>
					</div>
				</div>

          	@else
	          	<p>
	            	No existe información para esta Papeleta.
	          	</p>
	          	<a href="/consultas" class="btn btn-default">Regresar</a>
          	@endif

      			</form>
		</div>
	</div>




@stop