<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();

    });
</script>
<div class="panel-body">
	<table class="table table-striped" id="table_id">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Fecha de Nacimiento</th>
				<th>Referencia</th>
				<th>Seleccionar</th>
			</tr>
		</thead>
		<tbody>
		@if (!empty($clientes))
		@foreach($clientes as $cliente)
			<tr>
				<td>{{ $cliente->id }}</td>
				<td>{{ $cliente->nombre }}</td>
				<td>{{ $cliente->fechaDeNacimiento }}</td>
				<td>{{ $cliente->referencia }}</td>
				<td>
					<a href="/clientes/show/{{ $cliente->idCliente }}"><span class=""><img src="/img/iconos/agregar.png" alt="" height="20"></span></a>
				</td>
			</tr>
		@endforeach
		@else
			<tr>
				<th colspan="5">
	            	No hay clientes por mostrar
	          	</th>
          	</tr>
		@endif
		</tbody>
	</table>
</div>