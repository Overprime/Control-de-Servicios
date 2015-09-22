<?php 
$ID=$_REQUEST['id'];
$FECHA=$_REQUEST['fecha'];
$FECHAINICIO=$_REQUEST['fechainicio'];
$USUARIO=$_REQUEST['usuario'];
include('../bd/conexion.php');
$link=Conectarse();
$Sql="DELETE FROM reporte_trabajo WHERE 
codigo='$ID'";

$result=mysql_query($Sql);

if (!$result) {echo"error";}
else
{
	header('Location: /control-de-servicios/admin/pages/reporte-diario?usuario='.$USUARIO.
	'&fecha='.$FECHA.'&fechainicio='.$FECHAINICIO);

}


 ?>