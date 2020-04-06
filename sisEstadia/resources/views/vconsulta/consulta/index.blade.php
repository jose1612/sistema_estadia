@extends('layouts.admin')

@section('contenido')
	

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Consultas<a href="consulta/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('vconsulta.consulta.search')	
			<a href="/tablero/index">

					<button class="btn btn-info">
						<span class="fa fa-chevron-circle-right"></span>
						&nbsp;&nbsp;Regresar
					</button>

			</a>

		</div>	

	</div>
{{$consultas->render()}}
	<div class="row">
		<p></p><p></p>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>						
						<!--Datos del Fisio-->
						<th style="text-align: center;">CÉDULA</th>
						<th style="text-align: center;">FISIOTERAPEUTA</th>	
						
						<!--Datos del Paciente-->
						<th style="text-align: center;">NÚMERO DE PACIENTE</th>
						<th style="text-align: center;">PACIENTE</th>
						

						<!--Datos de la consulta -->
						<th style="text-align: center;">FECHA</th>
						<th style="text-align: center;">DIAGNOSTICO</th>
						<th style="text-align: center;">RECOMENDACIONES</th>

						<th style="text-align: center;">OPCIONES</th>				 
										
					</thead>
					@foreach ($consultas as $con)
					<tr>
						
						<!--Datos del Fisio-->
						<td nowrap>{{ $con->ce}}</td>
						<td nowrap style="text-transform:uppercase;">{{ $con->nom_fis}} {{ $con->pat_fis}} {{ $con->mat_fis}}</td>
						
						
						<!--Datos del Paciente-->
						<td nowrap style="text-align: center;">{{ $con->num_pac}}</td>
						<td nowrap style="text-transform:uppercase;">{{ $con->nom_pac}} {{ $con->pat_pac}} {{ $con->mat_pac}}</td>
						

						<!--Datos de la consulta -->
						<td nowrap style="text-transform:uppercase;">{{ $con->fecha_consulta}}</td>
						<td nowrap style="text-transform:uppercase;">{{ $con->diagnostico}}</td>
						<td nowrap style="text-transform:uppercase;">{{ $con->tratamineto}}</td>


						<td nowrap style="text-align: center;" >
							

							<a href="{{URL::action('ConsultaController@show',$con->idConsulta)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp; Ver</button></a>

							<a href="" data-target="#modal-delete-{{$con->idConsulta}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp; Borrar</button></a>
								
							

							<a href="{{URL('vconsulta/consulta/pdf/'.$con->idConsulta)}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp; Imprimir</button></a>		
						

						</td>											
					</tr>
					@include('vconsulta.consulta.modal')
				
					@endforeach			
		
				</table>
			</div>
			{{$consultas->render()}}
			
		</div>
	</div>


@endsection