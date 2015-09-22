 <?php 
@session_start();
include("../bd/conexion.php"); 


$link=Conectarse();
$HORAINICIO=$_REQUEST['horainicio']; //hora de inicio 

$HORAFIN=$_REQUEST['horafin']; //hora de fin

/*REALIZAMOS LA CONSULTA PARA OBTENER LA DESCRIPCION DE LA HORA DE INCIO*/

$sql="SELECT  fi.descripcion from fechainicio as fi where valor='$HORAINICIO'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
 $DescHORAINCIO=$row[descripcion];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 

/*REALIZAMOS LA CONSULTA PARA OBTENER LA DESCRIPCION DE LA HORA DE FIN*/
echo "</br>";
$sql="SELECT  ff.descripcion from fechafin as ff where valor='$HORAFIN'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$DescHORAFIN=$row[descripcion];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 
$IDREPORTE=$_REQUEST['idreporte'];
$USUARIO=$_REQUEST['usuario'];
$OT=$_REQUEST['ot'];  //ot
$FECHA=$_REQUEST['fecha'];//fecha de reporte
$FECHAINICIO=$_REQUEST['fechainicio'];//fecha de reporte
$HORAS_TRABAJO=$HORAFIN-$HORAINICIO;//horas de trabajo
$HORAS_HOMBRE=(floatval($HORAFIN)-floatval($HORAINICIO))/60; //horas hombre
$DETALLE=$_REQUEST['detalle']; //detalle de trabajo

$Sql="UPDATE reporte_trabajo set ot_codigoot='$OT',fecha_inicio='$FECHA',
hora_inicio='$DescHORAINCIO',hora_fin='$DescHORAFIN'
,horas_trabajo='$HORAS_TRABAJO',horas_hombre='$HORAS_HOMBRE',
descripcion_trabajo='$DETALLE'
 WHERE codigo='$IDREPORTE'";

$result         =mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else
{

header('Location: /control-de-servicios/admin/pages/reporte-diario?usuario='.$USUARIO.
	'&fecha='.$FECHA.'&fechainicio='.$FECHAINICIO);

}


?>
