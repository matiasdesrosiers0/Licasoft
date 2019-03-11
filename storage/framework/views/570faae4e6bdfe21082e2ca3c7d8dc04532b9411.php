<?php $__env->startSection('contenido'); ?>
<style>
h2 {
    text-align:center;
}
      
 
    </style>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Convenio', 'Nº'],
          <?php foreach($ficha as $fichas): ?>
					<?php foreach($convenios as $papa): ?>
					<?php if($papa['id']  == $fichas->id_convenio ): ?>
					['<?php echo e($papa->name); ?>', <?php echo e($fichas->resultado); ?>],
					<?php endif; ?>
					<?php endforeach; ?>
                    <?php endforeach; ?>
        ]);
        var options = {
          title: 'Reportes de totales pagados por convenio a E.M.S Lifecare '
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  <h2 >REPORTE 2</h2>
    <div id="piechart" style="width: 1500PX; height: 600px;"></div>
  </body>

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>