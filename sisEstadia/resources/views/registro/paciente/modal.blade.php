
<!-- Modal par aver al paciente con datos completos-->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="Inactivo" id="modal-ver-{{$pac->idPaciente}}">


	{{Form::Open(array('action'=>array('PacienteController@destroy',$pac->idPaciente),'method'=>'delete'))}}
	
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
							<label for="nombre">Nombre (es)</label>
								<input 
									disabled="disabled" 
									value="{{$pac->nombre}} {{$pac->apellido_paterno}} {{$pac->apellido_materno}}" 
									class="form-control" 
									style="text-transform:uppercase;"
								>	
						</div>

						<div class="form-group">
							<label for="sexo">Sexo</label>
		    				<select class="combobox form-control"name="sexo" disabled="disabled" >
		    					@if ($pac->sexo=='Femenino')
		      						<option value="Femenino" selected>Femenino</option>
		      						<option value="Masculino">MasculinoO</option>
		      					@else
		      						<option value="Femenino">Femenino</option>
		      						<option value="Masculino" selected>Masculino</option>
		      					@endif
		    				</select>
		  				</div>

		    				

		    				<label for="NSS">NSS</label>
								<input 
									disabled="disabled"
									value="{{$pac->NSS}}" 
									style="text-transform:uppercase;"
									class="form-control" 
									placeholder="Seguro Social"
								>			
		  	 	</div>

				<div class="row" >						
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-10 ">
						<div class="form-group">							
							<img src="{{asset('imagenes/pacientes/'.$pac->imagen)}}" class="img-responsive" height="170" width="150">								
						</div>
					</div>
				</div>

				

	    		<div class="row">
					<div class="col-lg-8 col-md-2 col-sm-2 col-xs-6">
						<div class="form-group">
							<P></P>
						<label>DIRECCIÓN</label>	
							<input 
								disabled="disabled" 
								style="text-transform:uppercase;"
								value="Calle {{ $pac->calle}} N° {{$pac->numero_exterior}} Col. {{$pac->colonia}}"
								class="form-control" 
							>	
						</div>
					</div>


					<div class="col-lg-3 col-md-2 col-sm-2 col-xs-6">
						<div class="form-group">
							<P></P>
							<label for="municipio">Municipio</label>
							<input 
								disabled="disabled"
								style="text-transform:uppercase;"
								value="{{$pac->municipio}}" 
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
								value="{{$pac->telefono}}" 
								class="form-control" 
							>	
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-8">
						<div class="form-group">
							<label for="correo">E-Mail</label>
							<input 
								disabled="disabled"
								value="{{$pac->correo}}" 
								class="form-control" 
								placeholder="correo@ejemplo.com">	
						</div>
					</div>					
				</div>



    			<div class="row">		
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
						<div class="form-group">
							<label for="usuario">Usuario</label>
								<input 
									disabled="disabled"
									value="{{$pac->usuario}}" 
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
									value="{{$pac->contrasenia}}"
									class="form-control" 
								>	
						</div>
					</div>
				</div>

				<div class="modal-footer">
						<a href='registro/paciente'></a><button type="button" class="btn btn-success" data-dismiss="modal">Regresar</button>		
				</div>
			</div>
		</div>
		{{Form::Close()}}
	</div>
</div>


<!-- Modal par eliminar al pacientes-->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="Inactivo" id="modal-delete-{{$pac->idPaciente}}">

	{{Form::Open(array('action'=>array('PacienteController@destroy',$pac->idPaciente), 'method'=>'delete'))}}
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
				</button>
				<h4 class="modal-title">Eliminar Paciente
				</h4>
			</div>

			<div class="modal-body">
				<h3 style="text-transform:uppercase;">
				<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;{{$pac->nombre}} {{$pac->apellido_paterno}} {{$pac->apellido_materno}} 
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

<!--Modal de consulta-->
<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="Inactivo" id="modal-consulta-{{$pac->idPaciente}}">


