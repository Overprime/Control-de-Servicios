
<style type="text/css">
th,td{
	font-size: 12px;
}	

.referencia{
font-size: 10px;	
}
</style>


<?php
//inicio de sesión;
session_start();
//conexion de BD
$link=Conectarse();
//fecha sistema
$fechasistema=date('d-m-Y');

$sql="SELECT usuario,fecha,
date_format(fecha,'%d-%m-%Y')as fecha_formato
 FROM valores_fecha WHERE usuario=$_SESSION[idusuario]";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
  $FECHA=$row[fecha];
  $FECHAFORMATO=$row[fecha_formato];
} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 
?>
<div class="table-responsive">
<table class="table table-responsive table-bordered table-condensed">
<thead>
<tr class="active">
<th width="100">USUARIO</th>
<th width="50"width="50">ÁREA</th>
<th width="100">OT</th>
<th width="10">H. INICIO</th>
<th width="50">H. FIN</th>
<th width="50" >H.HOMBRES</th>
<th width="100" >DESCRIPCIÓN</th>
<th width="90">FECHA</th>
<th width="10"><a href="#" class="btn btn-warning referencia">
<i class="glyphicon glyphicon-exclamation-sign"></i>
</a></th>
<th width="10" >
<a href="#" class="btn btn-success referencia">
<i class="glyphicon glyphicon-edit" ></i></a>
</th>
<th width="10" >
<a href="#" class="btn btn-danger referencia">
<i class="glyphicon glyphicon-trash" ></i></a>
</th>
</tr>
</thead>
<?php 

$sql="SELECT codigo,CONCAT(u.nombres,' ',u.apellidos) AS FULLNAME,fecha_inicio,
(a.nombre)as NOMBREAREA,(ot_codigoot)as OT,r.hora_inicio,
r.hora_fin,r.horas_hombre,
r.descripcion_trabajo,DATE_FORMAT(r.fecha_inicio,'%d-%m-%Y') AS FECHA
,r.horas_trabajo,
u.idusuario as CODIGOUSUARIO,r.fecha_creacion as fechasistema
FROM reporte_trabajo as r INNER JOIN usuario as u 
ON r.usuario_idusuario=u.idusuario INNER JOIN area as a ON 
r.area_codigoarea=a.codigo_area /*INNER JOIN ot_horas as oth  ON 
r.ot_codigoot=oth.ot */where
 usuario_idusuario='$_SESSION[idusuario]'  
AND 
r.fecha_inicio=(SELECT fecha FROM valores_fecha 
where usuario=$_SESSION[idusuario])
  AND r.estado='02' 
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
<td>
<?php 
if ($fechasistema>$row[FECHA]) {
	echo"<a class='btn btn-danger referencia'>
	<i class='glyphicon glyphicon-remove-circle'></i>
	</a>";
}else
{
echo"<a class='btn btn-primary referencia'>
	<i class='glyphicon glyphicon-ok-circle'></i></a>";
}


 ?>	


</td>
<td>
<a href="../editar/reporte?id=<?php echo $row[codigo]; ?>"
 class="btn btn-success referencia">
<i class="glyphicon glyphicon-edit"></i></a>
</td>
<td><a href="../eliminar/reporte?id=<?php echo $row[codigo]; ?>"
 class="btn btn-danger referencia">
<i class="glyphicon glyphicon-trash"></i></a></td>
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
where usuario_idusuario='$_SESSION[idusuario]'  AND 
r.fecha_inicio=(SELECT fecha FROM valores_fecha where usuario=$_SESSION[idusuario])  AND r.estado='02'";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr>
<td style="text-align: center"><?php echo $FECHAFORMATO; ?></td>
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
</div>




<div class="row clearfix">
<div class="col-md-12 column">
<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr class="danger">	
<th style="text-align: center">OT</th>
<th style="text-align: center">HORAS TRABAJADAS </th>
<th style="text-align: center">HORAS PROGRAMADAS</th>
<th style="text-align: center">HORAS FALTANTES</th>
<th style="text-align: center">HORAS EXTRAS</th>
</tr>
</thead>
<?php 
$sql="SELECT sum(r.horas_hombre) as  totalhoras,r.ot_codigoot,oth.horas
as  horas_programadas,oth.ot FROM  reporte_trabajo as r 
inner JOIN ot_horas as oth ON r.ot_codigoot=oth.ot  where 
 r.estado='02' and r.ot_codigoot IN (SELECT r.ot_codigoot FROM  
reporte_trabajo as r where usuario_idusuario=$_SESSION[idusuario] and 
r.fecha_inicio=(SELECT fecha FROM valores_fecha 
where usuario=$_SESSION[idusuario])
group by r.ot_codigoot)
group by r.ot_codigoot;
";  
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");

while($row=mysql_fetch_array($result))
{?>

<tbody>
<tr>

<td style="text-align: center"><label><?php echo $row[ot_codigoot]; ?></label></td>
<td style="text-align: center"><label><?php echo round($row[totalhoras],2); ?></label></td>
<td style="text-align: center"><label><?php echo round($row[horas_programadas],2); ?></label></td>
<td style="text-align: center"><?php 
if (($row[horas_programadas]-$row[totalhoras])<0) 
{
echo "<label class='text-primary'>
RETO CUMPLIDO :D 
<i class='glyphicon glyphicon-ok-circle'></i></label>";
}
else 
{ 
echo "<label>";
echo $row[horas_programadas]-$row[totalhoras]; 
echo "</label>";
}

?>
</td>


<td style="text-align: center"><?php 
if (($row[horas_programadas]-$row[totalhoras])<=0) 
{
echo abs($row[horas_programadas]-$row[totalhoras]);
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
</div>