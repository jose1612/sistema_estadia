@extends('layouts.admin')

@section('contenido')

	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Ver  Consulta:{{$consulta->idConsulta}}</h3>
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

{!!Form::model($consulta,['method'=>'GET','route'=>['consulta.show',$consulta->idconsulta],'files'=>'true'])!!}
		{{Form::token()}}



    	<!--*********************DATOS DEL FISIO**************************************************-->
    	<div class="row" align="center">
    		@foreach($fisios as $fis)
    		@if ($fis->idFisioterapeuta==$consulta->idFisioterapeuta)
	    		<div class="panel panel-success" style="max-width: 108rem;">
	    			<div align="left" class="panel-heading"><h4>Fisioterapeuta</h4></div>
	    			<div class="panel-body" >
	    				<div class="row">
	    					<div class="col-lg-12 col-md-3 col-sm-2 col-xs-12">
	    						<div class="row">
		    						<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">									
												<label for="cedul">Cedula</label>
												<input 
													disabled
													required
													type="text" 
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$fis->cedulaF}}">									
		    							</div>
		    							<!--
		    							<div class="form-group">									
												
												<input 
													disabled
													required
													name="idFisioterapeuta" 
													id="idFisioterapeuta"
													type="text"  
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$fis->idFisioterapeuta}}">									
		    							</div>
		    						-->
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
		    								<label for="nombre">Nombre</label>	
		    								<P>							
												<input 
													type="text"
													disabled 
													required
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$fis->nombreF}}">

		    							</div>
	    							</div>
	    							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">
		    								<label for="apellido_paterno">Primer Apellido</label>	
		    								<P>							
												<input 
													disabled
													required
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$fis->apellido_paternoF}}">

		    							</div>
	    							</div>
	    							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">
		    								<label for="apellido_materno">Segundo Apellido</label>	
		    								<P>							
												<input 
													type="text"
													required
													disabled 
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$fis->apellido_maternoF}}">

		    							</div>
	    							</div>
	    							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">
		    								<label for="tel">Teléfono</label>	
		    								<P>							
												<input 
													type="text"
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
    		@if ($pac->idPaciente==$consulta->idPaciente)
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
													required
													type="text" 
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$pac->idPaciente}}">									
		    							</div>
		    							<!--
		    							<div class="form-group">									
												
												<input 
													disabled
													required
													name="idPaciente" 
													id="idPaciente"
													type="text" 
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$pac->idPaciente}}">									
		    							</div>
		    						-->
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


    	<!--*************************DATOS DE LA CONSULTA**********************************************-->
    	<div class="row" align="center">
	    	<div class="panel panel-warning" style="max-width: 108rem;">
	    		<div align="left" class="panel-heading"><h4>Consulta</h4></div>
	    		<div class="panel-body" >
	    			<div class="form-group col-lg-12 col-md-3 col-sm-2 col-xs-12">				
						<div class="row">
							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="edad">Edad</label>
										<input
											disabled  
											type="number" 
											name="edad"
											id="edad"
											required
											length="1" 
			      							maxlength="3"
			      							
											value="{{$consulta->edad}}" 
											class="form-control"
											placeholder="Años">	
								</div>
							</div>

							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="peso">Peso</label>
									<input 
										type="number" 
										name="peso" 
										id="peso"
										required
										length="1" 
		      							maxlength="3"
		      							disabled
										pattern="[0-9]+" 
										
										value="{{$consulta->peso}}"  
										class="form-control"
										placeholder="Kg.">	
								</div>
							</div>	

							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="estatura">Estatura</label>
									<input 
										type="number" 
										name="estatura"
										id="estatura" 
										required
										length="1" 
		      							maxlength="3"
										pattern="[0-9]+" 
										disabled
										
										value="{{$consulta->estatura}}"  
										class="form-control"
										placeholder="cm.">	
								</div>
							</div>

							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="temperatura">Temperatura</label>
									<input 
										type="number" 
										name="temperatura" 
										id="temperatura"
										disabled
										required
										value="{{$consulta->temperatura}}" 
										class="form-control"
										placeholder="C°.">	
								</div>
							</div>

							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">		
								<div class="form-group">
									<label for="alergias">Alergia</label>
									<input 
										type="text" s
										name="alergias" 
										id="alergias"
										disabled
										required
										value="{{$consulta->alergias}}" 
										class="form-control"
										placeholder="Alergias...">			
								</div>				
					    	</div>

						</div>	
						<dir class="row" >
							<div class="col-lg-12 col-md-8 col-sm-6 col-xs-12">		
								<div class="panel panel-primary" style="max-width: 108rem;">
									<div class="panel-body" >
										<div class="form-group">
											<div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">	
												<label for="pidcLesion">Lesion</label>					
												<SELECT disabled name="pidcLesion" id="pidcLesion" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
												@foreach($lesiones as $les)
												@if ($les->idcLesion==$consulta->idcLesion)
													<option style="text-transform:uppercase;" pidl="{{$les->idcLesion}}" no="{{$les->tipo_lesion}}" des="{{$les->descripcion}}" value="{{$les->idcLesion}}" selected>{{$les->tipo_lesion}}</option>
												@else
													<option style="text-transform:uppercase;" pidl="{{$les->idcLesion}}" no="{{$les->tipo_lesion}}" des="{{$les->descripcion}}" value="{{$les->idcLesion}}" selected>{{$les->tipo_lesion}}</option>
													@endif

												@endforeach
												</SELECT>
											</div>


											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
												<div class="form-group">

													<input 
														type=HIDDEN
														name="idcLesion" 
														id="idcLesion"
														disabled
														required
														value="{{$les->idcLesion}}" 
														class="form-control"
														readonly="readonly" 
														style="text-transform:uppercase;"
														placeholder="Tipo de Lesion . . .">	
												</div>
											</div>		
										</div>	
										<div class="row">
											<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="tipo_lesion">Tipo de Lesión</label>
														<input 
															type="text" 
															name="tipo_lesion" 
															id="tipo_lesion"
															required
															disabled
															value="{{$les->tipo_lesion}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															placeholder="Tipo de Lesion . . .">	
													</div>
												</div>

												<div class="col-lg-8 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="descripcion">Descripción</label>
														<input 
															type="text" 
															name="descripcion" 
															id="descripcion"
															required
															disabled
															value="{{$les->descripcion}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															placeholder="Tipo de Lesion . . .">	
													</div>
												</div>												
											</div>										
										</div>						
									</div>															    		
						    	</div>			
					    	</div>							
						</dir>


						<div class="row" align="center">		
							<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="comenTerapia">Recomendaciones</label>
									<TEXTAREA
										cols="20"
										rows="5"
										type="text"
										required 
										name="comenTerapia" 
										id="comenTerapia"
										required
										disabled
										length="1" 
		      							maxlength="500"
										
										value="{{$consulta->comenTerapia}}" 
										class="form-control"
										placeholder="Escribir el diagnostico del paciente...">{{$consulta->comenTerapia}}</TEXTAREA>
											
								</div>
							</div>		
						</div>

						<div class="row">
								<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="tratamineto">Recomendaciones</label>
									<TEXTAREA 
									 	
									 	cols="20" 
									 	rows="5"
									 	disabled
										type="text" 
										name="tratamineto" 
										id="tratamineto"
										required
										
										length="1" 
		      							maxlength="500"
										value="{{$consulta->tratamineto}}"  
										class="form-control"
										placeholder="Escribir la recomendación al paciente..."
										>{{$consulta->tratamineto}}</TEXTAREA>							
									
								</div>
							</div>
						</div>	
						<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
						<dir class="row" >
							<div class="col-lg-12 col-md-8 col-sm-6 col-xs-12">	
								
								<div class="panel panel-primary" style="max-width: 108rem;">
									<div class="panel-body" >
										<div class="form-group">
											<div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">	
												<label for="pidcEstudio">Estudios</label>					
												<SELECT disabled name="pidcEstudio" id="pidcEstudio" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
												@foreach($estudios as $est)
												@if ($est->idcEstudio==$consulta->idcEstudio)
													<option style="text-transform:uppercase;" pide="{{$est->idcEstudio}}" noestudio="{{$est->tipo_estudio}}" comen="{{$est->cometarios}}" value="{{$est->idcEstudio}}"selected>{{$est->tipo_estudio}}</option>
												@else
													<option style="text-transform:uppercase;" pide="{{$est->idcEstudio}}" noestudio="{{$est->tipo_estudio}}" comen="{{$est->cometarios}}" value="{{$est->idcEstudio}}" selected>{{$est->tipo_estudio}}</option>
												@endif

												@endforeach
												</SELECT>
											</div>	

											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
												<div class="form-group">
													<input 
														type=HIDDEN
														required
														disabled
														name="idcEstudio" 
														id="idcEstudio"
														value="{{$est->idcEstudio}}" 
														class="form-control"
														readonly="readonly" 
														style="text-transform:uppercase;"
														placeholder="id . . .">	
															
												</div>
											</div>		
										</div>	
										<div class="row">
											<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="tipo_lesion">Tipo de Estudio</label>
														<input 
															type="text" 
															name="tipo_estudio" 
															id="tipo_estudio"
															required
															disabled
															value="{{$est->tipo_estudio}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															placeholder="Tipo de Estudio . . .">	
													</div>
												</div>

												<div class="col-lg-8 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="cometarios">Comentarios</label>
														<input 
															type="text" 
															name="cometarios" 
															id="cometarios"
															required
															disabled
															value="{{$est->cometarios}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															placeholder="Comentaros . . .">	
													</div>
												</div>												
											</div>										
										</div>						
									</div>															    		
						    	</div>			
					    	</div>							
						</dir>
						<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->								
					</div>
				</div>
			</div>	    				
	    				
	    		</div>	    			
	    	</div>  		
    	</div>

    	<!--*************************TERMINA DATOS DE CONSULTA*****************************************-->

	
		<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
		<div class="form-group">	
			<a href="vconsulta/consulta">
						<button class="btn btn-info">
							<span class="fa fa-chevron-circle-right"></span>
							&nbsp;&nbsp;Regresar
						</button>
					</a>	
        </div>

			
		{!!Form::close()!!}
		
		</div>

	</div>

@push ('scrips')
<script>
	pidcLesion.addEventListener("change", ()=>{
	let opt = pidcLesion.options[pidcLesion.selectedIndex];
	let idles = opt.getAttribute("pidl");
	idcLesion.value = idles;
	let eltipo = opt.getAttribute("no");
	tipo_lesion.value = eltipo;
	let lades = opt.getAttribute("des");
	descripcion.value = lades;
	})
	
	pidcEstudio.addEventListener("change", ()=>{
	let opt = pidcEstudio.options[pidcEstudio.selectedIndex];
	let pide = opt.getAttribute("pide");
	idcEstudio.value = pide;
	let noestudio = opt.getAttribute("noestudio");
	tipo_estudio.value = noestudio;
	let comen = opt.getAttribute("comen");
	cometarios.value = comen;
	})
</script>

@endpush

@endsection

