@extends('layouts.admin')

@section('contenido')
	

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Crear Turnos&nbsp;&nbsp;&nbsp;&nbsp;<a href="horario/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('registro.horario.search')
		</div>		
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>		
						<th style="text-align: center;">Turno</th>	
						<th style="text-align: center;">Inicio</th>
						<th style="text-align: center;">Fin</th>
						<th style="text-align: center;">Cupo</th>	
						<th style="text-align: center;">Opciones</th>	

					</thead>
					@foreach ($horarios as $hr)

					<tr>
						<td nowrap>{{ $hr->idHorario}}</td>
						<td nowrap>{{ $hr->turno}}</td>
						<td nowrap>{{ $hr->inicio}}</td>
						<td nowrap>{{ $hr->fin}}</td>
						<td nowrap>{{ $hr->cupo}}</td>
						
						<td nowrap>
							<a href="{{URL::action('HorarioController@edit',$hr->idHorario)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$hr->idHorario}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('registro.horario.modal')
					@endforeach			
				</table>
			</div>
			{{$horarios->render()}}
		</div>
	</div>
@endsection