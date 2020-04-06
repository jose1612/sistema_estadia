@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Etidar Horario: {{$horario->turno}}</h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::model($horario,['method'=>'PATCH','route'=>['horario.update',$horario->idHorario]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="turno">Turno</label>
				<input type="text" name="turno" class="form-control" value="{{$horario->turno}}" placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="inicio">Inicio</label>
				<input type="time" name="inicio" class="form-control" value="{{$horario->inicio}}" placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="fin">Fin</label>
				<input type="time" name="fin" class="form-control" value="{{$horario->fin}}" placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="cupo">Cupo</label>
				<input type="number" name="cupo" class="form-control" value="{{$horario->cupo}}" placeholder="Nombre...">
			</div>


			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>			
			</div>
		{!!Form::close()!!}		
		</div>
	</div>
@endsection