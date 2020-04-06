@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h1><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;&nbsp;Editar terapia</h1>
			<p></p>
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

{!!Form::model($terapia,['method'=>'PATCH','route'=>['terapia.update',$terapia->idTerapia]])!!}
	{{Form::token()}}
		<!--NOMBRE COMPLETO-->	
		<div class="row">
			<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<h3>Dato de la Terapia</h3>
				<p></p>		
        	</div>
    	</div>	
		<div class="row">		
			<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
				<div class="form-group">
					<label for="nombreTerapia">Nombre</label>
					<input 
						type="text" 
						name="nombreTerapia" 
						required
						minlength="10" 
      					maxlength="50" 
						value="{{$terapia->nombreTerapia}}" 
						class="form-control"
						style="text-transform:uppercase;" 
						placeholder="Nombre de Terapia . . .">	
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<h3>Dias de Terapia</h3>
				<p></p>		
        	</div>


  		</div>
  	<!--DIAS DE LA SEMANA --->

  		<div class="row">
  			<dir class="col-lg-12 col-md-3 col-sm-2 col-xs-6">
	  			<div class="col-lg-2 col-md-3 col-sm-2 col-xs-6" align="center">
					<label for="hrInicio">Inicio de la Terapia</label>
					<input 
						type="time" 
						name="hrInicio" 
						required 
						value="{{$terapia->hrInicio}}"
						class="form-control" 
						>				
				</div>

				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" align="center">
					<label for="hrFin">Fin de la Terapia</label>
					<input 
						type="time" 
						name="hrFin" 
						required  
						value="{{$terapia->hrFin}}"
						class="form-control" 
					>			
				</div>

				<div class="col-lg-1 col-md-3 col-sm-2 col-xs-6" align="center">
					<label>Cupo</label>
					<input 
						type="number" 
						name ="cupo" 
						required  
						value="{{$terapia->cupo}}"
						class="form-control">							
				</div>

				<div class="col-lg-1 col-md-3 col-sm-2 col-xs-6" align="center">
					<label>Seciones</label>
					<input 
						type="number" 
						name ="secTer" 
						required  
						value="{{$terapia->secTer}}"
						class="form-control">							
				</div>

				<div class="col-lg-1 col-md-2 col-sm-2 col-xs-6">
					<div class="form-group" align="center">
						<label for="edadInicio">DE</label>
						<input 
							type="number" 
							name="edadInicio"
							required 
							value="{{$terapia->edadInicio}}" 
							style="text-transform:uppercase;" 
							class="form-control" 
							>
					</div>
				</div>
				<div class="col-lg-1 col-md-2 col-sm-2 col-xs-6">
					<div class="form-group" align="center">
						<label for="edadFin">A</label>
						<input 
							type="number" 
							name="edadFin"
							required 
							value="{{$terapia->edadFin}}" 
							style="text-transform:uppercase;" 
							class="form-control" 
							>
					</div>
				</div>
			</dir>
		</div>
		<div class="row" align="center">
    		<div class="col-lg-10 col-md-2 col-sm-2 col-xs-6">
				<div class="form-group" align="center">
					<label for="estadoTerapia">Dias de terapia</label>						
				</div>
			</div>
		</div>		
		<div class="row">
    		<div class="col-lg-10 col-md-2 col-sm-2 col-xs-6">
				<div class="form-group" align="center">
					<input type="checkbox" name="dia_1" value="L">
					<label>Lunes&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="checkbox" name="dia_2" value="M">
					<label>Martes&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="checkbox" name="dia_3" value="X">
					<label>Miercoles&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="checkbox" name="dia_4" value="J">
					<label>Jueves&nbsp;&nbsp;&nbsp;&nbsp;</label>
					<input type="checkbox" name="dia_5" value="V">
					<label>Vierenes</label>
												
				</div>
			</div>
		</div>

		<div class="row" align="center">

    		
    		<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
				<div class="form-group">
					<label for="estadoTerapia">Estado</label>
    				<select class="combobox form-control" value=""name="estadoTerapia">
    					<option >{{$terapia->estadoTerapia}}</option>
    					<option value="ACTIVA">ACTIVA</option>
      					<option value="PENDIENTE">PENDIENTE</option>
      					<option value="EN CURSO">EN CURSO</option>
      					<option value="FINALIZADA">FINALIZADA</option>
      					<option value="CANCELADA">CANCELADA</option>
    				</select>
  				</div>
  			</div>
		</div>	

		


		<div class="row">
			<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3>Comentarios de terapia</h3>
				<p></p>		
        	</div>
    	</div>
    	
		<div class="row" align="center">		
			<div class="col-lg-8 col-md-4 col-sm-4 col-xs-4" >
				<div class="form-group">
					<TEXTAREA
						cols="20"
						rows="5"
						type="text" 
						name="comenTerapia" 
						id="comenTerapia"
						required
						minlength="3" 
						maxlength="500"						
						value="{{$terapia->comenTerapia}}" 
						class="form-control"
						placeholder="Escribir Comentarios para terapia...">{{$terapia->comenTerapia}}</TEXTAREA>
				</div>
			</div>			
		</div>
		
<!--
		<div class="row">
			<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
				<h3>Video</h3>
				<p></p>		
        	</div>
    	</div>	
		<div class="row">		
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
				<div class="form-group">
					<input type="file" accept="image/*" capture="camera" name="imagen"  class="form-control">	
				</div>
			</div>
		</div>-->	

	</div>
</div>

	
		<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{url('vconsulta/terapia')}}"><button class="btn btn-danger">Cancelar</button>
			<a href=""><button class="btn btn-danger">Cancelar</button>	
        </div>

	{!!Form::close()!!}
		
@endsection
