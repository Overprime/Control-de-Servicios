<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>REPORTES</title>
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
<script language="javascript">
function popupdatosextra(datos) {
window.open(datos,'','width=700,height=400,left=300,menubar=NO,titlebar=NO');
}

</script>
</head>
<body>

<div class="container">
<div class="row clearfix">
<div class="col-md-2 column">
<form action="reporte-horas" method="POST">
<label>FECHA DE INICIO</label>
<input type="date"  name="fechainicio"class="form-control"
value="<?php echo $FECHAINICIO ?>" required>
</div>
<div class="col-md-2 column">
<label>FECHA DE FIN</label>
<input type="date"  name="fechafin"class="form-control"
value="<?php echo $FECHAFIN ?>" required>
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
REPORTE POR USUARIO Y HORAS
 </h2>
</div>
<div class="col-md-3 column">

<form action="generar-excel-usuario-horas.php" method="post" target="_blank" id="FormularioExportacion">
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
<th width="200">USUARIO</th>
<th width="100">FECHA DE TRABAJO</th>
<th width="100">ÁREA</th>
<th width="20">HORAS</th>
<th width="2"><i class="glyphicon glyphicon-edit"></i></th>
</tr>
</thead>
<?php 
$link=  Conectarse();
$listado=  mysql_query("SELECT codigo,usuario_idusuario,
	nombre_usuario,nom_area,
	fecha_inicio,
sum(horas_hombre)AS horas FROM reporte_trabajo where  
usuario_idusuario='$USUARIO' and 
fecha_inicio  between '$FECHAINICIO' and '$FECHAFIN'
group by fecha_inicio
order by fecha_inicio
",$link);
?>
<tbody>
<?php
$a=0;
while($reg=  mysql_fetch_array($listado)) 
{
?>
<tr>
<td style="mso-number-format:'@'"><?php echo $reg[nombre_usuario]; ?></td>
<td><?php echo date("d-m-Y", strtotime($reg[fecha_inicio])); ?></td>
<td><?php echo $reg[nom_area]; ?></td>
<td><?php echo round($reg[horas],2); ?></td>
<td><a onClick="javascript:popupdatosextra
('../pages/reporte-diario?usuario=<?php echo $reg[usuario_idusuario]?>
&fecha=<?php echo $reg[fecha_inicio]?>&fechainicio=<?php echo $FECHAINICIO ?>');return false" 
>
<i class="glyphicon glyphicon-edit"></i></a></td>

<?php } ?>

</tr>


</tbody>
</table>
</div>

<div class="table-responsive">
<table class="table table-bordered table-condensed" id="Exportar_a_Excel" border="1">
<thead>

</thead>
<?php 
$link=  Conectarse();
$listado=  mysql_query("SELECT usuario_idusuario,
	nombre_usuario,nom_area,
	fecha_inicio,
sum(horas_hombre)AS horas FROM reporte_trabajo where  
usuario_idusuario='$USUARIO' and 
fecha_inicio  between '$FECHAINICIO' and '$FECHAFIN'
group by usuario_idusuario
order by usuario_idusuario
",$link);
?>
<tbody>
<?php

while($reg=  mysql_fetch_array($listado)) 
{
?>
<tr>
<th  width="390" rowspan="2" style="text-align: center">TOTAL DE HORAS  TRABAJADAS</th>
<th width="20"><?php echo round($reg[horas],2).' '.'horas'; ?></th>


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