<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Gráfico Barras</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
       
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'GRAFICO DE HORAS TRABAJADAS POR OT'
        },
        subtitle: {
            text: 'Source: control de reporte de taller'
        },
        xAxis: {
            categories: [
<?php
include('bd/conexion.php');
$link=Conectarse();
$FECHAINICIO=$_REQUEST[fechainicio];
$FECHAFIN=$_REQUEST[fechafin];
$sql=mysql_query("SELECT
 ot_codigoot,sum(horas_hombre)  AS horashombre
  from reporte_trabajo where estado='02'
AND  fecha_inicio between'$FECHAINICIO' and '$FECHAFIN'
group by ot_codigoot 
order by sum(horas_hombre) desc");
while($res=mysql_fetch_array($sql)){
?>
            
            ['<?php echo $res['ot_codigoot'] ?>'],
            
<?php
}
?>
            
            ],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'horas (trabajadas)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' horas'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -90,
            y: 1,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'OT  TRABAJADAS',
            data: [
<?php
$link=Conectarse();
$sql=mysql_query("SELECT
 ot_codigoot,sum(horas_hombre)  AS horashombre
  from reporte_trabajo where estado='02'
AND  fecha_inicio between'$FECHAINICIO' and '$FECHAFIN'
group by ot_codigoot 
order by sum(horas_hombre) desc");
while($res=mysql_fetch_array($sql)){
?>          
            [<?php echo round($res['horashombre'],2) ?>],
        
<?php
}
?>          
            ]
        },
        {
            name: 'HORAS PROGRAMADAS',
            data: [
<?php
$link=Conectarse();
$sql=mysql_query("SELECT
 r.ot_codigoot,sum(r.horas_hombre),o.horas  AS horashombre
  from reporte_trabajo  as r INNER JOIN ot_horas as o ON
r.ot_codigoot=o.ot where r.estado='02'
AND  fecha_inicio between'$FECHAINICIO' and '$FECHAFIN'
group by r.ot_codigoot 
order by sum(r.horas_hombre) desc");
while($res=mysql_fetch_array($sql)){
?>          
            [<?php echo round($res['horashombre'],2) ?>],
        
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
<body>
<div class="container">
<div class="row clearfix">
<div class="col-md-2 column">
<form action="barras.php" method="POST">
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
