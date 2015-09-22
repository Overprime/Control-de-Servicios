<?php 

include("../bd/conexion.php"); 
$link=Conectarse(); 
$idusuario=$_REQUEST['id']; 
$Sql="UPDATE  usuario  set estado='01' WHERE  idusuario='$idusuario'";

$result         =mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else{

?>
<script>

window.location = "/control-de-servicios/admin/pages/creacion-de-usuario";
</script>

<?php

}

