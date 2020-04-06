@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Turno</h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif

		{!!Form::open(array('url'=>'registro/horario','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="turno">Turno</label>
				<input type="text" 
					   name="turno" 
					   required
					   minlength="8" 
      				   maxlength="11"
      				   value="{{old('turno')}}" 
					   class="form-control" 
					   placeholder="Nombre...">	
	
			</div>

			<div class="form-group">
				<label for="inicio">Inicio</label>
				<input type="time" 
						name="inicio" 
						required	
						value="{{old('inicio')}}" 					 
						class="form-control" 
						placeholder="Inicio...">			
			</div>

			<div class="form-group">
				<label for="fin">Fin</label>
				<input type="time"
					   name="fin" 
					   required	
						value="{{old('fin')}}"
					   class="form-control" 
					   placeholder="fin...">			
			</div>

			<div class="form-group">
				<label for="cupo">Cupo</label>
				<input type="number" 
					   name="cupo" 
					   required	
						value="{{old('cupo')}}"
					   class="form-control" 
					   placeholder="Cupo...">			
			</div>
			
			
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>			
			</div>
		{!!Form::close()!!}
		</div>
	</div>
@endsection