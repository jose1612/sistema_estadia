@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Material:  {{ $material->nombre}}  </h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::model($material,['method'=>'PATCH','route'=>['material.update',$material->idcMateial]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombreM">Nombre</label>
				<input type="text" name="nombreM" class="form-control" value="{{$material->nombreM}}" placeholder="Nombre...">
			</div>

			<div class="form-group">
				<label for="tipo_materia">Tipo Material</label>
				<input type="text" name="tipo_materia" class="form-control" value="{{$material->tipo_materia}}" placeholder="Repeticiones...">
			</div>

			<div class="form-group">
				<label for="cantidad">Cantidad</label>
				<input type="number" name="cantidad" class="form-control" value="{{$material->cantidad}}" placeholder="Repeticiones...">
			</div>

			<div class="form-group">
				<label for="comentarios">Comentarios</label>
				<input type="text" name="comentarios" class="form-control" value="{{$material->comentarios}}" placeholder="Repeticiones...">
			</div>

			

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{url('registro/material')}}"><button class="btn btn-danger">Cancelar</button>
			
			</div>
		{!!Form::close()!!}
		
		</div>

	</div>



@endsection