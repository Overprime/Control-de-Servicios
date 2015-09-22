<?php
include('../bd/conexion.php');
$link=Conectarse();
$salida="";
$id_pais=$_POST["elegido"];
// construimos el combo de ciudades deacuerdo al pais seleccionado
$combog = mysql_query("SELECT * FROM fechafin WHERE 
	valor>$id_pais");
  while($sql_p = mysql_fetch_row($combog))
  {
   $salida.= "<option value='".$sql_p[2]."'>".$sql_p[1]."</option>";
  }  
echo $salida;
?>