
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>OT</title>
<?php include('../header.php'); ?>
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr class="success">	
<th>ID</th>
<th>OT</th>
<th>HORAS</th>
<th  style="text-align: center"  width="1" ><a href=""><i class="glyphicon glyphicon-edit"></i></th>
</tr>
</thead>
<?php 
$link=Conectarse();
$sql="SELECT id_ot_horas,ot,horas,estado FROM ot_horas ORDER BY ot";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr class="active">
<?php 
$txta                      ='modal-containera-';
$txtxa                     ='#modal-containera-';
$txta                      .=$j;
$txtxa                     =$txtxa.=$j;

$txt                       ='modal-container-';
$txtx                      ='#modal-container-';
$txt                       .=$i;
$txtx                      =$txtx.=$i;


?>
<td><?php echo $row[id_ot_horas]; ?></td>
<td><?php echo $row[ot]; ?></td>
<td><?php echo round($row[horas],2); ?></td>
<td class="text-primary">
<a id="modal-899574" href='<?php echo $txtx;?>'
role="button" class="btn" data-toggle="modal">
<i class="glyphicon glyphicon-edit text-primary">	</i></a>
</td><!-- INICIO MODAL ACTUALIZAR -->
<div class="modal fade" id="<?php echo $txt; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-primary" id="myModalLabel">
ACTUALIZAR INFORMACIÓN
</h4>
</div>
<div class="modal-body">
<div class="form-group">
<form action="../actualizar/ot.php" method="POST" 
autocomplete="Off">
<input type="hidden" name="id" value="<?php echo $row[id_ot_horas]; ?>">
<label>OT</label>
<input type="text" name="ot"class="form-control" 
value="<?php echo $row[ot]; ?>" onchange="conMayusculas(this);"
required readonly>
</div>
<div class="form-group">
<label>HORAS</label>
<input type="number" name="horas"class="form-control" 
value="<?php echo round($row[horas],2); ?>" step="any" min="0"
required>
</div>
</div>
<div class="modal-footer">
 <button type="submit" class="btn btn-primary">Actualizar</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</form>
</div>
</div>

</div>

</div>		

<!-- fin modal Actualizar -->
</tr>
<?php 
$i                         =$i+1;
$j                         =$j+1;  
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