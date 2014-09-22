
<div class="panel-body">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Fecha de Nacimiento</th>
				<th>Pasaporte</th>
				<th>Referencia</th>
			</tr>
		</thead>
		<tbody>
		@if (!empty($consultas))
		@foreach($consultas as $consulta)
			<tr>
				<td>{{ $consulta->idCliente }}</td>
				<td>{{ $consulta->nombre }}</td>
				<td>{{ $consulta->fechaDeNacimiento }}</td>
				<td>{{ $consulta->pasaporte }}</td>
				<td>{{ $consulta->referencia }}</td>
				
			</tr>
		@endforeach
		@else
			<tr>
				<th colspan="8">
	            	No hay clientes por mostrar
	          	</th>
          	</tr>
		@endif
		</tbody>
	</table>
</div>