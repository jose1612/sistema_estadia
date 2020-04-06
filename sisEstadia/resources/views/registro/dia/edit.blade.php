@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Etidar Horariossss: {{$dia->nombre}}</h3>
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
		@endif
		</div>
	</div>
	

		{!!Form::model($dia,['method'=>'PATCH','route'=>['dia.update',$dia->idDia]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
			<div class="form-group">			
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$dia->nombre}}" placeholder="Nombre...">
			</div>
		</div>

		<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
			<div class="form-group">
				<label>Fisioterapeuta</label>
				<select 
					name ="idFisioterapeuta" 
					id="idFisioterapeuta"
					style="text-transform:uppercase;" 
					required 
					class="form-control">
					@foreach ($fisios as $fis)	
						@if ($fis->idFisioterapeuta==$dia->idFisioterapeuta)
						<option value="{{$fis->idFisioterapeuta}}" selected>{{$fis->nombreF}}</option>
						@else
						<option value="{{$fis->idFisioterapeuta}}">{{$fis->nombreF}}</option>
						@endif
					@endforeach				
				</select>
			</div>							
		</div>


		<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
			<div class="form-group">
				<label>Fisioterapeuta</label>
				<select 
					name ="idHorario" 
					id="idHorario"
					style="text-transform:uppercase;" 
					required 
					class="form-control">
					@foreach ($horarios as $horas)	
						@if ($horas->idHorario==$dia->idHorario)
						<option value="{{$horas->idHorario}}" selected>{{$horas->turno}}</option>
						@else
						<option value="{{$horas->idHorario}}">{{$horas->turno}}</option>
						@endif
					@endforeach				
				</select>
			</div>							
		</div>


	</div>
		
	

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
			<div class="form-group">				
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{url('registro/dia')}}"><button class="btn btn-danger">Cancelar</button>		
			</div>
		</div>
	</div>


		{!!Form::close()!!}		
	</div>
</div>	

	
@endsection