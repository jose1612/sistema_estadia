@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Fisisoterapeuta: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$fisio->nombre}}&nbsp;&nbsp;{{$fisio->apellido_paterno}}&nbsp;&nbsp;
			{{$fisio->apellido_materno}}
			</h3>
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

		

		{!!Form::model($fisio,['method'=>'PATCH','route'=>['fisioterapeuta.update',$fisio->idFisioterapeuta],'files'=>'true'])!!}
		
			{{Form::token()}}

			<!--NOMBRE COMPLETO-->	
		<div class="row">
			<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<h3>Datos del fisioterapeuta</h3>
				<p></p>		
        	</div>
    	</div>	
		<div class="row">		
			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
				<div class="form-group">
					<label for="nombre">Nombre (es)</label>
					<input 
						type="text" 
						name="nombre" 
						required
						minlength="3" 
      					maxlength="20" 
						value="{{$fisio->nombre}}" 
						class="form-control"
						style="text-transform:uppercase;" 
						placeholder="Nombre fisio . . .">	
				</div>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
				<div class="form-group">
					<label for="apellido_paterno">Primer Apellido</label>
					<input 
						type="text" 
						name="apellido_paterno" 
						required 
						minlength="3" 
      					maxlength="20" 
						value="{{$fisio->apellido_paterno}}"  
						class="form-control" 
						style="text-transform:uppercase;"
						placeholder="Apellido Paterno . . ."
					>	
				</div>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
				<div class="form-group">
					<label for="apellido_materno">Segundo Apellido</label>
					<input 
						type="text" 
						name="apellido_materno" 
						required 
						minlength="3" 
      					maxlength="20" 
						value="{{$fisio->apellido_materno}}" 
						class="form-control" 
						style="text-transform:uppercase;"
						placeholder="Apellido Materno . . .">	
				</div>
			</div>

			<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
				<div class="form-group">
					<label for="sexo">Sexo</label>
    				<select class="combobox form-control"name="sexo">
    					@if ($fisio->sexo=='Femenino')
      						<option value="Femenino" selected>Femenino</option>
      						<option value="Masculino">MasculinoO</option>
      					@else
      						<option value="Femenino">Femenino</option>
      						<option value="Masculino" selectec>MasculinoO</option>
      					@endif

    				</select>
  				</div>
  			</div>
     	</div>

		<div class="row">
			<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
				<label for="fecha_nacimineto">Fecha de Nacimiento</label>
				<input 
					type="date" 
					name="fecha_nacimineto" 
					required 
					value="{{$fisio->fecha_nacimineto}}"
					class="form-control" 
					style="text-transform:uppercase;"
					placeholder="Ingreso...">			
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<label for="NSS">NSS</label>
				<input 
					type="text" 
					name="NSS" 
					
					minlength="11" 
      				maxlength="11"
					pattern="[0-9]+"
					value="{{$fisio->NSS}}" 
					style="text-transform:uppercase;"
					class="form-control" 
					placeholder="N° Seguro Social">			
			</div>

			<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
				<label>Profesión</label>
				<select 
					name ="idEspecialidad" 
					style="text-transform:uppercase;" 
					required 
					class="form-control">
					@foreach ($especialidades as $esp)	
						@if ($esp->idEspecialidad==$fisio->idEspecialidad)
						<option value="{{$esp->idEspecialidad}}" selected>{{$esp->nombre}}</option>
						@else
						<option value="{{$esp->idEspecialidad}}">{{$esp->nombre}}</option>
						@endif
					@endforeach				
				</select>
							
			</div>

			<div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<div class="form-group">
					<label for="estado">Estado</label>
					<input 
						type="text" 
						name="estado"
						style="text-transform:uppercase;" 
						value="Activo" 
						class="form-control" 
						readonly="readonly">
				</div>
			</div>
		</div>

		<div class="row">
  			<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
				<label for="fecha_ingreso">Ingreso</label>
				<input 
					type="date" 
					name="fecha_ingreso" 
					required 
					value="{{$fisio->fecha_ingreso}}"
					class="form-control" 
					style="text-transform:uppercase;"
					placeholder="Ingreso...">			
			</div>

			<div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<label for="cedula">Cédula</label>
				<input 
					type="text" 
					name="cedula"  
					minlength="8" 
      				maxlength="8"
					pattern="[0-9]+"
					value="{{$fisio->cedula}}" 
					style="text-transform:uppercase;"
					class="form-control" 
					placeholder="Cédula">			
			</div>

		</div>



   	 <!--Dirección-->
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3>Dirección</h3>
				<p></p>		
        	</div>
    	</div>
        <div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<div class="form-group">
					<label for="calle">Calle</label>
					<input 
						type="text" 
						name="calle" 
						required 
						minlength="3" 
      					maxlength="20" 
						style="text-transform:uppercase;"
						value="{{$fisio->calle}}"
						class="form-control" 
						placeholder="Calle . . .">	
				</div>
			</div>

			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
				<div class="form-group">
					<label for="numero_exterior">Ext.</label>
					<input 
						type="text" 
						name="numero_exterior" 
						required
						minlength="1" 
      					maxlength="4"
						pattern="[0-9]+"
						style="text-transform:uppercase;"
						value="{{$fisio->numero_exterior}}" 
						class="form-control" placeholder="N°">	
				</div>
			</div>

			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
				<div class="form-group">
					<label for="numero_interior">Int.</label>
					<input type="text" 
						name="numero_interior"  
						minlength="1" 
      					maxlength="4"
						pattern="[0-9]+"
						style="text-transform:uppercase;"
						value="{{$fisio->numero_interior}}" 
						class="form-control" 
						placeholder="N°">	
				</div>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<div class="form-group">
					<label for="colonia">Colonia</label>
					<input 
						type="text" 
						name="colonia"
						minlength="4" 
      					maxlength="20"
						style="text-transform:uppercase;"  
						required value="{{$fisio->colonia}}" 
						class="form-control" 
						placeholder="Col.">	
				</div>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<div class="form-group">
					<label for="municipio">Municipo</label>
					<input 
						type="text" 
						name="municipio" 
						minlength="4" 
      					maxlength="20"
						style="text-transform:uppercase;"
						required 
						value="{{$fisio->municipio}}" 
						class="form-control" 
						placeholder="Municipio. . .">	
				</div>
			</div>
		</div>


		<div class="row">
			<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3>Datos de Contacto</h3>
				<p></p>		
        	</div>
    	</div>	
		<div class="row">		
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="form-group">
					<label for="tel">Teléfono</label>
					<input 
					type="telefono" 
					name="telefono" 
					required 
					minlength="10" 
      				maxlength="10"
      				pattern="[0-9]+"
					style="text-transform:uppercase;"
					value="{{$fisio->telefono}}" 
					class="form-control" 
					placeholder="Teléfono">	
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
				<div class="form-group">
					<label for="correo">E-Mail</label>
					<input 
						type="email" 
						name="correo"  
						minlength="15" 
      					maxlength="30"
						value="{{$fisio->correo}}" 
						class="form-control" 
						placeholder="correo@ejemplo.com">	
				</div>
			</div>
			
		</div>

		<div class="row">
			<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3>Datos de Conexión</h3>
				<p></p>		
        	</div>
    	</div>	
		<div class="row">		
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
				<div class="form-group">
					<label for="usuario">Usuario</label>
					<input 
						type="text" 
						name="usuario" 
						pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" 
						title=" mínimo 5 caracteres Valores de la  A a- Z z  y 0-9" 
						required 
						minlength="5" 
      					maxlength="10"
						value="{{$fisio->usuario}}" 
						class="form-control" 
						placeholder="Ejemplo123 . . .">	
				</div>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
				<div class="form-group">
					<label for="contrasenia">Contraseña</label>
					<input 
						type="password" 
						name="contrasenia" 
						pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" 
						title="mínimo 5 caracteres Valores de la  A a- Z z  y 0-9" 
						required 
						minlength="5" 
      					maxlength="10"
      					value="{{$fisio->contrasenia}}"
						class="form-control" 
						placeholder="Ejemplo123 . . .">	
				</div>
			</div>
			<body oncopy="return false" onpaste="return false">
			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
				<div class="form-group">
					<label for="conf_contrasenia">Conf. Contraseña</label>
					<input 
						type="password" 
						name="conf_contrasenia" 
						pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" 
						title="Valores de la  A a- Z z  y 0-9" 
						required 
						minlength="5" 
      					maxlength="10"
      					value="{{$fisio->conf_contrasenia}}"
						class="form-control" 
						placeholder="Ejemplo123 . . .">	
				</div>
			</div>
		</div>
		<div class="row">
			<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3>Foto</h3>
				<p></p>		
        	</div>
    	</div>	
		<div class="row">		
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
				<div class="form-group">
					<input type="file" name="imagen"  class="form-control">	
					@if (($fisio->imagen)!=" ")
						<img src="{{asset('imagenes/fisioterapeutas/'.$fisio->imagen)}}" height="200" width="200">
					@endif
				</div>
			</div>
		</div>

	</div>
</div>

	
		<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>	
        </div>

			
		{!!Form::close()!!}
		
		</div>

	</div>



@endsection