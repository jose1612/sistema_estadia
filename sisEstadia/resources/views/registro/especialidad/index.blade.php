@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">			
			@include('registro.especialidad.search')
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">	
			<h3 align="right">
				<a href="especialidad/create">
					<button class="btn btn-success">
						<span class="glyphicon glyphicon-plus-sign"></span>
						&nbsp;&nbsp;Añadir nuevo
					</button>
				</a>
			</h3>
		</div>
		<div class="row">
			<div class="col-lg-7 col-md-8 col-sm-8 col-xs-9">
				<h3 align="center">LISTADO DE ESPECIALIDADES</h3>
				
			</div>
		</div>		
	</div>
	
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			{{$especialidades->render()}}
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>		
						<th style="text-align: center;">NOMBRE</th>		
				
						<th style="text-align: center;">OPCIONES</th>					
					</thead>
					@foreach ($especialidades as $esp)

					<tr>
						<td nowrap>{{ $esp->idEspecialidad}}</td>
						<td nowrap style="text-align: center;">{{$esp->nombre}}</td>
						<td nowrap style="text-align: center;" >
							

							<a href="{{URL::action('EspecialidadController@edit',$esp->idEspecialidad)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp; Editar</button></a>

							<a href="" data-target="#modal-delete-{{$esp->idEspecialidad}}" data-toggle="modal"><button class="btn btn-danger"><span class="	glyphicon glyphicon-trash"></span>&nbsp;&nbsp; Borrar</button></a>	
						</td>
					</tr>
					@include('registro.especialidad.modal')
					@endforeach			
				</table>
			</div>
			{{$especialidades->render()}}
		</div>
	</div>
@endsection