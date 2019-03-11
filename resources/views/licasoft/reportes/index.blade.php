@extends ('layouts.admin')
@section ('contenido')
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
          @foreach ($ficha as $fichas)
					@foreach ($convenios as $papa)
					@if ($papa['id']  == $fichas->id_convenio )
					['{{ $papa->name}}', {{ $fichas->resultado}}],
					@endif
					@endforeach
          @endforeach
        ]);
        var options = {
          title: 'Reportes de convenios con mas traslados finalizados correctamente'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  <h2 >REPORTE 1</h2>
    <div id="piechart" style="width: 1500PX; height: 600px;"></div>
  </body>

  
@endsection