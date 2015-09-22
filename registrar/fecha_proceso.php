<?php 
session_start();
$FECHA=$_REQUEST['fecha'];
$USUARIO=$_SESSION['idusuario'];

include('../bd/conexion.php');
$link=Conectarse();
$Sql="INSERT INTO valores_fecha (usuario,fecha) 
VALUES ('$USUARIO','$FECHA')
ON DUPLICATE KEY UPDATE fecha='$FECHA';
";

$result=mysql_query($Sql);

if (!$result) {
	echo "error";
}
else
{

header('Location: /control-de-servicios/home');

}

 ?>