@extends('layouts.admin')

@section('contenido')
	<!--ESTO ES PARA EL BOOB-->
<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Lesiones<a href="lesion/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('registro.lesion.search')
		</div>		
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>		
						<th>Nombre</th>
						<th>Tipo</th>
						<th>Descripcion</th>
						<th>Causa</th>
						<th>Opciones</th>						
					</thead>
					@foreach ($lesiones as $les)

					<tr>
						<td>{{ $les->idcLesion}}</td>
						<td>{{ $les->tipo_lesion}}</td>
						<td>{{ $les->descripcion}}</td>
						<td>{{ $les->causa}}</td>
						<td>{{ $les->prevencion}}</td>
						<td>
							<a href="{{URL::action('LesionController@edit',$les->idcLesion)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$les->idcLesion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>
					</tr>
					@include('registro.lesion.modal')
					@endforeach			
				</table>
			</div>
			{{$lesiones->render()}}
		</div>
	</div>

@endsection