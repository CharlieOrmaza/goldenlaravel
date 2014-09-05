<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel CRUD</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap-theme.min.css">

	<style>
		body {
			width: 450px;
			margin: 50px auto;
		}
		.badge {
			float: right;
		}
	</style>
</head>
<body>
	<h1>Nuevo Cliente</h1>
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
  			<div class="navbar-header">
				<a class="navbar-brand" href="#">CodeJobs</a>
  			</div>
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li><a href="/clientes">Todos</a></li>
        			<li class="active"><a href="/clientes/create">Nuevo</a></li>
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Nuevo Cliente</h4>
  		</div>

  		<div class="panel-body">
  			<form method="post" action="store">
				<p>
					<input type="text" name="nombre" placeholder="Nombre" class="form-control" required>
				</p>
				<p>
					<input type="text" name="direccion" placeholder="Direccion" class="form-control" required>
				</p>
				<p>
					<input type="text" name="telefono" placeholder="Telefono" class="form-control" required>
				</p>
				<p>
					<input type="text" name="email" placeholder="Correo" class="form-control" required>
				</p>
				<p>
					<input type="date" name="fechaDeNacimiento" placeholder="Fecha de Nacimiento" class="form-control" required>
				</p>
				<p>
					<input type="text" name="pasaporte" placeholder="Pasaporte" class="form-control" required>
				</p>
				<p>
					<input type="text" name="referencia" placeholder="Referencia" class="form-control" required>
				</p>

				<p>
					<input type="submit" value="Guardar" class="btn btn-success">
				</p>
			</form>
		</div>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
</body>
</html>