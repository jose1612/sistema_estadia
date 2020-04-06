
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="Inactivo" id="modal-ver-{{$fis->idFisioterapeuta}}">
	{{Form::Open(array('action'=>array('FisioterapeutaController@destroy',$fis->idFisioterapeuta), 'method'=>'delete'))}}
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
				</button>
				<h4 class="modal-title"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;Datos Completos</h4>				
			</div>			
		

			<div class="modal-body">
				<div class="col-lg-6 col-md-4 col-sm-5 col-xs-6">
					<div class="form-group">
						<label for="nombre">Nombre(es)</label>
						<input 
							disabled="disabled" 
							value="{{$fis->nombreF}} {{$fis->apellido_paternoF}} {{$fis->apellido_maternoF}}" 
							class="form-control" 
							style="text-transform:uppercase;"
						>					
					</div>	

					<div class="form-group">
						<label for="sexo">Sexo</label>
						<select class="combobox form-control"name="sexo" disabled="disabled">
							@if ($fis->sexoF=='Femenino')
			      				<option value="Femenino" selected>Femenino</option>
			      				<option value="Masculino">Masculino</option>
			      			@else
			      				<option value="Femenino">Masculino</option>
			      				<option value="Masculino" selected>Femenino</option>
			      			@endif						
						</select>					
					</div>

						<label for="NSS">NSS</label>
							<input 
								disabled="disabled"
								value="{{$fis->NSSF}}" 
								style="text-transform:uppercase;"
								class="form-control" 
								placeholder="Seguro Social"
							>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-10">
						<div class="form-group">
							<img src="{{asset('imagenes/fisioterapeutas/'.$fis->imagenF)}}" class="img-responsive" height="170" width="150">						
						</div>					
					</div>				
				</div>

				<div class="row">
					<div class="col-lg-8 col-md-2 col-sm-2 col-xs-6">
						<div class="form-group">
							<p></p>
							<label>DIRECIÓN</label>
							<input 
								disabled="disabled" 
								style="text-transform:uppercase;"
								value="Calle:{{ $fis->calleF}} N°:{{$fis->numero_exteriorF}} Col. {{$fis->coloniaF}}"
								class="form-control"
							>
						</div>					
					</div>

					<div class="col-lg-3 col-md-2 col-sm-2 col-xs-6">
						<div class="form-group">
							<p></p>
							<label for="municipio">Municipio</label>
							<input 
								disabled="disabled"
								style="text-transform:uppercase;"
								value="{{$fis->municipioF}}" 
								class="form-control"
							>						
						</div>					
					</div>

				</div>

				<div class="row">

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="form-group">
							<label for="tel">Teléfono</label>
							<input 
								disabled="disabled"
								style="text-transform:uppercase;"
								value="{{$fis->telefonoF}}" 
								class="form-control"
							>						
						</div>					
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
						<div class="form-group">
							<label for="correo">E-Mail</label>
							<input 
								disabled="disabled"
								value="{{$fis->correoF}}" 
								class="form-control" 
								placeholder="correo@ejemplo.com"
							>													
						</div>					
					</div>	
				</div>

				<div class="row">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
						<div class="form-group">
							<label for="usuario">Usuario</label>
							<input
								disabled="disabled"
								value="{{$fis->usuarioF}}" 
								class="form-control"
							>						
						</div>					
					</div>	

					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
						<div class="form-group">
							<label for="contrasenia">Contraseña</label>
							<input 	
								disabled="disabled"
								type="password" 
								value="{{$fis->contraseniaF}}"
								class="form-control"
							>						
						</div>					
					</div>			
				</div>

				<div class="modal-footer">
					<a href='registro/fisioterapeuta'></a><button type="button" class="btn btn-success" data-dismiss="modal">Regresar</button>		
				</div>
			</div>
		</div>
	{{Form::Close()}}	
	</div>
</div>


<!-- Modal par eliminar al pacientes-->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="Inactivo" id="modal-delete-{{$fis->idFisioterapeuta}}">

	{{Form::Open(array('action'=>array('FisioterapeutaController@destroy',$fis->idFisioterapeuta), 'method'=>'delete'))}}
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
				</button>
				<h4 class="modal-title">Eliminar Fisioterapeuta
				</h4>
			</div>

			<div class="modal-body">
				<h3 style="text-transform:uppercase;">
				<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;{{$fis->nombreF}} {{$fis->apellido_paternoF}} {{$fis->apellido_maternoF}} 
				</h3>				
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
				
			</div>
		</div>
	</div>
	{{Form::Close()}}	
</div>