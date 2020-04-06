@extends('layouts.admin')

@section('contenido')
	

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Terapias<a href="terapia/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('vconsulta.terapia.search')	
			<a href="/tablero/index">

					<button class="btn btn-info">
						<span class="fa fa-chevron-circle-right"></span>
						&nbsp;&nbsp;Regresar
					</button>
			</a>
		</div>	

	</div>
{{$terapia->render()}}
	<div class="row">
		<p></p><p></p>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>						
						<!--Datos del Fisio-->
						<th style="text-align: center;">Nombre</th>
						<th style="text-align: center;">Dias</th>	
						
						<!--Datos del Paciente-->
						<th style="text-align: center;">Cupo</th>
						<th style="text-align: center;">Horario</th>
						
						

						<!--Datos de la consulta -->
						<th style="text-align: center;">Seciones</th>
						<th style="text-align: center;">Edad</th>
						<th style="text-align: center;">Comentarios</th>
						<th style="text-align: center;">Estado</th>

						<th style="text-align: center;">OPCIONES</th>				 
										
					</thead>
					@foreach ($terapia as $con)
					<tr>
						
						<!--Datos del Fisio-->
						<td nowrap>{{ $con->nombreTerapia}}</td>
						<td nowrap style="text-transform:uppercase;" align="center">
							{{ $con->dia_1}}&nbsp;&nbsp; 
							{{ $con->dia_2}}&nbsp;&nbsp;
							{{ $con->dia_3}}&nbsp;&nbsp;
							{{ $con->dia_4}}&nbsp;&nbsp;
							{{ $con->dia_5}}</td>
						<td nowrap style="text-transform:uppercase;" align="center">{{ $con->cupo}}</td>
						
						<!--Datos del Paciente-->
						<td nowrap style="text-align: center;">{{ $con->hrInicio}} - {{ $con->hrFin}}</td>
						
						

						<!--Datos de la consulta -->
						<td align="center">{{ $con->secTer}}</td>
						<td align="center">{{ $con->edadInicio}}&nbsp;&nbsp;a&nbsp;&nbsp;{{$con->edadFin}}</td>
						<td nowrap style="text-transform:uppercase;">{{$con->comenTerapia}}</td>
						<td nowrap style="text-transform:uppercase;">{{$con->estadoTerapia}}</td>






						<td nowrap style="text-align: center;" >
							

							<a href="{{URL::action('TerapiaController@show',$con->idTerapia)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp; Ver</button></a>
							<a href="{{URL::action('TerapiaController@edit',$con->idTerapia)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$con->idTerapia}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp; Borrar</button></a>	
						

						</td>											
					</tr>
					@include('vconsulta.terapia.modal')
				
					@endforeach			
		
				</table>
			</div>
			{{$terapia->render()}}
			
		</div>
	</div>


@endsection