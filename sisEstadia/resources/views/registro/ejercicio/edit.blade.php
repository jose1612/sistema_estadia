@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Etidar Ejercicio: {{ $ejercicio->nombre}}</h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::model($ejercicio,['method'=>'PATCH','route'=>['ejercicio.update',$ejercicio->idEjercicio]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombreE">Nombre</label>
				<input type="text" name="nombreE" class="form-control" value="{{$ejercicio->nombreE}}" placeholder="Nombre...">

			</div>

			<div class="form-group">
				<label for="repeticiones">Repeticiones</label>
				<input type="number" name="repeticiones" class="form-control" value="{{$ejercicio->repeticiones}}" placeholder="Repeticiones...">
			</div>

			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" class="form-control" value="{{$ejercicio->descripcion}}" placeholder="Descripción...">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{url('registro/ejercicio')}}"><button  class="btn btn-danger">Cancelar</button>
			
			</div>
		{!!Form::close()!!}
		
		</div>

	</div>



@endsection