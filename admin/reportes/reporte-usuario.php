<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>REPORTE POR USUARIO</title>
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

<script language="javascript">
function popupdatosextra(datos) {
window.open(datos,'','width=700,height=400,left=300,menubar=NO,titlebar=NO');
}

</script>
</head>
<body>

<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<div class="alert alert-dismissable alert-danger">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
<h4>ALERTA</h4>
 <strong>ATENCIÓN</strong> Se recomienda  que  al momento de filtrar seleccione el 
  inicio y fin de semana,para  dar mejor seguimiento al control de 48 horas semanales.
 </div>
</div>
</div>

<div class="row clearfix">
<div class="col-md-2 column">
<form action="reporte-usuario" method="POST">
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
REPORTE USUARIO  X CANTIDAD DE HORAS
 </h2>
</div>
<div class="col-md-3 column">

<form action="generar-excel-reporte-usuario.php" method="post" target="_blank" id="FormularioExportacion">
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
<th>CODIGO</th>
<th>TÉCNICO</th>
<th>HORAS  TRABAJADAS</th>
<th>HORAS  SEMANAL</th>
<th>HORAS  FALTANTES</th>
<th>HORAS EXTRAS</th>
<th>FECHA DE INICIO</th>
<th>FECHA DE FIN</th>
<th><i class="glyphicon glyphicon-zoom-in">	</i></th>
</tr>
</thead>
<?php 
$link=  Conectarse();
$listado=  mysql_query("SELECT usuario_idusuario,
	nombre_usuario,sum(horas_hombre)as  horashombre from  reporte_trabajo  
where  estado='02' and fecha_inicio between 
'$FECHAINICIO' and '$FECHAFIN'
group by usuario_idusuario
order by sum(horas_hombre) desc;",$link);
?>
<tbody>
<?php

while($reg=  mysql_fetch_array($listado)) 
{
?>
<tr>
<td><?php echo $reg[usuario_idusuario]; ?></td>
<td style="mso-number-format:'@'"><?php echo $reg[nombre_usuario]; ?></td>
<td><?php echo round($reg[horashombre],2) ?></td>
<td><?php echo 48;?></td>
<td>
<?php 
if ($reg[horashombre]<48)
 {
echo round(48-$reg[horashombre],2);
 }
else
{
echo "0";
}

 ?>

</td>
<td>
<?php 
if ((round(48-$reg[horashombre],2))<0) 
{
echo  abs(round(48-$reg[horashombre],2));
}
else
{
echo "0";
}

 ?>

</td>
<td><?php echo date("d-m-Y", strtotime($FECHAINICIO)); ?></td>
<td><?php echo date("d-m-Y", strtotime($FECHAFIN)); ?></td>
<td><a onClick="javascript:popupdatosextra
('detalle/reporte-usuario?id=<?php echo $reg[usuario_idusuario]?>
&horas=<?php echo round($reg[horashombre],2)?>
&fechainicio=<?php echo $FECHAINICIO?>
&fechafin=<?php echo $FECHAFIN;?>');return false">
<i class="glyphicon glyphicon-zoom-in">	</i></a></td>

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