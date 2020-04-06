@extends('layouts.admin')
@section('contenido')
    
	<!-- Main content -->
	     
<div class="row">
	<div class="col-md-12">
	    <div class="box">
		    <div class="box-header with-border">
		      <h1 class="box-title">Acceso Rápido</h1>
		      <br>
		      <div class="box-tools pull-right">
		        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		       <!--  Esta linea sirve para cerrar el blade
		        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		    -->
		      </div>
		    </div>
	    <!-- /.box-header -->

		    <div class="box-body">
		      	<div class="row">
		          	<div class="col-md-12">
		                      <!--Contenido-->
		                  @yield('contenido')
		                <div class="row">

					        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					            <div class="info-box bg-green">
					              <span class="info-box-icon bg-info"><i class="fa fa-user-md"></i></span>

					                <div class="info-box-content">
					                    <span class="info-box-text"><h4>Médico</h4></span>
					                    <span class="info-box-number">{{$contar}}</span>
					                    <a href="{{url('registro/fisioterapeuta')}}" class="btn btn-success">Detalles</a>
					                </div>						             
					            </div>						           
					        </div>
					          
					        <!-- /.col -->
					        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					            <div class="info-box bg-aqua">
					              	<span class="info-box-icon bg-primary"><i class="ion ion-person"></i></span>

					              <div class="info-box-content">
					                <span class="info-box-text"><h4>Pacientes</h4></span>
					                <span class="info-box-number">{{$contar2}}</span>
					                <a href="{{url('registro/paciente')}}" class="btn btn-primary">Detalles</a>
					              </div>
					              <!-- /.info-box-content -->
					            </div>
					            <!-- /.info-box -->
					        </div>


					        <!-- /.col -->
					        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					            <div class="iinfo-box bg-red">
					              	<span class="info-box-icon bg-danger"><i class="fa fa-stethoscope"></i></span>

					              <div class="info-box-content">
					                <span class="info-box-text"><h4>Consulta</h4></span>
					                <span class="info-box-number">{{$contar4}}</span>
					                <a href="{{url('vconsulta/consulta')}}" class="btn btn-danger">Detalles</a>
					              </div>
					              <!-- /.info-box-content -->
					            </div>
					            <!-- /.info-box -->
					        </div>
					        
					        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						        <div class="info-box bg-yellow">
						            <span class="info-box-icon bg-warning"><i class="fa fa-calendar"></i></span>

						            <div class="info-box-content">
						                <span class="info-box-text"><h4>Citas</h4></span>
						                <span class="info-box-number">{{$contar3}}</span>
						                 <a href="{{url('vconsulta/cita')}}" class="btn btn-warning">Detalles</a>
						            </div>
						              <!-- /.info-box-content -->
						        </div>
						            <!-- /.info-box -->
						    </div>
						</div><!--Fin Contenido--> 		                  
		          	</div>        
		 	    </div><!-- /.row -->
		    </div><!-- /.box-body -->
	  	</div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->


<!-- Espacio para crear una grafica-->

<!-- DOS GRAFICAS -->
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> Profesinones de Pacientes Registrados</h3>
                <br>
                <div class="box-tools pull-right">
                	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
     			</div>
     			  <div id="piechart_3d" style="width: 400px; height: 280px;"></div>  			
            </div>
        </div><!--   -->
    </div><!-- /.col -->


    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Gráficas</h3>
                <br>
                	<div class="box-tools pull-right">
               			 <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
               	    </div>

     		</div> 

        </div><!-- /.box -->
        <div id="piechart_3d" style="width: 500px; height: 380px;"></div>   
    </div><!-- /.col -->
</div><!-- /.row -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          
          ['Profesiones', 'Atendidas'],
          @foreach($pastel as $pasteles)
          	['{{$pasteles->nombre}}',{{$pasteles->total}}],
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

