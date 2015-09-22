<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>DETALLE REPORTE X USUARIO</title>
<?php include('../../header.php'); ?>
<?php $ID=$_REQUEST[id];
      $HORAS=$_REQUEST[horas];
      $FECHAINICIO=$_REQUEST[fechainicio];
      $FECHAFIN=$_REQUEST[fechafin]; ?>
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr>	
<th>CODIGO</th>
<th>TECNICO</th>
<th>OT</th>
<th>HORAS HOMBRE</th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT usuario_idusuario,nombre_usuario,ot_codigoot,
sum(horas_hombre)as horashombre
 FROM reporte_trabajo where usuario_idusuario='$ID'
 and fecha_inicio between '$FECHAINICIO' and '$FECHAFIN'
group by ot_codigoot
order by sum(horas_hombre) desc;";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr>
<td><?php echo $row[usuario_idusuario]; ?></td>
<td><?php echo $row[nombre_usuario]; ?></td>
<td><?php echo $row[ot_codigoot]; ?></td>
<td><?php echo round($row[horashombre],2); ?></td>
</tr>
<?php 

}
 ?>
</tbody>
<tbody>
<tr>
<th  style="text-align: center" colspan="3">TOTAL DE HORAS TRABAJADAS</th>
<td><?php echo $HORAS; ?></td>
</tr>

</tbody>
</table>
</div>
<button class="btn btn-danger" onclick="window.close();" >
<i class="glyphicon glyphicon-remove-circle"></i>
Cerrar</button>
</div>
</div>
</div>
</body>
</html>