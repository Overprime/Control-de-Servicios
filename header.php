					<?php
					@session_start();
					
					//Proceso de conexion con la base de datos
					include('bd/conexion.php');
					//Validar si se esta ingresando con sesion correctamente
					if (!$_SESSION){
					echo '<script language = javascript>
					alert("usuario no autenticado")
					self.location = "/control-de-servicios/"
					</script>';
					}
					?>
					<!DOCTYPE html>
					<html lang="es">
					<head>
					<meta charset="utf-8">
					<title>header.php</title>
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta name="description" content="">
					<meta name="author" content="">
					<!-- css -->
					<link href="/control-de-servicios/include/css/bootstrap.min.css" rel="stylesheet">
					<link href="/control-de-servicios/include/css/dimensionhome.css" rel="stylesheet">
					<link rel="shortcut icon" type="image/x-icon" href="/control-de-servicios/include/img/favicon.ico">
					
					<!-- java script -->
					<script type="text/javascript" src="/control-de-servicios/include/js/jquery.min.js"></script>
					<script type="text/javascript" src="/control-de-servicios/include/js/bootstrap.min.js"></script>
					<script type="text/javascript" src="/control-de-servicios/include/js/scripts.js"></script>
					
					<!-- mis estilos -->
					<link href="/control-de-servicios/include/css/style.css" rel="stylesheet">
					<!-- Inicio Script convertir en mayuscula al ingresar -->
					<script language    =""="JavaScript">
					function conMayusculas(field) {
					field.value         = field.value.toUpperCase()
					}
					</script>
					<!-- Fin Script convertir en mayuscula al ingresar-->
					
					
					<style type="text/css">
					
					.boton{

						font-size: 16px;
					}
					</style>
					
					</head>
					
					
					
					<body>
					<div class="container">
					<div class="row clearfix">
					<div class="col-md-12 column">
					<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="/control-de-servicios/home">Inicio</a>
					</div>
					
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
					<li class="active">
					
					<?php if ($_SESSION['tipo']=='01') {
					?>
					
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantenimiento<strong class="caret"></strong></a>
					<ul class="dropdown-menu">
					<li>
					<a href="/control-de-servicios/pages/creacion-de-usuario">Usuario</a>
					</li>
					<li>
					<a href="/control-de-servicios/pages/creacion-de-area">Área</a>
					</li>
					</ul>
					</li>
					
					
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Procesos<strong class="caret"></strong></a>
					<ul class="dropdown-menu">
					<li>
					<a href="/control-de-servicios/pages/cierre-de-mes">Cierre de Mes</a>
					</li>
					<li>
					<a href="/control-de-servicios/reportes/meses">Descargar Reporte</a>
					</li>
					</ul>
					</li>
					<?php
					} 
					else{
					echo "";
					}
					
					?>
					
					
					
					
					</ul>
					<?php 
					if ($_SESSION['tipo']=='01') {
					?>
					<form class="navbar-form navbar-left" role="search" method="post"
					action="/control-de-servicios/reportes/reporte-x-usuario.php">
					<div class="form-group">
					<select name="usuario" class="form-control"required>
					<option value="">[USUARIO]</option>
					<?php
					$link=Conectarse();
					$Sql="SELECT idusuario,CONCAT(nombres,' ',apellidos)AS FULLNAME
					FROM usuario;";
					$result=mysql_query($Sql) or die(mysql_error());
					while ($row=mysql_fetch_array($result)) {
					?>
					<option value ="<?php echo $row['idusuario']?>">
					<?php echo $row['FULLNAME']?></option>
					<?php }?>
					</select>
					</div> 
					<div class="form-group">
					<input type="date" class="form-control"  name="fechainicio" required/>
					</div>
					<div class="form-group">
					<input type="date" class="form-control"  name="fechafin" required/>
					</div> 
					<button type="submit" class="btn btn-success">
					<i class="glyphicon glyphicon-zoom-in boton"></i>
					</button>
					</form>
					
					<?php
					}
					
					else{
					
					?>
					<form class="navbar-form navbar-left" role="search" method="post"
					action="/control-de-servicios/reportes/reporte-diario">
					<div class="form-group">
					<input type="date" class="form-control"  name="fecha" required/>
					</div> 
					
					<button type="submit" class="btn btn-success">Buscar Reporte</button>
					</form>
					
					<form class="navbar-form navbar-left" role="search" method="post"
					action="#">
					<div class="form-group">
					</div> 
					<a href="/control-de-servicios/pages/creacion-de-reporte"
					class="btn btn-primary">
					<i class="glyphicon glyphicon-plus-sign"></i>
					&nbsp;Crear Reporte</a>
					</form>
					
					<?php
					
					}
					
					
					?>
					
					<ul class="nav navbar-nav navbar-right">
					<li>
					<a href="#">
					<i class="glyphicon glyphicon-user text-success"></i>
					<?php echo $_SESSION['nombres'].' '.$_SESSION['apellidos']; ?></a>
					</li>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong class="caret"></strong></a>
					<ul class="dropdown-menu">
					<li>
					<a href="/control-de-servicios/adios">Salir</a>
					</li>
					</ul>
					</li>
					</ul>
					</div>
					
					</nav>
					</div>
					</div>
					</div>
					</body>
					</html>
