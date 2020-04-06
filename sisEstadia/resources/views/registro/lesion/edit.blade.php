@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Etidar Lesión:  {{ $lesion->tipo_lesion}}  </h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::model($lesion,['method'=>'PATCH','route'=>['lesion.update',$lesion->idcLesion]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="tipo_lesion">Nombre</label>
				<input type="text" name="tipo_lesion" class="form-control" value="{{$lesion->tipo_lesion}}" placeholder="Nombre...">
			</div>

			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control" value="{{$lesion->descripcion}}" placeholder="Repeticiones...">
			</div>

			<div class="form-group">
				<label for="causa">Causa</label>
				<input type="text" name="causa" class="form-control" value="{{$lesion->causa}}" placeholder="Causa...">
			</div>

			<div class="form-group">
				<label for="prevencion">Prevencion</label>
				<input type="text" name="prevencion" class="form-control" value="{{$lesion->prevencion}}" placeholder="Repeticiones...">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{url('registro/lesion')}}"><button class="btn btn-danger">Cancelar</button>
			
			</div>
		{!!Form::close()!!}
		
		</div>

	</div>



@endsection