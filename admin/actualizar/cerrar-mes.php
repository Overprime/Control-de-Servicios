<?php 
include('../bd/conexion.php');

$IDMES=$_REQUEST['mes'];
 $DESC=$_REQUEST['desc'];
 $ESTADO=$_REQUEST['estado'];
 $MESPROC=$_REQUEST['mesproc'];



$link=Conectarse();
$Sql="UPDATE meses SET estado='$DESC' where idmeses='$IDMES'";
$Sql1="UPDATE reporte_trabajo set estado='$ESTADO' 
where fecha_inicio like '%$MESPROC%'" ;

$result=mysql_query($Sql);

if (!$result) {
	echo"error";
}
else
{
$result1=mysql_query($Sql1);

	header('Location: /control-de-servicios/admin/pages/cierre-de-mes');
}

 ?>