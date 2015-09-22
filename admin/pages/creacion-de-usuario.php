<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Creación de Usuario</title>
<?php include('../header.php'); ?>
<script language="JavaScript" type="text/javascript" src="../insertar_ajax/usuario.js"></script>

</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-5 column">
<form name="nuevo_usuario" onsubmit="enviarDatosUsuario(); return false" autocomplete="off">
<div class="form-group">
<h2 class="text-primary">Creación de Usuario</h2>
<label>Nombre</label>
<input type="text" name="nombres" class="form-control" autofocus required
onchange="conMayusculas(this);">
</div>
<div class="form-group">
<label>Apellidos</label>
<input type="text" name="apellidos" class="form-control" required
onchange="conMayusculas(this);">
</div>
<div class="form-group">
<label>Área</label>
<select name="area" class="form-control"required>
<option value="">[SELECCIONAR]</option>
<?php
$link=Conectarse();
$Sql="SELECT codigo_area,nombre FROM area WHERE estado='00' ORDER BY nombre;";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['codigo_area']?>"><?php echo $row['nombre']?></option>
<?php }?>
</select>
</div>
<div class="form-group">
<label>Usuario(DNI)</label>
<input type="text" name="dni" class="form-control" required maxlength="8" >
</div>
<div class="form-group">
<label>Contraseña</label>
<input type="password" name="password" class="form-control" required  maxlength="8">
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary btn-lg btn-block">Agregar</button>	
</div>
</form>
</div>

<div class="col-md-7 column">
<div id="resultado">
<?php include('../vistas/usuario.php');?>
</div>
</div>
</div>
</div>
</body>
</html>