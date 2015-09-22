<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reporte Diario</title>
<?php include('../header.php'); ?>
<?php //conexion:
$link=Conectarse(); ?>
<?php 

$sql="SELECT usuario,fecha,
date_format(fecha,'%d-%m-%Y')as fecha_formato
 FROM valores_fecha WHERE usuario=$_SESSION[idusuario]";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
  $FECHA=$row[fecha];
  $FECHAFORMATO=$row[fecha_formato];
} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 
?>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#horainicio").change(function () {
$("#horainicio option:selected").each(function () {
elegido=$(this).val();
$.post("horas.php", { elegido: elegido }, function(data){
$("#horafin").html(data);
});     
});
});    
});
</script>	
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-3 column">
<form action="../registrar/copia-reporte.php" method="POST">
<div class="form-group">
<label for="">ORDEN DE TRABAJO:</label>
<select name="ot" class="form-control" required autofocus>
<option value="">[SELECCIONAR]</option>
<?php
include('../bd/conexionSQL.php');
$linkSQL=ConectarseSQL();
$Sql="SELECT CODIGOOT FROM  [020BDCOMUN].DBO.CENCOSOT 
 WHERE USUARIO in ('4','6')
 AND
CODIGOOT  IN (SELECT OF_COD FROM [011BDCOMUN].dbo.ORD_FAB
WHERE OF_ESTADO ='ACTIVO') ORDER BY CODIGOOT";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {
?>
<option value ="<?php echo $row['CODIGOOT']?>"><?php echo $row['CODIGOOT']?></option>
<?php }?>
</select>
</div>

</div>
<div class="col-md-3 column">
<div class="form-group">
<label>FECHA:</label>
<input type="date" name="fecha" id=""  readonly=""
value="<?php echo $FECHA; ?>" class="form-control" required>
</div>
</div>
<div class="col-md-3 column">
<div class="form-group">
<label>HORA INICIO:</label>
<select name="horainicio" class="form-control" id="horainicio"required>
<option value="">[SELECCIONAR]</option>
<?php
$Sql="SELECT valor,descripcion FROM fechainicio 
;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['valor']?>"><?php echo $row['descripcion']?></option>
<?php }?>
</select>
</div>
</div>
<div class="col-md-3 column">
<div class="form-group">
<label>HORA FIN:</label>
<select class="form-control"  name="horafin" id="horafin" required>
</select>
</div>
</div>
</div>
<div class="row clearfix">

<div class="col-md-9 column">
<div class="form-group">
<label>DETALLE DE ACTIVIDAD:</label>
<textarea name="detalle" id="" cols="30" rows="2" 
class="form-control"   required></textarea>
</div>
</div>
<div class="col-md-3 column">
<br>
<button type="submit" class="btn btn-block btn-lg btn-primary">
<i class="glyphicon glyphicon-"></i>AGREGAR </button>
</div>

</div>


<div class="row clearfix">
<div class="col-md-12 column">
<?php include('../vistas/reportes.php'); ?>
</div>

