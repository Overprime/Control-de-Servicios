<?php 
include("../bd/conexion.php");
session_start();

$link=Conectarse();
$HI=$_REQUEST['horainicio']; //hora de inicio
$HF=$_REQUEST['horafin']; //hora de fin
$FECHA=$_REQUEST['fecha'];//fecha de reporte
$OT=$_REQUEST['ot'];  //ot
$FECHA=$_REQUEST['fecha'];//fecha de reporte
$DETALLE=$_REQUEST['detalle']; //detalle de trabajo
$USUARIO=$_SESSION['idusuario'];//idusuario

/*REALIZAMOS LA CONSULTA PARA OBTENER LA DESCRIPCION DE LA HORA DE INCIO*/

$sql="SELECT  fi.descripcion from fechainicio as fi where valor='$HI'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$DHI=$row[descripcion];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 

/*REALIZAMOS LA CONSULTA PARA OBTENER LA DESCRIPCION DE LA HORA DE FIN*/

$sql="SELECT  fi.descripcion from fechainicio as fi where valor='$HF'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$DHF=$row[descripcion];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 
/*REALIZAMOS LA CONSULTA PARA OBTENER LA DESCRIPCION DE LA HORA DE FIN*/

$sql="SELECT * FROM reporte_trabajo where hora_inicio='$DHI'
 and fecha_inicio='$FECHA' 
and usuario_idusuario='$USUARIO'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
    $r1=$row[hora_inicio];

    $r2=$row[hora_fin];
} while ($row =mysql_fetch_array($result));
}else { 
//echo "NO HAY NADA";
} 


if (trim($r1) == false)
 {
header('Location: /control-de-servicios/registrar/reporte.php?hi='.utf8_encode($HI).
	'&hf='.utf8_encode($HF).'&dhi='.utf8_encode($DHI).'&dhf='.utf8_encode($DHF).
	'&detalle='.utf8_encode($DETALLE).'&ot='.utf8_encode($OT).
	'&fecha='.utf8_encode($FECHA));


}

else{

echo"<script>

alert('YA EXISTE UN REGISTRO CON ESAS HORAS');

window.location='/control-de-servicios/pages/creacion-de-reporte';

</script>";

}



