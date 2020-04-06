@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			@foreach($terapias as $te)
    			@if ($te->idTerapia==$asignar->idTerapia)
					<h3>Terapia Asignada: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$asignar->idConsulta}}
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<h3>Avance del paciente {{$asignar->seciones}} / {{$te->secTer}} </h3>
								<form name="formcliente" method="post" action="pagina_destino.php">
									<label> 
									  <input type="checkbox" name="checkbox1" id="checkbox1" />
									Marcar asistencia</label>
								</form>
								<!------
								<label for="test">
									  <input type="checkbox" name="test" id="test">
									  Pincha aquí
								</label>
								-->
			        		</div>					
						</div>						
				@endif
			@endforeach

			@if (count($errors)>0)
				<div class="alert alert-danger">
					<ul>
					@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
					</ul>
				</div>
		    @endif
<!-------------------------------------------------------------------------------------------------------------->
		<div class="row">
			<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
				<form  align="left" name="formulario" method="post" action="http://pagina.com/send.php">
					<meter min="0" max="{{$te->secTer}}" 
			        	   low="10" high="20"
			          	 optimum="{{$te->secTer}}" value={{$asignar->seciones}}>
				</form>
				
			</div>
			
		</div>
		    

<!-------------------------------------------------------------------------------------------------------------->
        </div>

    </div>

{!!Form::model($asignar,['method'=>'PATCH','route'=>['asignar.update',$asignar->idConsulta],'files'=>'true'])!!}
	{{Form::token()}}
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
				<h3>DATOS DE LA TERAPIA</h3>
				<p></p>		
        	</div>
    	</div>
<!--*********************DATOS DEL FISIO**************************************************-->
    	<div class="row" align="center">
    		@foreach($fisios as $fis)
	    		@if ($fis->idFisioterapeuta==$asignar->idFisioterapeuta)
		    		<div class="panel panel-success" style="max-width: 108rem;">
		    			<div align="left" class="panel-heading"><h4>Fisioterapeuta</h4></div>
		    			<div class="panel-body" >
		    				<div class="row">
		    					<div class="col-lg-12 col-md-3 col-sm-2 col-xs-12">
		    						<div class="row">
			    						<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
			    							<div class="form-group">
			    								<!--<input 
			    									type="text" 
			    									name="idFisioterapeuta"  
			    									
			    									required 
			    									value="{{$fis->idFisioterapeuta}}" 
			    								>-->									
												<label for="cedulaF">Cédula</label>
													<input 
														disabled
														name="cedulaF" 
														required 
														type="text" 
														readonly="readonly"
														style="text-transform:uppercase;"
														value="{{$fis->cedulaF}}">									
			    							</div>
			    						<!--	<input type="text" name="idseciones" id="idseciones" value="{{$asignar->seciones}}">-->

			    						</div>
			    						
			    						<div align="right" class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
			    							<div class="form-group">									
													<img style="height: 100px; width: 100px; background-color: black; margin: 5px;" src="{{asset('imagenes/fisioterapeutas/'.$fis->imagenF)}}" alt="..." class="rounded-circle">									
			    							</div>
			    						</div>	
			    					

			    					</div>
		    					</div>	
		    				</div>

		    				<div class="row">
		    					<div class="col-lg-12 col-md-3 col-sm-2 col-xs-12">
		    						<div class="row">
			    						<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
			    							<div class="form-group">
			    								<label for="nombreF">Nombre</label>	
			    								<P>							
													<input 
														type="text"
														name="nombreF" 
														disabled 
														required
														readonly="readonly"
														style="text-transform:uppercase;"
														value="{{$fis->nombreF}}">

			    							</div>
		    							</div>
		    							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
			    							<div class="form-group">
			    								<label for="apellido_paternoF">Primer Apellido</label>	
			    								<P>							
													<input 
														type="text" 
														disabled
														name="apellido_paternoF"
														required 					
														readonly="readonly"
														style="text-transform:uppercase;"
														value="{{$fis->apellido_paternoF}}">

			    							</div>
		    							</div>
		    							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
			    							<div class="form-group">
			    								<label for="apellido_maternoF">Segundo Apellido</label>	
			    								<P>							
													<input 
														type="text"
														name="apellido_maternoF" 
														required 
														disabled 
														readonly="readonly"
														style="text-transform:uppercase;"
														value="{{$fis->apellido_maternoF}}">

			    							</div>
		    							</div>
		    							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
			    							<div class="form-group">
			    								<label for="telefonoF">Teléfono</label>	
			    								<P>							
													<input 
														type="text"
														name="telefonoF" 
														disabled 
														required 
														readonly="readonly"
														style="text-transform:uppercase;"
														value="{{$fis->telefonoF}}">

			    							</div>
		    							</div>
			    					</div>
		    					</div>	    					
		    				</div>
		    			</div>	    			
		    		</div>
	    		@endif
			@endforeach	    		
    	</div>
