<?php

include('../bd/conexion.php');
$link=Conectarse();
$ID=$_REQUEST['id'];
$OT=$_REQUEST['ot'];
$OTA=$_REQUEST['ota'];
$HORAS=$_REQUEST['horas'];
$ESTADO=$_REQUEST['estado'];

if ($OT==$OTA) 
{
$SQL="UPDATE ot_horas set ot='$OT',horas='$HORAS',estado='$ESTADO'
WHERE id_ot_horas='$ID' ";
$RESULT=mysql_query($SQL);
if (!$RESULT)
 {
	echo "error";
 }
 else
 {
  header('Location: /control-de-servicios/admin/consulta/ot-horas');

 }
}

else 
{

$total = mysql_num_rows(mysql_query("SELECT ot FROM ot_horas WHERE
 ot='$OT'"));
if($total==0)
{

$SQL="UPDATE ot_horas set ot='$OT',horas='$HORAS',estado='$ESTADO'
WHERE id_ot_horas='$ID ";
$RESULT=mysql_query($SQL);
if (!$RESULT)
 {
	echo "error";
 }
 else
 {
  header('Location: /control-de-servicios/admin/consulta/ot-horas');

 }
}
else{
echo "
<script>
alert('LA OT $OT YA ESTA REGISTRADA');
window.location='/control-de-servicios/admin/editar/ot-horas?id='+$ID;
</script>";
}
}






?>