<!DOCTYPE html>
<html lang="es"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Golden Tour Login</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="css/login.css">
	     </head>    
         <body>
        <div id="container">
            <div id="logo">
                <img src="img/logo/logo.png" alt="">
            </div>
            @if (Session::has('flash_error'))
                <div id="flash_error" class="alert alert-danger">{{ Session::get('flash_error') }}</div>
            @endif
            <div id="loginbox">            
                <form  action="login" method="post">
    				<p>Introduzca usuario y contraseña para continuar.</p>
                    <div class="input-group input-sm">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span><input class="form-control" id="username" placeholder="Usuario" type="text" name="username">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span><input class="form-control" id="password" placeholder="Contraseña" type="password" name="password">
                    </div>
                    <div class="form-actions clearfix">                      
 <input class="btn btn-block btn-primary btn-default" value="Acceder" type="submit">
                    </div>
                   
                </form>
                </div>
        </div>
        <script src="js/jquery.js"></script>  
        <script src="js/jquery-ui.js"></script>
        <script src="js/login.js"></script> 
</body>
</html>