<!--***********************TERMINA DATOS DEL FISO*****************************************-->


<!--*************************DATOS DEL PACIENTE**********************************************-->
    	<div class="row" align="center">
    		@foreach($pacientes as $pac)
    		@if ($pac->idPaciente==$asignar->idPaciente)
	    		<div class="panel panel-primary" style="max-width: 108rem;">
	    			<div align="left" class="panel-heading"><h4>Paciente</h4></div>
	    			<div class="panel-body" >
	    				<div class="row">
	    					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    						<div class="row">
		    						<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">									
												<label for="idPaciente">N° Paciente</label>
												<input 
													disabled
													name="idPaciente"
													type="text" 
													required
													style="text-transform:uppercase;"
													value="{{$pac->idPaciente}}"
													>									
		    							</div>
		    						</div>
		    						
		    						<div align="right" class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">									
												<img style="height: 100px; width: 100px; background-color: black; margin: 5px;" src="{{asset('imagenes/pacientes/'.$pac->imagen)}}" alt="..." class="rounded-circle">									
		    							</div>
		    						</div>
		    						

		    					</div>
	    					</div>	
	    				</div>

	    				<div class="row">
	    					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    						<div class="row">
		    						<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">
		    								<label for="nombre">Nombre</label>	
		    								<P>							
												<input 
													type="text"
													disabled 
													required
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$pac->nombre}}">

		    							</div>
	    							</div>
	    							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">
		    								<label for="apellido_paterno">Primer Apellido</label>	
		    								<P>							
												<input 
													type="text" 
													disabled
													required
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$pac->apellido_paterno}}">

		    							</div>
	    							</div>
	    							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">
		    								<label for="apellido_materno">Segundo Apellido</label>	
		    								<P>							
												<input 
													type="text"
													disabled 
													required
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$pac->apellido_materno}}">

		    							</div>
	    							</div>
	    							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">
		    								<label for="tel">Telefono</label>	
		    								<P>							
												<input 
													type="text"
													disabled 
													required
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$pac->telefono}}">

		    							</div>
	    							</div>
		    					</div>
	    					</div>	    					
	    				</div>
	    			</div>	    			
	    		</div>
    		@endif
			@endforeach	    		
    	</div>
<!--************************TERMINA DATOS DEL PACIENET***********************************************-->


