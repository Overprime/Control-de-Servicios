<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>REPORTES</title>
<?php include('../header.php'); ?>
<?php //variables
$Mes=$_POST['mes'];
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
th,td{
font-size: 12px;	
}
.tamano{
  font-size: 40px;
}
</style>
</head>
<body>

<div class="container">
<div class="row clearfix">
<div class="col-md-4 column">
<form action="meses"  method="POST">
<label class="text-primary">SELECCIONAR EL MES</label>
<select name="mes" id="" class="form-control" onchange="this.form.submit()";">
	<option value="">[SELECCIONAR]</option>
	<option value="2015-01">ENERO</option>
	<option value="2015-02">FEBRERO</option>
	<option value="2015-03">MARZO</option>
	<option value="2015-04">ABRIL</option>
	<option value="2015-05">MAYO</option>
	<option value="2015-06">JUNIO</option>
	<option value="2015-07">JULIO</option>
	<option value="2015-08">AGOSTO</option>
	<option value="2015-09">SEPTIEMBRE</option>
	<option value="2015-10">OCTUBRE</option>
	<option value="2015-11">NOVIEMBRE</option>
	<option value="2015-12">DICIEMBRE</option>
</select>
</form>
</div>
</div>
<div class="row clearfix">
<div class="col-md-9 column">
<h3 class="text-center text-success">

<?php 
if ($Mes=='2015-01') {
	echo "<label class='text-primary'>REPORTE MES DE ENERO</label>";
}
else if ($Mes=='2015-02') {
	echo "REPORTE MES DE FEBRERO</label>";
}
else if ($Mes=='2015-03') {
	echo "<label class='text-primary'>REPORTE MES DE MARZO</label></label>";
}
else if ($Mes=='2015-04') {
	echo "<label class='text-primary'>REPORTE MES DE ABRIL</label></label>";
}
else if ($Mes=='2015-05') {
	echo "<label class='text-primary'>REPORTE MES DE MAYO</label></label>";
}
else if ($Mes=='2015-06') {
	echo "<label class='text-primary'>REPORTE MES DE JUNIO</label></label>";
}
else if ($Mes=='2015-07') {
	echo "<label class='text-primary'>REPORTE MES DE JULIO</label></label>";
}
else if ($Mes=='2015-08') {
	echo "<label class='text-primary'>REPORTE MES DE AGOSTO</label></label>";
}
else if ($Mes=='2015-09') {
	echo "<label class='text-primary'>REPORTE MES DE SEPTIEMBRE</label></label></label>";
}
else if ($Mes=='2015-10') {
	echo "<label class='text-primary'>REPORTE MES DE OCTUBRE</label></label></label>";
}
else if ($Mes=='2015-11') {
	echo "<label class='text-primary'>REPORTE MES DE NOVIEMBRE</label></label></label>";
}
else if ($Mes=='2015-12') {
	echo "<label class='text-primary'>REPORTE MES DE DICIEMBRE</label></label></label>";
}
else {

	echo "<label class='text-primary'>TODOS LOS MESES</label>";
}






 ?></h3>
</div>
<div class="col-md-3 column">

<form action="generar-meses.php" method="post" target="_blank" id="FormularioExportacion">
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
<th>CC</th>
<th>OT</th>
<th>FECHA</th>
<th>HORA INICIO</th>
<th>HORA FIN</th>
<th>DESCRIPCIÓN</th>
<th>N°</th>
<th>TÉCNICO</th>
<th>HORAS HOMBRE</th>
<th>PERSONAL</th>

</tr>
</thead>
<?php 
$link=  Conectarse();
$listado=  mysql_query("SELECT cencos,codigo,
	fecha_inicio,hora_inicio,hora_fin,horas_trabajo,descripcion_trabajo,usuario_idusuario,nombre_usuario,
horas_trabajo,nom_area,ot_codigoot,horas_hombre FROM reporte_trabajo
where  fecha_inicio like '%$Mes%'",$link);
?>
<tbody>
<?php
while($reg=  mysql_fetch_array($listado)) 
{
?>
<tr>
<td style="mso-number-format:'@'"><?php echo $reg[cencos]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[ot_codigoot]; ?></td>
<td><?php echo date("d/m/Y", strtotime($reg[fecha_inicio])); ?></td>
<td><?php echo $reg[hora_inicio]; ?></td>
<td ><?php echo $reg[hora_fin]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[descripcion_trabajo]; ?></td>
<td ><?php echo $reg[usuario_idusuario]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[nombre_usuario]; ?></td>
<td ><?php echo $reg[horas_hombre]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[nom_area]; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>