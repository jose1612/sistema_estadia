@extends('layouts.admin')

@section('contenido')
	

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Asignar de Terapias<a href="asignar/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('vconsulta.asignar.search')	
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

						<!--Datos de la terapia -->
						<th style="text-align: center;">fecha de asignación</th>
						<th style="text-align: center;">Paciente</th>
						<th style="text-align: center;">Fisioterapeuta</th>
						<th style="text-align: center;">Terapia</th>
						<th style="text-align: center;">Horario</th>
						<th style="text-align: center;">Asistencias</th>
						
						
						<th style="text-align: center;">Comentarios</th>
						<th style="text-align: center;">Estado</th>

						<th style="text-align: center;">Opciones</th>				 
										
					</thead>

					@foreach ($asignar as $ter)
					<tr align="center">
						<!--Datos de la consulta -->
						<td nowrap style="text-transform:uppercase;">{{ $ter->fecha_creada}}</td>
						<td nowrap style="text-transform:uppercase;">{{ $ter->num_pac}} {{ $ter->nom_pac}} {{ $ter->pat_pac}}</td>
						<td nowrap style="text-transform:uppercase;">{{ $ter->id_fisio}} {{ $ter->nom_fis}} {{ $ter->pat_fis}}</td>

						<td nowrap style="text-transform:uppercase;">{{ $ter->clave_ter}} {{ $ter->nom_ter}}</td>

						<td nowrap style="text-transform:uppercase;">{{$ter->lun}}&nbsp;&nbsp;{{$ter->mar}}&nbsp;&nbsp;{{$ter->mie}}&nbsp;&nbsp;{{$ter->jue}}&nbsp;&nbsp;{{$ter->vie}}&nbsp;&nbsp;{{$ter->i_ter}} - {{$ter->f_ter}} </td>

						<td nowrap style="text-transform:uppercase;">
							{{ $ter->seciones}} /  {{ $ter->se_ter}} 
							<form  align="left" name="formulario" method="post" action="http://pagina.com/send.php">
								<meter min="0" max="{{$ter->se_ter}}" 
						        	   low="10" high="20"
						          	   optimum="{{$ter->se_ter}}" value={{$ter->seciones}}>
							</form>

						</td>

						<td nowrap style="text-transform:uppercase;">{{ $ter->comentarios_secion}}</td>

						<td nowrap style="text-transform:uppercase;">{{ $ter->est_ter}}</td>

						<td nowrap style="text-align: center;" >
							

							<a href="{{URL::action('AsignarController@edit',$ter->idConsulta)}}"><button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button></a>
							<a href="{{URL::action('AsignarController@show',$ter->idConsulta)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp; Ver</button></a>
						</td>											
					</tr>
					@include('vconsulta.asignar.modal')
				
					@endforeach			
				</table>
			</div>
			{{$asignar->render()}}
		</div>
	</div>
@endsection