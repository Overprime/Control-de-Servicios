<?php 
//Proceso de conexiÃ³n con la base de datos
include('bd/conexion.php');
$link=Conectarse();
//Inicio de variables de sesiÃ³n
if (!isset($_SESSION)) {
session_start();
}

//Recibir los datos ingresados en el formulari	o
$usuario= $_POST['usuario'];
$contrasena= $_POST['contrasena'];

//Consultar si los datos son estÃ¡n guardados en la base de datos
$consulta= "SELECT * FROM usuario WHERE usuario='".$usuario."' AND contrasena='".md5($contrasena)."'"; 
$resultado= mysql_query($consulta,$link) or die (mssql_error());
$fila=mysql_fetch_array($resultado);



if (!$fila[0]) //opcion1: Si el usuario NO existe o los datos son INCORRRECTOS
{
echo '<script language = javascript>
alert("Usuario o Password errados, por favor verifique.")
self.location = "/control-de-servicios/"
</script>';
}

else if ($fila[8]=='01') {
//Definimos las variables de sesiÃ³n y redirigimos a la pÃ¡gina de usuario
$_SESSION['idusuario'] = $fila['idusuario'];
$_SESSION['nombres'] = $fila['nombres'];
$_SESSION['apellidos'] = $fila['apellidos'];
$_SESSION['contrasena'] = $fila['contrasena'];
$_SESSION['idarea'] = $fila['idarea'];
$_SESSION['tipo'] = $fila['tipo'];
$_SESSION['nom_area'] = $fila['nom_area'];



header("Location: /control-de-servicios/admin");

}


else //opcion2: Usuario logueado correctamente
{
//Definimos las variables de sesiÃ³n y redirigimos a la pÃ¡gina de usuario
$_SESSION['idusuario'] = $fila['idusuario'];
$_SESSION['nombres'] = $fila['nombres'];
$_SESSION['apellidos'] = $fila['apellidos'];
$_SESSION['contrasena'] = $fila['contrasena'];
$_SESSION['idarea'] = $fila['idarea'];
$_SESSION['tipo'] = $fila['tipo'];
$_SESSION['nom_area'] = $fila['nom_area'];



header("Location: /control-de-servicios/home");
}
?>