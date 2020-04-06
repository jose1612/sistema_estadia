@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Fisisoterapeuta: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$fisio->nombreF}}&nbsp;&nbsp;{{$fisio->apellido_paternoF}}&nbsp;&nbsp;
			{{$fisio->apellido_maternoF}}
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
					<label for="nombreF">Nombre (es)</label>
					<input 
						type="text" 
						name="nombreF" 
						required
						minlength="3" 
      					maxlength="20" 
						value="{{$fisio->nombreF}}" 
						class="form-control"
						style="text-transform:uppercase;" 
						placeholder="Nombre fisio . . .">	
				</div>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
				<div class="form-group">
					<label for="apellido_paternoF">Primer Apellido</label>
					<input 
						type="text" 
						name="apellido_paternoF" 
						required 
						minlength="3" 
      					maxlength="20" 
						value="{{$fisio->apellido_paternoF}}"  
						class="form-control" 
						style="text-transform:uppercase;"
						placeholder="Apellido Paterno . . ."
					>	
				</div>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
				<div class="form-group">
					<label for="apellido_maternoF">Segundo Apellido</label>
					<input 
						type="text" 
						name="apellido_maternoF" 
						required 
						minlength="3" 
      					maxlength="20" 
						value="{{$fisio->apellido_maternoF}}" 
						class="form-control" 
						style="text-transform:uppercase;"
						placeholder="Apellido Materno . . .">	
				</div>
			</div>

			<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
				<div class="form-group">
					<label for="sexoF">Sexo</label>
    				<select class="combobox form-control"name="sexoF">
    					@if ($fisio->sexoF=='Femenino')
      						<option value="Femenino" selected>Femenino</option>
      						<option value="Masculino">Masculino</option>
      					@else
      						<option value="Femenino">Masculino</option>
      						<option value="Masculino" selectec>Femenino</option>
      					@endif

    				</select>
  				</div>
  			</div>
     	</div>

		<div class="row">
			<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
				<label for="fecha_naciminetoF">Fecha de Nacimiento</label>
				<input 
					type="date" 
					name="fecha_naciminetoF" 
					required 
					value="{{$fisio->fecha_naciminetoF}}"
					class="form-control" 
					style="text-transform:uppercase;"
					placeholder="Ingreso...">			
			</div>
			<div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<label for="NSSF">NSS</label>
				<input 
					type="text" 
					name="NSSF" 
					
					minlength="11" 
      				maxlength="11"
					pattern="[0-9]+"
					value="{{$fisio->NSSF}}" 
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
					<label for="estadoF">Estado</label>
					<input 
						type="text" 
						name="estadoF"
						style="text-transform:uppercase;" 
						value="Activo" 
						class="form-control" 
						readonly="readonly">
				</div>
			</div>
		</div>

		<div class="row">
  			<div class="form-group col-lg-2 col-md-3 col-sm-2 col-xs-6">
				<label for="fecha_ingresoF">Ingreso</label>
				<input 
					type="date" 
					name="fecha_ingresoF" 
					required 
					value="{{$fisio->fecha_ingresoF}}"
					class="form-control" 
					style="text-transform:uppercase;"
					placeholder="Ingreso...">			
			</div>

			<div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<label for="cedulaF">Cédula</label>
				<input 
					type="text" 
					name="cedulaF"  
					minlength="8" 
      				maxlength="8"
					pattern="[0-9]+"
					value="{{$fisio->cedulaF}}" 
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
					<label for="calleF">Calle</label>
					<input 
						type="text" 
						name="calleF" 
						required 
						minlength="3" 
      					maxlength="20" 
						style="text-transform:uppercase;"
						value="{{$fisio->calleF}}"
						class="form-control" 
						placeholder="Calle . . .">	
				</div>
			</div>

			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
				<div class="form-group">
					<label for="numero_exteriorF">Ext.</label>
					<input 
						type="text" 
						name="numero_exteriorF" 
						required
						minlength="1" 
      					maxlength="4"
						pattern="[0-9]+"
						style="text-transform:uppercase;"
						value="{{$fisio->numero_exteriorF}}" 
						class="form-control" placeholder="N°">	
				</div>
			</div>

			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
				<div class="form-group">
					<label for="numero_interiorF">Int.</label>
					<input type="text" 
						name="numero_interiorF"  
						minlength="1" 
      					maxlength="4"
						pattern="[0-9]+"
						style="text-transform:uppercase;"
						value="{{$fisio->numero_interiorF}}" 
						class="form-control" 
						placeholder="N°">	
				</div>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<div class="form-group">
					<label for="coloniaF">Colonia</label>
					<input 
						type="text" 
						name="coloniaF"
						minlength="4" 
      					maxlength="20"
						style="text-transform:uppercase;"  
						required value="{{$fisio->coloniaF}}" 
						class="form-control" 
						placeholder="Col.">	
				</div>
			</div>

			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
				<div class="form-group">
					<label for="municipioF">Municipo</label>
					<input 
						type="text" 
						name="municipioF" 
						minlength="4" 
      					maxlength="20"
						style="text-transform:uppercase;"
						required 
						value="{{$fisio->municipioF}}" 
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
					<label for="telF">Teléfono</label>
					<input 
					type="number" 
					name="telefonoF" 
					required 
					minlength="10" 
      				maxlength="10"
      				pattern="[0-9]+"
					style="text-transform:uppercase;"
					value="{{$fisio->telefonoF}}" 
					class="form-control" 
					placeholder="Teléfono">	
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
				<div class="form-group">
					<label for="correoF">E-Mail</label>
					<input 
						type="email" 
						name="correoF"  
						minlength="15" 
      					maxlength="30"
						value="{{$fisio->correoF}}" 
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
					<label for="usuarioF">Usuario</label>
					<input 
						type="text" 
						name="usuarioF" 
						pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" 
						title=" mínimo 5 caracteres Valores de la  A a- Z z  y 0-9" 
						required 
						minlength="5" 
      					maxlength="10"
						value="{{$fisio->usuarioF}}" 
						class="form-control" 
						placeholder="Ejemplo123 . . .">	
				</div>
			</div>

			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
				<div class="form-group">
					<label for="contraseniaF">Contraseña</label>
					<input 
						type="password" 
						name="contraseniaF" 
						pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" 
						title="mínimo 5 caracteres Valores de la  A a- Z z  y 0-9" 
						required 
						minlength="5" 
      					maxlength="10"
      					value="{{$fisio->contraseniaF}}"
						class="form-control" 
						placeholder="Ejemplo123 . . .">	
				</div>
			</div>
			<body oncopy="return false" onpaste="return false">
			<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
				<div class="form-group">
					<label for="conf_contraseniaF">Conf. Contraseña</label>
					<input 
						type="password" 
						name="conf_contraseniaF" 
						pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*" 
						title="Valores de la  A a- Z z  y 0-9" 
						required 
						minlength="5" 
      					maxlength="10"
      					value="{{$fisio->conf_contraseniaF}}"
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
					<input type="file" name="imagenF"  class="form-control">	
					@if (($fisio->imagenF)!=" ")
						<img src="{{asset('imagenes/fisioterapeutas/'.$fisio->imagenF)}}" height="200" width="200">
					@endif
				</div>
			</div>
		</div>

	</div>
</div>

	
		<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<a href="{{url('registro/fisioterapeuta')}}"><button class="btn btn-danger" type="reset">Cancelar</button>	
        </div>

			
		{!!Form::close()!!}
		
		</div>

	</div>



@endsection