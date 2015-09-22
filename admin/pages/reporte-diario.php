<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>EDITAR REPORTE DIARIO</title>
<?php include('../header.php') ?>
<?php 
 $USUARIO=$_REQUEST[usuario];
 $FECHA=$_REQUEST[fecha];
 $FECHAINICIO=$_REQUEST[fechainicio];
 ?>
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">

<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr>	
<th>NOMBRE</th>
<th>OT</th>
<th>HORA INICIO</th>
<th>HORA FIN</th>
<th>H.HOMBRE</th>
<th>FECHA</th>
<td><a href="#" class="btn btn-primary">
<i class="glyphicon glyphicon-edit"></i></a>
</td>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT codigo,nombre_usuario,nom_area,ot_codigoot,
hora_inicio,hora_fin,horas_hombre,descripcion_trabajo,
DATE_FORMAT(fecha_inicio,'%d-%m-%Y')AS fecha FROM 
reporte_trabajo WHERE usuario_idusuario='$USUARIO' AND 
fecha_inicio='$FECHA'";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr>
<td><?php echo $row[nombre_usuario]; ?></td>
<td><?php echo $row[ot_codigoot]; ?></td>
<td><?php echo $row[hora_inicio]; ?></td>
<td><?php echo $row[hora_fin]; ?></td>
<td><?php echo $row[horas_hombre]; ?></td>
<td><?php echo $row[fecha]; ?></td>
<td><a href="../editar/reporte?id=<?php echo $row[codigo]; ?>&
fechainicio=<?php echo $FECHAINICIO; ?>" class="btn btn-primary">
<i class="glyphicon glyphicon-edit"></i></a>
</td>
</tr>
<?php 

}
 ?>
</tbody>
</table>
</div>
<a 
href="javascript:self.opener.location=
'/control-de-servicios/admin/reportes/reporte-horas?usuario=<?php echo $USUARIO; ?>&
fechainicio=<?php echo $FECHAINICIO; ?>&fechafin=<?php echo $FECHA; ?>';
self.close()"  class="btn btn-danger">CERRAR</a>
</div>
</div>
</div>
</body>
</html>