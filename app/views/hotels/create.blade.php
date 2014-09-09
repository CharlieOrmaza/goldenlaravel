@extends('layouts.default')
@section('content')
@include ('includes.menu')
	
	<h1>GoldenTour</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo Hotel</h4>
  		</div>
<form method="post" action="store">
  		<div class="panel-body">
                 <p>
					<h3>No. Papeleta</h3><hr>
				</p>
  		         <p>
					<input type="text" name="numP" placeholder="Numero de Papeleta" class="form-control" required>
				</p>
  			     <p>
					<h3>Datos del Pax</h3><hr>
				</p>
  			     <p>
					<input type="text" name="nameP" placeholder="Nombre del Pasajero" class="form-control" required>
				</p>
				<p>
					<input type="text" name="tel" placeholder="Telefono" class="form-control" required>
				</p>
				<p>
					<input type="text" name="email" placeholder="Email" class="form-control" required>
				</p>
				<p>
					<input type="text" name="ref" placeholder="Referecia" class="form-control" required>
				</p>
				<p>
					<input type="text" name="des" placeholder="Destino" class="form-control" required>
				</p>
				<p>
					<input type="text" name="ope" placeholder="Operador" class="form-control" required>
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
				<input type="text" name="costoP" placeholder="Costo Pax" class="form-control" required>
				</p>
				<p>
				    
					<input type="text" name="costoN" placeholder="Costo Neto" class="form-control" required>
				</p>
				<p>
				   <textarea  name="obPax" placeholder="Observaciones Pax" class="form-control" required> </textarea>
					
				</p>
				<p>
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

						