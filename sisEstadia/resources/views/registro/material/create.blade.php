@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Material</h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::open(array('url'=>'registro/material','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombreM">Nombre</label>
				<input type="text" name="nombreM" class="form-control" placeholder="Nombre...">			
			</div>
			
			<div class="form-group">
				<label for="tipo_materia">Tipo de Material</label>
				<input type="text" name="tipo_materia" class="form-control" placeholder="Tipo de MAterial...">			
			</div>

			<div class="form-group">
				<label for="cantidad">Cantidad</label>
				<input type="number" name="cantidad"  min="1" max="20" class="form-control" placeholder="Cantidad...">			
			</div>
			<div class="form-group">
				<label for="comentarios">Comentarios</label>
				<input type="text" name="comentarios" class="form-control" placeholder="Comentarios...">			
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>			
			</div>

		{!!Form::close()!!}
		</div>

	</div>



@endsection