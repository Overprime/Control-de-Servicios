<?php

include('../bd/conexion.php');
$link=Conectarse();

$OT=$_REQUEST['ot'];
$HORAS=$_REQUEST['horas'];

$total = mysql_num_rows(mysql_query("SELECT ot FROM ot_horas WHERE
 ot='$OT'"));
if($total==0)
{

$SQL="INSERT INTO ot_horas(ot,horas)VALUES('$OT','$HORAS')";
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
window.location='/control-de-servicios/admin/consulta/ot-horas';
</script>";
}
?>