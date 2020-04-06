@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Asignar Horario
			</h3>
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


		{!!Form::open(array('url'=>'registro/dia','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
		<div class="row">
			<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-6">
				<label>Fisioterapeuta</label>
				<select 
					name ="idFisioterapeuta" 
					id="idFisioterapeuta"
					style="text-transform:uppercase;" 
					required 
					value="{{old('idFisioterapeuta')}}" 
					class="form-control">
					@foreach ($fisios as $fis)	
						<option value="{{$fis->idFisioterapeuta}}">{{$fis->nombreF}}					
						</option>
					@endforeach				
				</select>							
			</div>
		</div>

	
		<div class="row">
			<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
						
					<label for="nombre">Dia</label>
					<select class="combobox form-control" value="{{old('nombre')}}"name="nombre">
    					<option value="LUNES">LUNES</option>
      					<option value="MARTES">MARTES</option>
      					<option value="MIERCOLES">MIERCOLES</option>
      					<option value="JUEVES">JUEVES</option>
      					<option value="VIERNES">VIERNES</option>
      					<option value="SABADO">SABADO</option>
    				</select>										
				
			</div>

			<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-6">
				<label>Horario</label>
				<select 
					name ="idHorario" 
					id="idHorario"
					style="text-transform:uppercase;" 
					required value="{{old('idHorario')}}" 
					class="form-control">
					@foreach ($horarios as $hor)	
						<option value="{{$hor->idHorario}}">{{$hor->turno}}					
						</option>
					@endforeach				
				</select>							
			</div>
		</div>	

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>			
			</div>
	
			
		{!!Form::close()!!}
		</div>
	</div>
@endsection




