 <?php 

include("../bd/conexion.php");
include("../bd/conexionSQL.php"); 
session_start();

$link=Conectarse();
$linkSQL=ConectarseSQL();
$HORAINICIO=$_REQUEST['hi']; //hora de inicio
$HORAFIN=$_REQUEST['hf']; //hora de fin
$DescHORAINICIO=$_REQUEST['dhi']; //hora de inicio
$DescHORAFIN=$_REQUEST['dhf']; //hora de fin
$USUARIO=$_SESSION['idusuario']; ; //idusuario
$NOMBREUSUARIO=$_SESSION['nombres'].' '.$_SESSION['apellidos'];
$AREA=$_SESSION['idarea'];   //idarea
$NOM_AREA=$_SESSION['nom_area'];   //nombre del area
$OT=$_REQUEST['ot'];  //ot
$FECHA=$_REQUEST['fecha'];//fecha de reporte
$HORAS_TRABAJO=$HORAFIN-$HORAINICIO;//horas de trabajo
$HORAS_HOMBRE=(floatval($HORAFIN)-floatval($HORAINICIO))/60; //horas hombre
$DETALLE=$_REQUEST['detalle']; //detalle de trabajo


/*REALIZAMOS LA CONSULTA PARA OBTENER EL CENTRO DE COSTO*/

$sql="SELECT  CODIGOCENTROCOSTO,CODIGOOT
	FROM [020BDCOMUN].DBO.CENCOSOT  WHERE
	CODIGOOT IN (SELECT OF_COD FROM [011BDCOMUN].DBO.ORD_FAB
 WHERE OF_ESTADO='ACTIVO') AND CODIGOOT='$OT'";
$result       =mssql_query($sql,$linkSQL);
if ($row      =mssql_fetch_array($result)) {
mssql_field_seek($result,0);
while ($field =mssql_fetch_field($result)) {
}do {
 $CENTROCOSTO=$row[CODIGOCENTROCOSTO];
} while ($row =mssql_fetch_array($result));
}else { 
echo "error";
} 


$Sql="INSERT INTO reporte_trabajo(fecha_inicio,hora_inicio,hora_fin,
horas_trabajo,descripcion_trabajo,horas_hombre,fecha_creacion,usuario_idusuario,
nombre_usuario,area_codigoarea,nom_area,ot_codigoot,cencos)values('$FECHA','$DescHORAINICIO',
'$DescHORAFIN','$HORAS_TRABAJO','$DETALLE','$HORAS_HOMBRE',now(),'$USUARIO',
'$NOMBREUSUARIO','$AREA','$NOM_AREA','$OT','$CENTROCOSTO')";

$result         =mysql_query($Sql);

if (!$result){echo "Error al guardar";}
else{

?>
<script>

window.location = "/control-de-servicios/pages/creacion-de-reporte";
</script>

<?php

}


?>
