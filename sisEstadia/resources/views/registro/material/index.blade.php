@extends('layouts.admin')

@section('contenido')
	<!--ESTO ES PARA EL BOOB-->

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Materiales<a href="material/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('registro.material.search')
		</div>		
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>		
						<th>Nombre</th>
						<th>Tipo de Material</th>
						<th>Cantidad</th>
						<th>Comentarios</th>
						<th>Opciones</th>						
					</thead>
					@foreach ($materiales as $mat)

					<tr>
						<td>{{ $mat->idcMateial}}</td>
						<td>{{ $mat->nombreM}}</td>
						<td>{{ $mat->tipo_materia}}</td>
						<td>{{ $mat->cantidad}}</td>
						<td>{{ $mat->comentarios}}</td>
						<td nowrap>
							<a href="{{URL::action('MaterialController@edit',$mat->idcMateial)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$mat->idcMateial}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

						</td>
					</tr>
					@include('registro.material.modal')
					@endforeach			
				</table>
			</div>
			{{$materiales->render()}}
		</div>
	</div>


@endsection