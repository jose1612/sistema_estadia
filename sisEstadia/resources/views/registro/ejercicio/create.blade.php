@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Ejercicio</h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::open(array('url'=>'registro/ejercicio','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombreE">Nombre</label>
				<input type="text" name="nombreE" class="form-control" placeholder="Nombre...">			
			</div>
			<div class="form-group">
				<label for="repeticiones">Repeticiones</label>
				<input type="number" name="repeticiones" min="1" max="20" class="form-control" placeholder="Repeticiones...">
			</div>

			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" min="10" max="250" class="form-control" placeholder="Descripción...">
			</div>


			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			
			</div>

		{!!Form::close()!!}
		</div>

	</div>



@endsection