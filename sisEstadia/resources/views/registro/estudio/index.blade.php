@extends('layouts.admin')

@section('contenido')
	<!--ESTO ES PARA EL BOOB-->
<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Estudios<a href="estudio/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('registro.estudio.search')
		</div>		
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>		
						<th>Nombre</th>
						<th>Comentarios</th>
						<th>Opciones</th>						
					</thead>
					@foreach ($estudios as $est)

					<tr>
						<td>{{ $est->idcEstudio}}</td>
						<td>{{ $est->tipo_estudio}}</td>
						<td>{{ $est->cometarios}}</td>
						<td>
							<a href="{{URL::action('EstudioController@edit',$est->idcEstudio)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$est->idcEstudio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>
					</tr>
					@include('registro.estudio.modal')
					@endforeach			
				</table>
			</div>
			{{$estudios->render()}}
		</div>
	</div>

@endsection