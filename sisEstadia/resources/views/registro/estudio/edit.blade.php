@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Etidar Estudio:  {{ $estudio->tipo_estudio}}  </h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::model($estudio,['method'=>'PATCH','route'=>['estudio.update',$estudio->idcEstudio]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="tipo_estudio">Nombre</label>
				<input type="text" name="tipo_estudio" class="form-control" value="{{$estudio->tipo_estudio}}" placeholder="Nombre...">
			</div>

			<div class="form-group">
				<label for="cometarios">Comentarios</label>
				<input type="text" name="cometarios" class="form-control" value="{{$estudio->cometarios}}" placeholder="Comentarios...">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{url('registro/estudio')}}"><button class="btn btn-danger">Cancelar</button>
			
			</div>
		{!!Form::close()!!}
		
		</div>

	</div>



@endsection