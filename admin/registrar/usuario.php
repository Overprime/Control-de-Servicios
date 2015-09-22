<?php
include('../bd/conexion.php');
$link=Conectarse();

$Nombres=$_POST['nombres'];
$Apellidos=$_POST['apellidos'];
$Dni=$_POST['dni'];
$Contrasena=$_POST['password'];
$Area=$_POST['area'];

/*REALIZAMOS LA CONSULTA PARA OBTENER LA DESCRIPCION DE LA HORA DE FIN*/

$sql="SELECT  a.nombre from area as a where codigo_area='$Area'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$DescArea=$row[nombre];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 


//registra los datos del area
$sql="INSERT INTO usuario(nombres,apellidos,dni,usuario,contrasena,
	fecha_creacion,idarea,nom_area)
values('$Nombres','$Apellidos','$Dni','$Dni',md5('$Contrasena'),
	now(),'$Area','$DescArea')";
$result=mysql_query($sql);
if (!$result) {echo "error";}
else
{}
include('../vistas/usuario.php');
?>

