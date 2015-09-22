<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>OT-HORAS</title>
<?php include('../header.php'); ?>

<?php 
//Variables:
$ID=$_REQUEST['id'];

/*REALIZAMOS LA CONSULTA PARA OBTENER LOS DATOS DEL REPORTE */
$link=Conectarse();
$sql="SELECT ot,horas,estado FROM ot_horas where id_ot_horas='$ID'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$OT=$row['ot'];
$HORAS=$row['horas'];
$ESTADO=$row['estado'];

} 
while ($row =mysql_fetch_array($result));
}else
{ 
echo "error";
} 


?>
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-2 column">
</div>
<div class="col-md-8 column">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close"  >
<a href=""><i class="glyphicon glyphicon-trash text-danger"></i></a>
</button>
<h4 class="" id="myModalLabel">
<i class="glyphicon glyphicon-th"></i>
ACTUALIZAR  INFORMACIÓN

</h4>
</div>
<div class="modal-body">
<form action="../actualizar/ot.php" method="GET">
<input type="hidden" name="id" value="<?php echo $ID; ?>">
<input type="hidden" name="ota" value="<?php echo $OT; ?>">
<div class="form-group"><input type="text" name="ot"  value="<?php echo $OT; ?>" placeholder="INGRESE LA OT"class="form-control" required></div>
<div class="form-group"><input type="number" step="any" min='0'name="horas" value="<?php echo $HORAS; ?>" placeholder="INGRESE LAS HORAS" class="form-control" required></div>
<div class="form-group">
<select name="estado" class="form-control">
<option value="<?php echo $ESTADO; ?>">
<?php 
if ($ESTADO=='00')
{
echo "ACTIVO";
}
else
{
echo "LIQUIDADO";
}
?>
</option>
<option value="00">ACTIVO</option>
<option value="01">LIQUIDADO</option>
</select>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">
GRABAR INFORMACIÓN
</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>