@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Lesión</h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::open(array('url'=>'registro/lesion','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="tipo_lesion">Nombre</label>
				<input type="text" name="tipo_lesion" class="form-control" placeholder="Nombre...">			
			</div>
			
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">			
			</div>

			<div class="form-group">
				<label for="causa">Causa</label>
				<input type="text" name="causa" class="form-control" placeholder="Causa...">			
			</div>
			<div class="form-group">
				<label for="prevencion">Comentarios</label>
				<input type="text" name="prevencion" class="form-control" placeholder="Prevencion...">			
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>			
			</div>

		{!!Form::close()!!}
		</div>

	</div>



@endsection