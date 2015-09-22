	<?php
	include('../bd/conexion.php');
	@session_start();
	$link=Conectarse();
	$Codigo=$_POST['codigo'];
	$Descripcion=$_POST['descripcion'];
	$Usuario=$_SESSION[idusuario];
	
	//registra los datos del area
	$sql="INSERT INTO area(nombre,descripcion,fecha,usuario,fecha_creacion,estado)
	values('$Codigo','$Descripcion',now(),'$Usuario',now(),'00')";
	mysql_query($sql,$link) or die('Error. '.mysql_error());
	
	include('../vistas/area.php');
	?>
	
	