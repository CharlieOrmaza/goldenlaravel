<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Clientes</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

	<style>
		body {
			width: 80%;
			margin: 20px auto;
		}
		.badge {
			float: right;
		}
	</style>
</head>
<body>
	<h1>CRUD en Laravel 4</h1>
	<nav class="navbar navbar-default" role="navigation">
  		<div class="container-fluid">
  			<div class="navbar-header">
				<a class="navbar-brand" href="#">Inicio</a>
  			</div>
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li class="active"><a href="/clientes">Todos</a></li>
        			<li><a href="/clientes/create">Nuevo</a></li>
        		</ul>
        	</div>
        </div>
    </nav>

	<div class="panel panel-success">
  		<div class="panel-heading">
  			<h4>Lista de usuarios</h4>
  		</div>

  		<div class="panel-body">
    		<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>direccion</th>
						<th>telefono</th>
						<th>email</th>
						<th>fecha de Nacimiento</th>
						<th>referencia</th>
						<th>Acciones</th>						
					</tr>
				</thead>
				<tbody>
					@foreach($clientes as $cliente)
						<tr>
							<td>{{ $cliente->id }}</td>
							<td>{{ $cliente->nombre }}</td>
							<td>{{ $cliente->direccion }}</td>
							<td>{{ $cliente->telefono }}</td>
							<td>{{ $cliente->email }}</td>
							<td>{{ $cliente->fechaDeNacimiento }}</td>
							<td>{{ $cliente->referencia }}</td>
							<td>
								<a href="/clientes/show/{{ $cliente->id }}"><span class="label label-info">Ver</span></a>
								<a href="/clientes/edit/{{ $cliente->id }}"><span class="label label-success">Editar</span></a>
								<a href="{{ url('/clientes/destroy',$cliente->id) }}"><span class="label label-danger">Eliminar</span></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
  		</div>
  	</div>
	@if(Session::has('message'))
	    <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif

</body>
</html>