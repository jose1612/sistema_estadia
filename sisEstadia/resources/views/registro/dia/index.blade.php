@extends('layouts.admin')

@section('contenido')
	

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Horarios<a href="dia/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('registro.dia.search')
		</div>		
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>		
						<th style="text-align: center;">Fisioterapeuta</th>		
						<th style="text-align: center;">Turno</th>	
						<th style="text-align: center;">Dia</th>	
						<th style="text-align: center;">Entrada</th>
						<th style="text-align: center;">Salida</th>	
						<th style="text-align: center;">Cupo</th>
						<th style="text-align: center;">Opciones</th>				
					</thead>
					@foreach ($dias as $di)
					<tr>
						<td nowrap>{{ $di->idDia}}</td>
						<td nowrapstyle="text-align: center;">{{ $di->fisio}}</td>
						<td nowrap style="text-align: center;">{{ $di->tur}}</td>
						<td nowrap style="text-align: center;">{{$di->nombre}}</td>
						<td nowrap style="text-align: center;">{{ $di->in}}</td>
						<td nowrap style="text-align: center;">{{ $di->fi}}</td>
						<td nowrap style="text-align: center;">{{ $di->cupo}}</td>
						<td nowrap style="text-align: center;">
							<a href="{{URL::action('DiaController@edit',$di->idDia)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$di->idDia}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('registro.dia.modal')
					@endforeach			
				</table>
			</div>
			{{$dias->render()}}
		</div>
	</div>
@endsection