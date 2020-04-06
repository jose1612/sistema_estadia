@extends('layouts.admin')

@section('contenido')
  
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-success" style="max-width: 508rem;">
        <div align="center" class="panel-heading"><h4>GRÁFICA DE SEXO PACIENTES</h4></div>
            <div class="panel-body" >
              <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                  <div id="piechart_3d" style="width: 600px; height: 480px;"></div>
                </div>                  
              </div>
            </div>              
          </div>
        </div>        
    </div>      
  </div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          
          ['Profesiones', 'Atendidas'],
          @foreach($pastel as $pasteles)
            ['{{$pasteles->sexo}}',{{$pasteles->fem}}],
            ['{{$pasteles->sexo}}',{{$pasteles->mas}}],
          @endforeach

        ]);

        var options = {          
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>


@endsection