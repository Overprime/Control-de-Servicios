<?php 

include("../bd/conexion.php"); 
$link=Conectarse(); 
$idarea=$_REQUEST['id']; 
$nombre=$_REQUEST['nombre']; 
$descripcion=$_REQUEST['descripcion']; 
$Sql="UPDATE area set nombre='$nombre',descripcion='$descripcion'
WHERE codigo_area='$idarea'";

$result         =mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else{

?>
<script>

window.location = "/control-de-servicios/pages/creacion-de-area";
</script>

<?php

}

