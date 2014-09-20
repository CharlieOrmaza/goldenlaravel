<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable();

    });
</script>
<div class="alert alert-success" id="mensaje" style="display: none"></div>

<div class="panel-body">
	<table class="table table-striped" id="table_id">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Fecha de Nacimiento</th>
				<th>Referencia</th>
				<th>Seleccionar</th>
			</tr>
		</thead>
		<tbody>
		@if (!empty($clientes))
		@foreach($clientes as $cliente)
			<tr id="row{{ $cliente->id }}">
				<td>{{ $cliente->nombre }}</td>
				<td>{{ $cliente->fechaDeNacimiento }}</td>
				<td>{{ $cliente->referencia }}</td>
				<td>
					<a href="#" id="idCliente{{ $cliente->id }}"><span class=""><img src="/img/iconos/agregar.png" alt="" height="20">Agregar</span></a>
				</td>
			</tr>
		@endforeach
		@else
			<tr>
	          	<td colspan="4">No hay clientes por mostrar</td>
				<td></td>
				<td></td>
				<td></td>
          	</tr>
		@endif
		</tbody>
	</table>

</div>

<script type="text/javascript">
    $(document).ready( function () {
        @if (!empty($clientes))
		@foreach($clientes as $cliente)
        $('#idCliente{{$cliente->id}}').click(function(e){
			e.preventDefault();
			$('#mensaje').hide();
			$.get("/reservation/store/{{$cliente->id}}/{{Session::get('papeleta')}}", function (data) {
				$('#mensaje').show();
				$('#mensaje').html(data);
				$('#row{{$cliente->id}}').hide();
			});
		});
        @endforeach
        @endif
    });
</script>
