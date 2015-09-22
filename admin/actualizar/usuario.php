<?php 

include("../bd/conexion.php"); 
$link=Conectarse(); 

@session_start();

$Idusuario=$_REQUEST['idusuario'];
$Nombres=$_REQUEST['nombres']; 
$Apellidos=$_REQUEST['apellidos'];
$Area=$_REQUEST['area'];
$Usuario=$_REQUEST['usuario'];
$Contrasena_actual=$_REQUEST['contrasena_actual'];
$Contrasena_nueva=md5($_REQUEST['contrasena_nueva']);
if ($Contrasena_nueva!==null) {
$Sql="UPDATE usuario set nombres='$Nombres',apellidos='$Apellidos',usuario='$Usuario',idarea='$Area',
contrasena='$Contrasena_nueva'
WHERE idusuario='$Idusuario'";
}
else
	{
$Sql="UPDATE usuario set nombres='$Nombres',apellidos='$Apellidos',usuario='$Usuario',idarea='$Area',
contrasena='$Contrasena_actual'
WHERE idusuario='$Idusuario'";

	}
 


$result         =mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else{

?>
<script>

window.location = "/control-de-servicios/admin/pages/creacion-de-usuario";
</script>

<?php

}

