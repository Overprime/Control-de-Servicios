<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Reporte Diario</title>
<?php include('../header.php'); ?>
<?php 
//Variables:
$IDREPORTE=$_REQUEST['id'];
$FECHAINICIO=$_REQUEST['fechainicio'];

/*REALIZAMOS LA CONSULTA PARA OBTENER LOS DATOS DEL REPORTE */
$link=Conectarse();
$sql="SELECT *FROM reporte_trabajo where codigo='$IDREPORTE'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
 $USUARIO=$row[usuario_idusuario];
 $FECHA=$row[fecha_inicio];
 $OT=$row[ot_codigoot];
 $DETALLE=$row[descripcion_trabajo];
 $HORAINICIO=$row[hora_inicio];
 $HORAFIN=$row[hora_fin];

} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 


?>

<?php 
/*REALIZAMOS LA CONSULTA PARA OBTENER LA DESCRIPCION DE LA HORA DE INICIO*/

$sql="SELECT  fi.descripcion,fi.valor from fechainicio as fi where descripcion='$HORAINICIO'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$VALORHORAINCIO=$row[valor];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 


 ?>
 <?php 
/*REALIZAMOS LA CONSULTA PARA OBTENER LA DESCRIPCION DE LA HORA DE FIN*/

$sql="SELECT  fi.descripcion,fi.valor from fechafin as fi where descripcion='$HORAFIN'";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
$VALORHORAFIN=$row[valor];
} while ($row =mysql_fetch_array($result));
}else { 
echo "error";
} 


 ?>

</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<button class="btn btn-primary">
<i class="glyphicon glyphicon-chevron-left"></i>REGRESAR</button>
<h5 class="text-right"><a class="btn btn-danger"
 id="modal-858" href="#modal-container-858" role="button" 
  data-toggle="modal">
<i class="glyphicon glyphicon-trash"></i>
ELIMINAR</a></h5>
</div>
</div>
<div class="row clearfix">
<div class="col-md-3 column">
<form action="../actualizar/reporte.php" method="POST">
<input type="hidden" value="<?php echo $IDREPORTE ?>" name="idreporte">
<input type="hidden" value="<?php echo $USUARIO ?>" name="usuario">
<input type="hidden" value="<?php echo $FECHAINICIO ?>" name="fechainicio">
<div class="form-group">
<label for="">Orden de Trabajo:</label>
<select name="ot" class="form-control"required>
<option value="<?php echo $OT; ?>"><?php echo $OT; ?></option>
<?php
include('../bd/conexionSQL.php');
$linkSQL=ConectarseSQL();
$Sql="SELECT CODIGOOT FROM  [020BDCOMUN].DBO.CENCOSOT  WHERE USUARIO in ('4','6')
AND  
CODIGOOT  IN (SELECT OF_COD FROM [011BDCOMUN].dbo.ORD_FAB
WHERE OF_ESTADO ='ACTIVO') ORDER BY CODIGOOT";
$result=mssql_query($Sql) or die(mssql_error());
while ($row=mssql_fetch_array($result)) {s
?>
<option value ="<?php echo $row['CODIGOOT']?>"><?php echo $row['CODIGOOT']?></option>
<?php }?>
</select>
</div>

</div>
<div class="col-md-3 column">
<div class="form-group">
<label>Fecha:</label>
<input type="date" name="fecha" id=""
 value="<?php echo $FECHA; ?>" class="form-control" READONLY>
</div>
</div>
<div class="col-md-3 column">
<div class="form-group">
<label>Hora Inicio:</label>
<select name="horainicio" class="form-control"required>
<option value="<?php echo $VALORHORAINCIO; ?>"><?php echo $HORAINICIO; ?></option>
<?php
$link=Conectarse();
$Sql="SELECT valor,descripcion 
FROM fechainicio WHERE valor NOT LIKE '$VALORHORAINCIO';";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['valor']?>"><?php echo $row['descripcion']?></option>
<?php }?>
</select>
</div>
</div>
<div class="col-md-3 column">
<div class="form-group">
<label>Hora Fin:</label>
<select name="horafin" class="form-control"required>
<option value="<?php echo $VALORHORAFIN; ?>"><?php echo $HORAFIN; ?></option>
<?php
$link=Conectarse();
$Sql="SELECT valor,descripcion FROM fechafin WHERE valor NOT LIKE '$VALORHORAFIN';";
$result=mysql_query($Sql) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
?>
<option value ="<?php echo $row['valor']?>"><?php echo $row['descripcion']?></option>
<?php }?>
</select>
</div>
</div>
</div>
<div class="row clearfix">

<div class="col-md-12 column">
<div class="form-group">
<label for="">Descripción del Trabajo:</label>
<textarea name="detalle" id="" cols="3" rows="3" class="form-control">
<?php echo $DETALLE; ?>
</textarea>
</div>
<div class="form-group">
<a class="btn btn-success btn-lg btn-block"
 id="modal-858341" href="#modal-container-858341" role="button" 
  data-toggle="modal">ACTUALIZAR  INFORMACIÓN</a>



<div class="modal fade" id="modal-container-858341" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-center text-success" id="myModalLabel">
ACTUALIZAR  INFORMACION DEL REPORTE
</h4>
</div>
<div class="modal-body">
¿ESTAS SEGURO DE ACTUALIZAR LA INFORMACIÓN?
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success">Si estoy seguro</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 

</div>
</div>

</div>

</div>

</form>
</div>
</div>

</div>
</body>



<div class="modal fade" id="modal-container-858" role="dialog"
 aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-center text-danger" id="myModalLabel">
ELIMINAR REPORTE
</h4>
</div>
<div class="modal-body">
¿ESTAS SEGURO DE ELIMINAR EL REGISTRO?
</div>
<div class="modal-footer">
<a  href="../eliminar/reporte?id=<?php echo $IDREPORTE; ?>&
fecha=<?php echo $FECHA; ?>&usuario=<?php echo $USUARIO ?>&
fechainicio=<?php echo $FECHAINICIO; ?>"   class="btn btn-danger">ELIMINAR</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> 

</div>
</div>

</div>

</div>
</html>