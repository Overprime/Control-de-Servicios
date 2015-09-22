<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Creación de Área</title>
<?php include('../header.php'); ?>
<script language="JavaScript" type="text/javascript" src="../insertar_ajax/area.js"></script>

</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-5 column">
<form name="nueva_area" onsubmit="enviarDatosArea(); return false"
 autocomplete="off">
<div class="form-group">
<h2 class="text-primary">Creación de Áreas</h2>
<label>Nombre</label>
<input type="text" name="codigo" class="form-control" autofocus required
onchange="conMayusculas(this);">
</div>
<div class="form-group">
<label>Descripción</label>
<input type="text" name="descripcion" class="form-control" required
onchange="conMayusculas(this);">
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary btn-lg btn-block">Agregar</button>	
</div>
</form>
</div>

<div class="col-md-7 column">
<div id="resultado">
<?php include('../vistas/area.php');?>
</div>
</div>
</div>
</div>
</body>
</html>