			<!DOCTYPE html>
			<html lang="es">
			<head>
			<meta charset="UTF-8">
			<title>Lista de Reporte</title>
			<?php include('../header.php'); ?>
			<?php //REQUEST 
			$FECHA=$_REQUEST['fecha'];
			$USUARIO=$_REQUEST['usuario'];
			?>
			</head>
			<body>
			<div class="container">
			<div class="row clearfix">
			<div class="col-md-12 column">
			
			<div class="table-responsive">
			<table class="table table-responsive table-bordered table-condensed">
			<thead>
			<tr class="active">
			<th width="150">USUARIO</th>
			<th width="50"width="50">ÁREA</th>
			<th width="100">OT</th>
			<th width="10">H. INICIO</th>
			<th width="50">H. FIN</th>
			<th width="50" >H.HOMBRES</th>
			<th width="100" >DESCRIPCIÓN DEL TRABAJO</th>
			<th width="100">FECHA</th>
			</tr>
			</thead>
			<?php 
			
			$link=Conectarse();
			$sql="SELECT codigo,CONCAT(u.nombres,' ',u.apellidos) AS FULLNAME,fecha_inicio,
			(a.nombre)as NOMBREAREA,(ot_codigoot)as OT,r.hora_inicio,
			r.hora_fin,r.horas_hombre,
			r.descripcion_trabajo,DATE_FORMAT(r.fecha_inicio,'%d-%m-%Y') AS FECHA
			,r.horas_trabajo,
			u.idusuario as CODIGOUSUARIO
			FROM reporte_trabajo as r INNER JOIN usuario as u 
			ON r.usuario_idusuario=u.idusuario INNER JOIN area as a ON 
			r.area_codigoarea=a.codigo_area 
			where usuario_idusuario='$USUARIO'  AND 
			r.fecha_inicio='$FECHA'
			";  
			$result= mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($result)==0) die("consulta la fecha  en la parte superior");
			
			while($row=mysql_fetch_array($result))
			{?>
			<tbody>
			<tr>
			<td><?php echo $row[FULLNAME] ?></td>
			<td><?php echo $row[NOMBREAREA]; ?></td>
			<td><?php echo $row[OT]; ?></td>
			<td><?php echo $row[hora_inicio]; ?></td>
			<td><?php echo $row[hora_fin]; ?></td>
			<td><?php  echo $row[horas_hombre]; ?></td>
			<td><?php echo $row[descripcion_trabajo]; ?></td>
			<td><?php echo $row[FECHA]; ?></td>
			</tr>
			<?php
			}
			?>
			</tbody>
			</table>
			</div>
			</div>
			</div>
			
			
			<div class="row clearfix">
			<div class="col-md-12 column">
			<div class="table-responsive">
			<table class="table table-bordered table-condensed">
			<thead>
			<tr class="success">	
			<th style="text-align: center">FECHA</th>
			<th style="text-align: center">HORAS EL DIA DE HOY </th>
			<th style="text-align: center">HORAS X DIA</th>
			<th style="text-align: center">HORAS FALTANTES</th>
			<th style="text-align: center">HORAS EXTRAS</th>
			</tr>
			</thead>
			<?php 
			$sql="SELECT  'total de horas',sum(horas_hombre) as total 
			from reporte_trabajo as r
			where usuario_idusuario='$USUARIO'  AND 
			r.fecha_inicio='$FECHA'";  
			$result= mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($result)==0) die("No hay registros para mostrar");
			
			while($row=mysql_fetch_array($result))
			{?>
			
			<tbody>
			<tr>
			<td style="text-align: center"><?php echo date("d-m-Y", strtotime($FECHA)); ?></td>
			<td style="text-align: center"><?php echo $row[total]; ?></td>
			<td style="text-align: center"><?php echo "9.6"; ?></td>
			<td style="text-align: center"><?php 
			$reto=9.6-$row[total]; 
			if ($reto<=0) {
			echo "<label class='text-primary'>
			RETO CUMPLIDO :D 
			<i class='glyphicon glyphicon-ok-circle'></i></label>";
			}
			else { echo $reto; 
			}
			
			?>
			</td>
			<td style="text-align: center">
			<?php 
			$extra=9.6-$row[total]; 
			if ($extra<=0) {
				echo abs($extra);
			}
			else
			{
				echo "0";

			}
			?>
			</td>
			</tr>
			<?php 
			
			}
			?>
			</tbody>
			</table>
			</div>
			
			
			</div>
			</body>
			</html>