<link rel="stylesheet" type="text/css" href="/control-de-servicios/include/css/bootstrap.min.css">
<link href="/control-de-servicios/include/css/style.css" rel="stylesheet">


<div class="row clearfix">
<div class="col-md-12 column">
<h2 class="text-primary">Lista de Usuarios</h2>
<div class="table-responsive">
<table class="table table-bordered table-condensed table-striped">
<thead>
<tr class="danger">
<th>ID</th>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>USUARIO</th>
<th>ÁREA</th>
<th>FECHA</th>
<th style="text-align: center">
<i class="glyphicon glyphicon-edit text-primary"></i>
</th>
<th style="text-align: center">
<i class="glyphicon glyphicon-trash text-danger"></i>
</th>

</tr>

</thead>

<?php 
$link= Conectarse();
$listado=mysql_query("SELECT u.idusuario,u.nombres,u.apellidos,u.usuario,u.idarea,a.nombre,
codigo_area,DATE_FORMAT(u.fecha_creacion,'%d/%m/%Y') as fecha,contrasena
FROM usuario  as u INNER JOIN 
area as a ON u.idarea=a.codigo_area  WHERE 	u.estado='00' AND  u.tipo='00'	
 ORDER BY u.idusuario",$link);
?>

<tbody>
<?php
while($reg=  mysql_fetch_array($listado)) 
{
?>
<tr>
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

<td><strong><?php echo $reg[idusuario]; ?></strong></td>
<td><strong><?php echo $reg[nombres]; ?></strong></td>
<td><strong><?php echo $reg[apellidos]?></strong></td>
<td><strong><?php echo $reg[usuario]; ?></strong></td>
<td><strong><?php echo $reg[nombre]; ?></strong></td>
<td><strong><?php echo $reg[fecha]; ?></strong></td>
<td style="text-align: center"class="text-primary">
<a id="modal-899574" href='<?php echo $txtxa;?>'
role="button" class="btn" data-toggle="modal">
<i class="glyphicon glyphicon-edit text-primary">	</i></a>
</td>
<td style="text-align: center"class="text-primary">
<a id="modal-899574" href='<?php echo $txtx;?>'
role="button" class="btn" data-toggle="modal">
<i class="glyphicon glyphicon-trash text-danger">	</i></a>
</td>
<!-- INICIO MODAL TRASLADAR -->
<div class="modal fade" id="<?php echo $txta; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="myModalLabel">
Actulizar Información del Usuario
</h4>
</div>
<div class="modal-body">
<div class="row clearfix">
<div class="col-md-12 column">
<form class="form-horizontal" role="form" method="POST" action="../actualizar/usuario"
autocomplete="Off" >
<div class="form-group">
<label for="" class="col-sm-3 control-label">NOMBRES</label>
<div class="col-sm-9">
<input type="text" name="nombres" class="form-control"  
value="<?php echo $reg[nombres] ?>"  onchange="conMayusculas(this);"/>
</div> 
</div>
<br><br><br>
<div class="form-group">
<label for="" class="col-sm-3 control-label">APELLIDOS</label>
<div class="col-sm-9">
<input type="text" name="apellidos"class="form-control" 
value="<?php echo $reg[apellidos] ?>"  onchange="conMayusculas(this);"/>
</div>
</div>
<br><br>
<div class="form-group">
<label for="" class="col-sm-3 control-label">ÁREA</label>
<div class="col-sm-9">
<select name="area" class="form-control"required>
<option value="<?php echo $reg[codigo_area] ?>"><?php echo $reg[nombre] ?></option>
<?php
$link=Conectarse();
$Sql="SELECT codigo_area,nombre FROM area  
WHERE codigo_area not like '$reg[codigo_area]'  AND estado='00' ORDER BY nombre;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['codigo_area']?>"><?php echo $row['nombre']?></option>
<?php }?>
</select>
</div>
</div>
<br><br>
<div class="form-group">
<label for="" class="col-sm-3 control-label">USUARIO</label>
<div class="col-sm-9">
<input type="text"  name="usuario"class="form-control"
 value="<?php echo $reg[usuario] ?>" onchange="conMayusculas(this);" />
</div>
</div>
<br><br>
<div class="form-group">
<label for="" class="col-sm-3 control-label">CONTRASEÑA</label>
<div class="col-sm-9">
<input type="password" name="contrasena_nueva"class="form-control"   />
</div>
</div>
<input type="hidden" value="<?php echo $reg[contrasena] ?>" name="contrasena_actual">
<input type="hidden" value="<?php echo $reg[idusuario] ?>" name="idusuario">
</div>
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
<!-- FIN MODAL TRASLADAR -->



<!-- INICIO MODAL ELIMINAR -->
<div class="modal fade" id="<?php echo $txt; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-danger" id="myModalLabel">
Eliminar  Usuario
</h4>
</div>
<div class="modal-body">
¿Desea eliminar  el usuario <strong><?php echo $reg[nombres].' '.$reg[apellidos]; ?></strong>?
</div>
<div class="modal-footer">

 <a href="../eliminar/usuario?id=<?php echo $reg[idusuario]; ?>" class="btn btn-danger"style="">Eliminar</a>

<button type="button" class="btn btn-default" data-dismiss="modal">Cerar</button>
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
</tbody>

</table>
</div>
</div>
</div>

