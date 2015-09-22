<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>REPORTE FUERA DE FECHA</title>
<?php include('../header.php'); ?>
<?php 
$FECHAINICIO=$_REQUEST[fechainicio];
$FECHAFIN=$_REQUEST[fechafin];
$USUARIO=$_REQUEST[usuario];
?>
<script language="javascript">
$(document).ready(function() {
$(".botonExcel").click(function(event) {
$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
$("#FormularioExportacion").submit();
});
});
</script>

<style type="text/css">
.botonExcel{cursor:pointer;}

.tamano{
  font-size: 40px;
}
</style>
</head>
<body>

<div class="container">
<div class="row clearfix">
<div class="col-md-2 column">
<form action="fuera-de-fecha" method="POST">
<label>FECHA DE INICIO</label>
<input type="date"  name="fechainicio"class="form-control" required>
</div>
<div class="col-md-2 column">
<label>FECHA DE FIN</label>
<input type="date"  name="fechafin"class="form-control" required>
</div>
<div class="col-md-2 column">
<label>USUARIO</label>
<select name="usuario" class="form-control"required>
<option value="">[USUARIO]</option>
<?php
$link=Conectarse();
$Sql="SELECT idusuario,nombres,CONCAT(nombres,' ',apellidos)AS FULLNAME
FROM usuario WHERE tipo='00' ORDER BY nombres;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['idusuario']?>">
<?php echo $row['FULLNAME']?></option>
<?php }?>
</select>
</div>
<div class="col-md-2 column">
<br>
<button class="btn btn-primary">CONSULTAR</button>
</form>
</div>
</div>
<div class="row clearfix">
<div class="col-md-9 column">
<h2 class="text-center text-success">
REPORTE FUERA DE FECHA
 </h2>
</div>
<div class="col-md-3 column">

<form action="generar-excel-x-ot.php" method="post" target="_blank" id="FormularioExportacion">
<p> 
<img src="/control-de-servicios/include/img/excel.png" class="img-responsive botonExcel" 
 title="DESCARGAR ARCHIVO"id="#excel" width="50">
</p>
<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form>


</div>		
</div>
<div class="row clearfix">
<div class="col-md-12 column">
<div class="table-responsive">
<table class="table table-bordered table-condensed" id="Exportar_a_Excel" border="1">
<thead>
<tr class="success">
<th>CÓDIGO</th>
<th>USUARIO</th>
<th>OT</th>
<th>CENTRO DE COSTO</th>
<th>HORA INICIO</th>
<th>HORA FIN</th>
<th>FECHA REPORTE</th>
<th>FECHA SISTEMA</th>
</tr>
</thead>
<?php 
$link=  Conectarse();
$listado=  mysql_query("SELECT 
usuario_idusuario,
ot_codigoot,
cencos,
nombre_usuario,
hora_inicio,
hora_fin,
DATE_FORMAT(fecha_inicio,'%d/%m/%Y') as fechareporte,
DATE_FORMAT(fecha_creacion,'%d/%m/%Y') as fechasistema 
from reporte_trabajo WHERE 
DATE_FORMAT(fecha_creacion,'%Y-%m-%d')>fecha_inicio AND 
usuario_idusuario='$USUARIO'
AND fecha_inicio between '$FECHAINICIO' AND '$FECHAFIN'",$link);
?>
<tbody>
<?php

while($reg=  mysql_fetch_array($listado)) 
{
?>
<tr>
<td style="mso-number-format:'@'"><?php echo $reg[usuario_idusuario]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[nombre_usuario]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[ot_codigoot]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[cencos]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[hora_inicio]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[hora_fin]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[fechareporte]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[fechasistema]; ?></td>

<?php } ?>

</tr>


</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>