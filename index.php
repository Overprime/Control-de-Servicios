
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" type="image/x-icon"
 href="/control-de-servicios/include/img/favicon.ico">

<title>Control de Servicios</title>

<!-- Bootstrap core CSS -->
<link href="/control-de-servicios/include/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="/control-de-servicios/include/css/jumbotron.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="/control-de-servicios/include/js/ie-emulation-modes-warning.js">
</script>

<!-- Placed at the end of the document so the pages load faster -->
<script src="/control-de-servicios/include/js/jquery.min.js"></script>
<script src="/control-de-servicios/include/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/control-de-servicios/include/js/ie10-viewport-bug-workaround.js">
	
</script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand text-success" href="/control-de-servicios/home">Oveprime Manufacturing</a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<form class="navbar-form navbar-right" method="POST" action="validar.php" autocomplete="Off">
<div class="form-group">
<input type="text" placeholder="usuario" name="usuario" class="form-control" required autofocus>
</div>
<div class="form-group">
<input type="password" placeholder="contraseña" name="contrasena" class="form-control" required>
</div>
<button type="submit" class="btn btn-success">Ingresar</button>
</form>
</div><!--/.navbar-collapse -->
</div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
<div class="container">
<h1 class="text-success">Control de Servicios de Taller</h1>
<p>Aplicativo que permite el control  de servicios de taller.</p>
<p><a class="btn btn-primary btn-lg" href="#" role="button">Mas información &raquo;</a></p>
</div>
</div>

<div class="container">
<!-- Example row of columns -->
<div class="row">
<div class="col-md-4">
<h2 class="text-success">Maquinas</h2>
<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
<p><a class="btn btn-success" href="#" role="button">Mas detalles &raquo;</a></p>
</div>
<div class="col-md-4">
<h2 class="text-primary">Contratos</h2>
<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
<p><a class="btn btn-primary" href="#" role="button">Mas detalles &raquo;</a></p>
</div>
<div class="col-md-4">
<h2 class="text-warning">Equipo de trabajo</h2>
<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
<p><a class="btn btn-warning" href="#" role="button">Mas detalles &raquo;</a></p>
</div>
</div>

<hr>

<footer>
<p>&copy; Oveprime Manufacturing S.A. 2015</p>
</footer>
</div> <!-- /container -->



</body>
</html>
