<?php 
$ID=$_REQUEST['id'];
include('../bd/conexion.php');
$link=Conectarse();
$Sql="DELETE FROM reporte_trabajo WHERE 
codigo='$ID'";

$result=mysql_query($Sql);

if (!$result) {echo"erro";}
else
{header('Location: /control-de-servicios/pages/creacion-de-reporte');}


 ?>