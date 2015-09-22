<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Bienvenidos</title>
<?php include('header.php'); ?>

<style type="text/css">
input{

display: inline-block;
width: 300px;
border-radius: 5px;
}

button{

display: inline-block;
font-family: monospace;
border-radius: 5px;
background-color: #3C1BE2;
color: white;


}

em{

  font-size: 45px;  
  font-style: normal;
  color: red;
}

</style>
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-12 column">
<div class="jumbotron">

<?php 
$link=Conectarse();
$sql="SELECT usuario,date_format(fecha,'%d-%m-%Y')as 
fecha FROM valores_fecha WHERE usuario=$_SESSION[idusuario]";
$result       =mysql_query($sql,$link);
if ($row      =mysql_fetch_array($result)) {
mysql_field_seek($result,0);
while ($field =mysql_fetch_field($result)) {
}do {
 $FECHA=$row[fecha];
} while ($row =mysql_fetch_array($result));
}else { 
echo "";
} 

 ?>


<h2>FECHA  ACTUAL DE TRABAJO: <em><?php echo $FECHA; ?></em></h2>

<form action="registrar/fecha_proceso.php" method="POST">
   <input type="date" name="fecha"  max="<?php echo date('Y-m-d'); ?>" required>
   <button>DEFINIR FECHA DE TRABAJO</button>
</form>
</div>
</div>
</div>
</div>
</body>
<footer class="footer">
<div class="container">
<p class="text-muted text-center">Área de TI Overprime</p>
</div>
</footer>
</body>
</html>