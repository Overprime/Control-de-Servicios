<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Gráfico Pie</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<style type="text/css">
${demo.css}
</style>
<script type="text/javascript">
$(function () {
$('#container').highcharts({
chart: {
plotBackgroundColor: null,
plotBorderWidth: null,
plotShadow: false
},
title: {
text: 'PORCENTAJE DE OT'
},
tooltip: {
pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
},
plotOptions: {
pie: {
allowPointSelect: true,
cursor: 'pointer',
dataLabels: {
enabled: true,
format: '<b>{point.name}</b>: {point.percentage:.1f} %',
style: {
color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
}
}
}
},
series: [{
type: 'pie',
name: '',
data: [

<?php
$FECHAINICIO=$_REQUEST[fechainicio];
$FECHAFIN=$_REQUEST[fechafin];
include('bd/conexion.php');
$link=Conectarse();
$sql=mysql_query("SELECT
 ot_codigoot,sum(horas_hombre)  AS horashombre
  from reporte_trabajo where estado='02'
AND  fecha_inicio between'$FECHAINICIO' and '$FECHAFIN'
group by ot_codigoot 
order by sum(horas_hombre)");
while($res=mysql_fetch_array($sql)){
?>

['<?php echo $res['ot_codigoot']; ?>', <?php echo $res['horashombre'] ?>],

<?php
}
?>	

]
}]
});
});


</script>
</head>
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-2 column">
<form action="pie.php" method="POST">
<input type="date" class="form-control" name="fechainicio" 
value="<?php echo $FECHAINICIO; ?>">
</div>
<div class="col-md-2 column">
<input type="date" class="form-control" name="fechafin" 
value="<?php echo $FECHAFIN; ?>">
</div>
<div class="col-md-2 column">
<button  type="submit"class="btn btn-success">CALCULAR</button>
</form>
</div>
</div>

<div class="row clearfix">
<div class="col-md-10 column">
<div id="container">
</div>
</div>
</div>
</div>

</body>

<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>
</html>
