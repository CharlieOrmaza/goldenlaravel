<div class="panel-body">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Direccion</th>
				<th>Telefono</th>
				<th>Email</th>
				<th>Fecha de Nacimiento</th>
				<th>Referencia</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
		@if (!empty($consultas))
		@foreach($consultas as $consulta)
			<tr>
				<td>{{ $consulta->idCliente }}</td>
				<td>{{ $consulta->nombre }}</td>
				<td>{{ $consulta->direccion }}</td>
				<td>{{ $consulta->telefono }}</td>
				<td>{{ $consulta->email }}</td>
				<td>{{ $consulta->fechaDeNacimiento }}</td>
				<td>{{ $consulta->referencia }}</td>
				<td>
					<a href="/clientes/edit/{{ $consulta->idCliente }}"><span class="label label-success">Editar</span></a>
					<a href="{{ url('/clientes/cancelar',$consulta->papeletaXClientes_id) }}"><span class="label label-danger">Eliminar</span></a>
				</td>
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