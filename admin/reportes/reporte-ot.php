<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>REPORTES</title>
<?php include('../header.php'); ?>
<?php 
$FECHAINICIO=$_REQUEST[fechainicio];
$FECHAFIN=$_REQUEST[fechafin];
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
<form action="reporte-ot" method="POST">
<label>FECHA DE INICIO</label>
<input type="date"  name="fechainicio"class="form-control" required>
</div>
<div class="col-md-2 column">
<label>FECHA DE FIN</label>
<input type="date"  name="fechafin"class="form-control" required>
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
REPORTE x OT
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
<th>OT</th>
<th>CANTIDAD DE HORAS</th>
<th>FECHA DE INICIO</th>
<th>FECHA DE FIN</th>
</tr>
</thead>
<?php 
$link=  Conectarse();
$listado=  mysql_query("SELECT
 ot_codigoot,sum(horas_hombre)  AS horashombre
  from reporte_trabajo where estado='02'
AND  fecha_inicio between'$FECHAINICIO' and '$FECHAFIN'
group by ot_codigoot 
order by sum(horas_hombre) desc",$link);
?>
<tbody>
<?php

while($reg=  mysql_fetch_array($listado)) 
{
?>
<tr>
<td style="mso-number-format:'@'"><?php echo $reg[ot_codigoot]; ?></td>
<td><?php echo round($reg[horashombre],2) ?></td>
<td><?php echo date("d-m-Y", strtotime($FECHAINICIO)); ?></td>
<td><?php echo date("d-m-Y", strtotime($FECHAFIN)); ?></td>

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