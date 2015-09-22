<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Cierre de Mes</title>
<?php include('../header.php'); ?>
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr class="active">	
<th>ID</th>
<th>MES</th>
<th>ABRIR MES</th>
<th>CERRAR MES</th>
<th>ESTADO DEL MES</th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT idmeses,descripcion,estado,mesproc FROM meses";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr>
<td><?php echo $row[idmeses]; ?></td>
<td><?php echo $row[descripcion]; ?></td>
<td><a href="../actualizar/cerrar-mes?mes=<?php echo $row[idmeses];?>&
desc=ABIERTO&estado=02&mesproc=<?php echo $row[mesproc];?>"class="btn btn-success">ABRIR MES</a></td>
<td><a href="../actualizar/cerrar-mes?mes=<?php echo $row[idmeses]; ?>&
desc=CERRADO&estado=03&mesproc=<?php echo $row[mesproc];?>" class="btn btn-warning">CERRAR MES</a></td>
<td><a href="#">
<?php 
if ($row[estado]=='ABIERTO') {
	echo "<button class='btn btn-primary'>ABIERTO</button>";
}
else
	echo "<button class='btn btn-danger'>CERRADO</button>";


 ?></a></td>
</tr>
<?php 

}
 ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>