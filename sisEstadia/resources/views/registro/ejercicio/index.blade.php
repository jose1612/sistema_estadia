@extends('layouts.admin')

@section('contenido')
	<!--ESTO ES PARA EL BOOB-->

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de ejercicios<a href="ejercicio/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('registro.ejercicio.search')
		</div>		
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>		
						<th style="text-align: center;">Nombre</th>
						<th style="text-align: center;">Descripción</th>
						<th style="text-align: center;">Repeticiones</th>
						<th style="text-align: center;">Opciones</th>						
					</thead>
					@foreach ($ejercicios as $eje)

					<tr>
						<td nowrap>{{ $eje->idEjercicio}}</td>
						<td nowrap>{{ $eje->nombreE}}</td>
						<td nowrap>{{ $eje->descripcion}}</td>
						<td nowrap style="text-align: center;">{{ $eje->repeticiones}}</td>
						<td nowrap>
							<a href="{{URL::action('EjercicioController@edit',$eje->idEjercicio)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$eje->idEjercicio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>
					</tr>
					@include('registro.ejercicio.modal')
					@endforeach			
				</table>
			</div>
			{{$ejercicios->render()}}
		</div>
	</div>


@endsection