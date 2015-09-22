			<!DOCTYPE html>
			<html lang="es">
			<link rel="stylesheet" type="text/css" href="/control-de-servicios/include/css/bootstrap.min.css">
			<link href="/control-de-servicios/include/css/style.css" rel="stylesheet">
			<!-- Inicio Script convertir en mayuscula al ingresar -->
			<script language    =""="JavaScript">
			function conMayusculas(field) {
			field.value         = field.value.toUpperCase()
			}
			</script>
			<head>
			</head>
			<body>
			<div class="row clearfix">
			<div class="col-md-12 column">
			<h2 class="text-primary">Lista de Áreas</h2>
			<div class="table-responsive">
			<table class="table table-condensed table-bordered">
			<tr class="text-primary">
			<th>ID</th>
			<th>NOMBRE</th>
			<th>DESCRIPCIÓN</th>
			<th style="text-align: center">FECHA DE CREACIÓN</th>
			<th style="text-align: center"><i class="glyphicon glyphicon-edit text-primary"></i></th>
			<th style="text-align: center"><i class="glyphicon glyphicon-trash text-danger"></i></th>
			</tr>         
			<?php 
			include('../bd/conexion2.php');
			$link=Conectarse2();
			$sql="SELECT codigo_area,nombre,descripcion,
			DATE_FORMAT(fecha,'%d/%m/%Y') as fechas,usuario from area  WHERE 
			estado='00' ORDER BY codigo_area";  
			$result= mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($result)==0) die("No hay registros para mostrar");
			
			while($row=mysql_fetch_array($result))
			{?>
			<tr>
			<?php 
			$txta  ='modal-containera-';
			$txtxa ='#modal-containera-';
			$txta  .=$j;
			$txtxa =$txtxa.=$j;
			$txt   ='modal-container-';
			$txtx  ='#modal-container-';
			$txt   .=$i;
			$txtx  =$txtx.=$i;
			?>
			
			<td><strong><?php echo $row[codigo_area];  ?>  </strong></td>
			<td><strong><?php echo $row[nombre];  ?> </strong></td>
			<td><strong><?php echo $row[descripcion];  ?> </strong> </td>
			<td style="text-align: center"><strong><?php echo $row[fechas];  ?> </strong> </td>
			<td style="text-align: center"><a id="modal-417297" href="<?php echo $txtx;?>" 
			role="button" class="btn" data-toggle="modal">
			<i class="glyphicon glyphicon-edit text-primary"></i></a></td>
			<td style="text-align: center"><a id="modal-417298" href="<?php echo $txtxa;?>" 
			role="button" class="btn" data-toggle="modal">
			<i class="glyphicon glyphicon-trash text-danger"></i></a></td>
			
			
			<!-- INICIO MODAL ACTUALIZAR -->
			
			<div class="modal fade" id="<?php echo $txt;?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title text-primary" id="myModalLabel">
			Actualizar
			</h4>
			</div>
			<div class="modal-body">
			<form action="../actualizar/area" method="POST">
			<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $row[codigo_area]; ?>">
			<label>Nombre</label>
			<input type="text" name="nombre" class="form-control" value="<?php echo $row[nombre]; ?>"
			onchange="conMayusculas(this);">
			</div>
			<div class="form-group">
			<label>Descripción</label>
			<input type="text" name="descripcion" class="form-control" value="<?php echo $row[descripcion]; ?>"
			onchange="conMayusculas(this);">
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
			<!-- FIN MODAL ACTUALIZAR -->
			
			
			<!-- INICIO MODAL ELIMINAR -->
			
			<div class="modal fade" id="<?php echo $txta;?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title text-danger" id="myModalLabel">
			Eliminar
			</h4>
			</div>
			<div class="modal-body">
			¿Desea eliminar el área  <label class="text-primary"><?php echo $row[nombre]; ?></label>  ?
			</div>
			<div class="modal-footer">
			<a href="../eliminar/area?id=<?php echo $row[codigo_area]; ?>" class="btn btn-danger">Eliminar</a>
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
			</div>
			
			</div>
			
			</div>
			<!-- FIN MODAL ELIMINAR -->
			
			
			
			
			
			</tr>
			<?php
			$i=$i+1;
			$j=$j+1; 
			}
			?>
			
			</table>

			</div>
			</div>
			</div>
			
			</body>
			</html>
			
			
