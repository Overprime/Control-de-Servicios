<?php 

include("../bd/conexion.php"); 
$link=Conectarse(); 
$idarea=$_REQUEST['id']; 
$Sql="UPDATE area SET estado='01' WHERE  codigo_area='$idarea'";

$result         =mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else{

?>
<script>

window.location = "/control-de-servicios/admin/pages/creacion-de-area";
</script>

<?php

}

