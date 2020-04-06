@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Etidar Especialidad: {{$especialidad->nombre}}</h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::model($especialidad,['method'=>'PATCH','route'=>['especialidad.update',$especialidad->idEspecialidad]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$especialidad->nombre}}" placeholder="Nombre...">
			</div>


			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{url('registro/especialidad')}}"><button class="btn btn-danger" type="reset">Cancelar</button>			
			</div>
		{!!Form::close()!!}		
		</div>
	</div>
@endsection