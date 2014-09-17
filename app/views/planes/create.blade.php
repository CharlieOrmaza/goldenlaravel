@extends('layouts.default')
@section('content')
@include ('includes.menu')
	
	<h1>GoldenTour</h1>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo Vuelo</h4>
  		</div>
<form method="post" action="aviones/store">
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
  			     	Nombre Pax:
					<input type="text" name="nameP" placeholder="Nombre del Pasajero" class="form-control" required>
				</p>
				<p>
					Telefono:
					<input type="text" name="tel" placeholder="Telefono" class="form-control" required>
				</p>
				<p>
					Email:
					<input type="text" name="email" placeholder="Email" class="form-control" required>
				</p>
				<p>
					Referencia:
					<input type="text" name="ref" placeholder="Referecia" class="form-control" required>
				</p>
				<p>
					Destino:
					<input type="text" name="des" placeholder="Destino" class="form-control" required>
				</p>
				<p>
					Operador:
					<input type="text" name="ope" placeholder="Operador" class="form-control" required>
				</p>
                <p>
					<h3>Datos del Vuelo</h3><hr>
				</p>
                <p>
                	Aerolinea:
					<input type="text" name="aero" placeholder="Aerolinea" class="form-control" required>
				</p>
				<p> 
					Clave:
					<input type="text" name="clave" placeholder="Clave" class="form-control">
				</p>

				<p>
					Equipaje:
					<input type="text" name="equipaje" placeholder="Equipaje" class="form-control">
				</p>

				<p>
					Tarifa:
					<input type="text" name="tarifa" placeholder="Tarifa"  class="form-control">
				</p>

				<p>
					Itinerario:
					<textarea name="itinerario" placeholder="Itinerario" class="form-control" required> </textarea>
				</p>

                <p>
					Fecha de Salida:
					<input type="date" name="fechaS" placeholder="Fecha de entrada" class="form-control" required>
				</p>
				<p>
					Fecha de Regreso:
					<input type="date" name="fechaR" placeholder="Fecha de Salida" class="form-control" required>
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

						