<!--************************DATOS DE LA TERAPIA ASIGNADA******************************************-->
    	<div class="row" align="center">
    		@foreach($terapias as $te)
    		@if ($te->idTerapia==$asignar->idTerapia)
	    		<div class="panel panel-danger" style="max-width: 108rem;">
	    			<div align="left" class="panel-heading"><h4>Terapia asignada</h4> 
	    				<div align="right"> <h4>Estado de terapia {{$te->estadoTerapia}}</h4></div>
	    			</div>
	    			<div class="panel-body" >
	    				<div class="row">
	    					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
	    						<div class="row">
		    						<div class="col-lg-1 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">									
												<label for="idTerapia">Id</label>
												<input 
													name="idTerapia" 
													id="idTerapia"
													disabled
													required
													class="form-control" 
													type="text" 
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$te->idTerapia}}" >							
		    							</div>
		    						</div>
		    						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
										<div class="form-group">
											<label for="nombreTerapia">Nombre</label>
											<input 
												type="text" 
												name="nombreTerapia" 
												id="nombreTerapia"
				      							disabled
				      							required												
												value="{{$te->nombreTerapia}}" 
												class="form-control" 
												
												>	
										</div>
									</div>	
									<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6" align="center">
										<div class="form-group">
											<label for="peso">Horario</label>
											<input 
												type="text" 
												class="form-control" 
				      							disabled
												pattern="[0-9]+" 												
												value="{{$te->hrInicio}}&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;{{$te->hrFin}}"  
												
												>	
										</div>
									</div>

									<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6" align="center">
										<div class="form-group" align="center">
											<label for="peso">Dias</label>
											<input 
											align="center"
												type="text" 
												class="form-control" 
												required									
				      							disabled											
												value="{{$te->dia_1}}{{$te->dia_2}}{{$te->dia_3}}{{$te->dia_4}}{{$te->dia_5}}"  
												
												>	
										</div>
									</div>	
									<div class="col-lg-1 col-md-4 col-sm-4 col-xs-6" align="center">
										<div class="form-group">
											<label for="secTer">Seciones</label>
											<input 
												type="secTer" 
												name="secTer" 
												id="secTer"
												class="form-control" 
				      							disabled
												pattern="[0-9]+" 							
												required		
												value="{{$te->secTer}}"  
												
												>	
										</div>
									</div>	
		    					</div>


								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
										<div class="form-group">
											<label for="comenTerapia">Recomendaciones</label>
											<TEXTAREA
												cols="20"
												rows="5"
												type="text"
												
												name="comenTerapia" 
												id="comenTerapia"
												required
												disabled
												length="1" 
				      							maxlength="500"
												
												value="{{$te->comenTerapia}}" 
												class="form-control"
												>{{$te->comenTerapia}}
											</TEXTAREA>									
										</div>
									</div>										
								</div>	
	    					</div>	
	    				</div>	    				
	    			</div>	    			
	    		</div>
    		@endif
			@endforeach	    		
    	</div>
<!--*********************TERMINA DATOS LA TERAPIA ASIGNADA******************************************-->


<!--************************DATOS PERSONALIZADOS DE TERAPIA****************************************-->
    	<div class="row" align="center">
	    		<div class="panel panel-info" style="max-width: 108rem;">
	    			<div align="left" class="panel-heading"><h4>Recomendaciones</h4></div>
	    			<div class="panel-body" >
	    				<div class="row">
	    					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
	    						<div class="row">
		    						<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">									
											<label for="comentarios_secion">Recomendaciones</label>
											<TEXTAREA									 	
											 	cols="20" 
											 	rows="5"
												type="text" 
												name="comentarios_secion" 
												id="comentarios_secion"
												required
												
												length="1" 
				      							maxlength="500"
												value="{{$asignar->comentarios_secion}}" 
												class="form-control"
												placeholder="Escribir la recomendación al paciente..."
												>{{$asignar->comentarios_secion}}</TEXTAREA>		
																		
		    							</div>
		    						</div>									
								</div>								
	    					</div>	
	    				</div>	    				
	    			</div>	    			
	    		</div>	    		
    	</div>
<!--************************TERMINA DATOS LA TERAPIA ASIGNADA**************************************-->
	<div class="form-group">
		<button id="btn_crear" class="btn btn-primary" type="submit">Guaradar</button>	
		<a href="vconsulta/asignar">
						<button class="btn btn-info">
							<span class="fa fa-chevron-circle-right"></span>
							&nbsp;&nbsp;Regresar
						</button>
					</a>			
 	</div>
	{!!Form::close()!!}

	@push ('scrips')
		<script>
			$("#btn_crear").hide();
			var checkbox = document.getElementById('checkbox1');
			checkbox.addEventListener("change", validaCheckbox, false);
			function validaCheckbox()
			{
			  var checked = checkbox.checked;
			  if(checked){
			    alert('Asistencia de Paciente');
			    $("#btn_crear").show();
			  }else
			  {
			  	$("#btn_crear").hide();

			  }
			}
		</script>
	@endpush

	
@endsection






