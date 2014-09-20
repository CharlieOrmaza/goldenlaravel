
<script type="text/javascript">
    $(document).ready( function () {
        $('#formDinamico').on('submit', function(){
			$('#mensaje').hide();
			var inputs= $("#formDinamico :input").serializeArray();
			$.post( $("#formDinamico").attr("action"), inputs , function(info){
				$('#mensaje').show();
				$('#mensaje').html(info);
			});
			return false;
		});
    });
</script>
<div class="alert alert-success" id="mensaje" style="display: none"></div>
<div class="panel panel-success">
	<div class="panel-body">
		<form method="post" id="formDinamico" action="/clientes/nuevopax/store">
		<p>
			Nombre:
			<input type="text" name="nombre" placeholder="Nombre" class="form-control" required>
		</p>
		<p>
			Direccion:
			<input type="text" name="direccion" placeholder="Direccion" class="form-control" >
		</p>
		<p>
			Telefono:
			<input type="text" name="telefono" placeholder="Telefono" class="form-control" required>
		</p>
		<p>
			Correo:
			<input type="text" name="email" placeholder="Correo" class="form-control" >
		</p>
		<p>
			Fecha de Nacimiento:
			<input type="date" name="fechaDeNacimiento" placeholder="Fecha de Nacimiento" class="form-control" required>
		</p>
		<p>
			Pasaporte:
			<input type="text" name="pasaporte" placeholder="Pasaporte" class="form-control" >
		</p>
		<p>
			Referenia:
			<input type="text" name="referencia" placeholder="Referencia" class="form-control" >
		</p>

		<p>
			<input type="submit" class="btn btn-success" id="botonFormDinamico" value="Guardar">
		</p>
	</form>
	</div>
</div>
