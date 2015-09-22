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
<title>ADMINISTRADOR</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<link href="/control-de-servicios/include/css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<link rel="shortcut icon" href="/control-de-servicios/include/img/favicon.ico">

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

</head>

<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="/control-de-servicios/admin/">INICIO</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantenimiento<strong class="caret"></strong></a>
<ul class="dropdown-menu">
<li>
<a href="/control-de-servicios/admin/pages/creacion-de-usuario">Usuario</a>
</li>
<li>
<a href="/control-de-servicios/admin/pages/creacion-de-area">Área</a>
</li>
<li>
<a href="/control-de-servicios/admin/consulta/ot-horas">OT</a>
</li>
</ul>
</li>
</ul>
<ul class="nav navbar-nav">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes<strong class="caret"></strong></a>
<ul class="dropdown-menu">
<!--  
<li>
<a href="/control-de-servicios/admin/pages/cierre-de-mes">Cerrar Mes</a>
</li>
-->
<li>
<a href="/control-de-servicios/admin/reportes/meses">Reporte Mensual</a>
</li>
<li>
<a href="/control-de-servicios/admin/reportes/fuera-de-fecha">Reporte fuera de fecha</a>
</li>
<li>
<a href="/control-de-servicios/admin/reportes/reporte-ot">Reporte por OT</a>
</li>
<li>
<a href="/control-de-servicios/admin/reportes/reporte-horas">Reporte por Usuario/Horas</a>
</li>
<li class="divider"></li>
<li>
<a href="/control-de-servicios/admin/graficos/pie" target="_blank">Grafico de Pie</a>
</li>
<li>
<a href="/control-de-servicios/admin/graficos/barras" target="_blank">Grafico de Barras</a>
</li>
</ul>
</li>
</ul>
<form class="navbar-form navbar-left" role="search"  method="post"
	action="/control-de-servicios/admin/reportes/reporte-x-usuario.php">
<div class="form-group">
<select name="usuario" class="form-control"required>
<option value="">[USUARIO]</option>
<?php
$link=Conectarse();
$Sql="SELECT idusuario,nombres,CONCAT(nombres,' ',apellidos)AS FULLNAME
FROM usuario WHERE tipo='00' ORDER BY nombres;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['idusuario']?>">
<?php echo $row['FULLNAME']?></option>
<?php }?>
</select>
</div>
<div class="form-group">
<input type="date" name="fecha" class="form-control" required>
</div> 
<button type="submit" class="btn btn-success">Consultar</button>
</form>
<ul class="nav navbar-nav navbar-right">
<li>
<a href="#">
<i class="glyphicon glyphicon-user text-success"></i>
<?php echo $_SESSION[nombres].' '.$_SESSION[apellidos]; ?></a>
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