{!!Form::open(array('url'=>'vconsulta/consulta','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			


{{Form::token()}}

	
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
				</button>
				<h3 class="modal-title" style="text-transform:uppercase;">
					<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;NUEVA CONSULTA 						
				</h3>

				<h6 style="text-transform:uppercase;">
					&nbsp;&nbsp;&nbsp;<strong>Paciente:</strong>{{$pac->idPaciente}}<br>
					&nbsp;&nbsp;&nbsp;<strong>Nombre:</strong>{{$pac->nombre}} {{$pac->apellido_paterno}} {{$pac->apellido_materno}}<br>
					&nbsp;&nbsp;&nbsp;<strong>Dirección:</strong>Calle {{ $pac->calle}} N° {{$pac->numero_exterior}} Col. {{$pac->colonia}}<br>			
					&nbsp;&nbsp;&nbsp;<strong>Tel:</strong>{{$pac->telefono}}<br>
					&nbsp;&nbsp;&nbsp;<strong>Sexo:</strong>{{$pac->sexo}}
				<h6 >				
			</div>
			<div class="modal-body">
				
				<div class="row">	
									

					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="edad">Edad</label>
							<input 
								type="text" 
								name="edad" 
								required
								length="1" 
      							maxlength="3"
								pattern="[0-9]+" 
								value="{{old('edad')}}" 
								class="form-control"
								placeholder="Años">	
						</div>
					</div>	


					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="peso">Peso</label>
							<input 
								type="text" 
								name="peso" 
								required
								length="1" 
      							maxlength="3"
								pattern="[0-9]+" 
								value="{{old('peso')}}" 
								class="form-control"
								placeholder="Kg.">	
						</div>
					</div>	

					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="estatura">Estatura</label>
							<input 
								type="text" 
								name="estatura" 
								required
								length="1" 
      							maxlength="3"
								pattern="[0-9]+" 
								value="{{old('estatura')}}" 
								class="form-control"
								placeholder="cm.">	
						</div>
					</div>

					
					<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
									<label for="idFisioterapeuta">fisio</label>
									<input 
										type="text" 
										required 
										name="idFisioterapeuta" 
										value="{{old('idFisioterapeuta')}}" 
										class="form-control"
										placeholder="idFisioterapeuta">	
							</div>
					</div>
				</div>	

				<div class="row">		
					<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="diagnostico">Diagnóstico</label>
							<input
								rows="3"
								type="text" 
								name="diagnostico" 
								required
								length="1" 
      							maxlength="100"
								
								value="{{old('diagnostico')}}" 
								class="form-control"
								placeholder="Escribir el diagnostico del paciente...">
							</input>		
						</div>
					</div>		
				</div>	
				<div class="row">
						<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="recomendacion">Recomendaciones</label>
							<input 
							 	rows="3"
								type="text" 
								name="recomendacion" 
								required
								length="3" 
      							maxlength="100"
								
								value="{{old('recomendacion')}}" 
								class="form-control"
								placeholder="Recomendaciones">								
							</input>	
						</div>
					</div>
				</div>	
				<div class="form-group" style="visibility:hidden">
							<input 
								type="text" 
								name="idPaciente" 
								required								
								value="{{$pac->idPaciente}}" 
								class="form-control"
								placeholder="Años">	
					</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
				<!--<button type="submit" class="btn btn-primary">Confirmar</button>-->
				
			</div>
		</div>
	</div>
	{!!Form::close()!!}
	
</div>
<!--

<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="Inactivo" id="modal-consulta-{{$pac->idPaciente}}">

	{{Form::Open(array('action'=>array('PacienteController@destroy',$pac->idPaciente), 'method'=>'delete'))}}
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
				</button>
				<h3 class="modal-title" style="text-transform:uppercase;">
					<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;NUEVA CONSULTA 						
				</h3>

				<h6 style="text-transform:uppercase;">
					&nbsp;&nbsp;&nbsp;<strong>Paciente:</strong>{{$pac->idPaciente}}<br>
					&nbsp;&nbsp;&nbsp;<strong>Nombre:</strong>{{$pac->nombre}} {{$pac->apellido_paterno}} {{$pac->apellido_materno}}<br>
					&nbsp;&nbsp;&nbsp;<strong>Dirección:</strong>Calle {{ $pac->calle}} N° {{$pac->numero_exterior}} Col. {{$pac->colonia}}<br>			
					&nbsp;&nbsp;&nbsp;<strong>Tel:</strong>{{$pac->telefono}}<br>
					&nbsp;&nbsp;&nbsp;<strong>Sexo:</strong>{{$pac->sexo}}
				<h6 >				
			</div>
			<div class="modal-body">
				<div class="row">		
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="edad">Edad</label>
							<input 
								type="text" 
								name="Edad" 
								requiredmin
								length="1" 
      							maxlength="3"
								pattern="[0-9]+" 
								value="{{old('Edad')}}" 
								class="form-control"
								placeholder="Años">	
						</div>
					</div>	


					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="peso">Peso</label>
							<input 
								type="text" 
								name="peso" 
								requiredmin
								length="1" 
      							maxlength="3"
								pattern="[0-9]+" 
								value="{{old('Edad')}}" 
								class="form-control"
								placeholder="Kg.">	
						</div>
					</div>	

					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="estatura">Estatura</label>
							<input 
								type="text" 
								name="estatura" 
								requiredmin
								length="1" 
      							maxlength="3"
								pattern="[0-9]+" 
								value="{{old('Edad')}}" 
								class="form-control"
								placeholder="cm.">	
						</div>
					</div>
				</div>	

				<div class="row">		
					<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="diagnostico">Diagnóstico</label>
							<textarea
								rows="3"
								type="textarea" 
								name="diagnostico" 
								requiredmin
								length="1" 
      							maxlength="100"
								pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*"
								value="{{old('diagnostico')}}" 
								class="form-control"
								placeholder="Escribir el diagnostico del paciente...">
							</textarea>		
						</div>
					</div>		
				</div>	
				<div class="row">
						<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="recomendacion">Recomendaciones</label>
							<textarea 
							 	rows="3"
								type="textarea" 
								name="recomendacion" 
								requiredmin
								length="1" 
      							maxlength="100"
								pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9]*"
								value="{{old('recomendacion')}}" 
								class="form-control"
								placeholder="Recomendaciones">								
							</textarea>	
						</div>
					</div>
				</div>	
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								
			</div>
		</div>
	</div>
	{{Form::Close()}}	
</div>



-->
