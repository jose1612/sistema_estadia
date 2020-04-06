@extends('layouts.admin')

@section('contenido')
	

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Citas<a href="cita/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('vconsulta.cita.search')	
			<a href="/tablero/index">
					<button class="btn btn-info">
						<span class="fa fa-chevron-circle-right"></span>
						&nbsp;&nbsp;Regresar
					</button>
				</a>		
		</div>	
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">


					<thead>						
						<!--Datos del Fisio-->						
						<th style="text-align: center;">FISIOTERAPEUTA</th>							
						<!--Datos del Paciente-->						
						<th style="text-align: center;">PACIENTE</th>						
						<!--Datos de la consulta -->
						<th style="text-align: center;">FECHA </th>
						<th style="text-align: center;">CITA</th>
						<th style="text-align: center;">HORA</th>
						<th style="text-align: center;">RECOMENDACIONES</th>
						<th style="text-align: center;">ESTADO</th>
						<th style="text-align: center;">OPCIONES</th>										
					</thead>
					@foreach ($citas as $cit)



					<tr>
						
						<!--Datos del Fisio que atiende-->
						
						<td nowrap style="text-transform:uppercase;"> {{ $cit->ce}} {{ $cit->nom_fis}} {{ $cit->pat_fis}} {{ $cit->mat_fis}}</td>
						
						
						<!--Datos del Paciente-->
						
						<td nowrap style="text-transform:uppercase;">{{ $cit->num_pac}} {{ $cit->nom_pac}} {{ $cit->pat_pac}} {{ $cit->mat_pac}}</td>
						

						<!--Dia de la cita -->
						<td nowrap style="text-transform:uppercase;">{{ $cit->fecha_creada}}</td>

						<!--Cuando es la cita -->
						<td nowrap style="text-transform:uppercase;">{{ $cit->fecha_cita}}</td>	
						<td nowrap style="text-transform:uppercase;">{{ $cit->hora}}</td>
						<td nowrap style="text-transform:uppercase;">{{ $cit->tratamineto}}</td>						

						<td nowrap style="text-transform:uppercase;">{{ $cit->estado_cita}}</td>

						<td nowrap style="text-align: center;" >
						<!--

							<a href="{{URL::action('CitaController@edit',$cit->idConsulta)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp; Editar</button></a>
						-->
							<button type="button" class="btn btn-warning">Cancelar</button>

							<a href="" data-target="#modal-delete-{{$cit->idConsulta}}" data-toggle="modal"><button class="btn btn-danger"><span class="	glyphicon glyphicon-trash"></span>&nbsp;&nbsp; Borrar</button></a>	
							<a href="{{URL('vconsulta/cita/pdf/'.$cit->idConsulta)}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp; Imprimir</button></a>


						</td>				


										
					</tr>
					@include('vconsulta.cita.modal')
				
					@endforeach			
				</table>
			</div>
			{{$citas->render()}}
		</div>
	</div>


@endsection