@extends('layouts.admin')

@section('contenido')


	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			 <h1> Nueva Cita</h1>
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

{!!Form::open(array('url'=>'vconsulta/consulta','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}

	<!--DATOS DEL PACIEMTE-->	
	<div class="row">
		<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">		
					<div class="form-group">
						<h2>Paciente</h2>					
						<SELECT name="pidPaciente" id="pidPaciente" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
							@foreach($pacientes as $pac)
								<option style="text-transform:uppercase;" 
										idp="{{$pac->idPaciente}}" 
										nombre-pc="{{$pac->nombre}}" 
										se="{{$pac->sexo}}"
										ap="{{$pac->apellido_paterno}}" 
										ap2="{{$pac->apellido_materno}}" 
										edad_paci="{{$pac->edad}}" 
										value="{{$pac->idPaciente}}">{{$pac->completo}}</option>
							@endforeach
						</SELECT>
					</div>				 			
		    	</div>
			</div>			
		</div>       	
	</div>
	
<!-----------------------DATOS DE PACINET-------------------------------------------------------------->		
	<div class="row" align="center">
		<div class="panel panel-primary" style="max-width: 108rem;">
			    	<div class="datos" style="max-width: 108rem;">
    		<div class="panel-body" >    			
    			<div class="row" align="left">
    				<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
    					<label for="idPaciente">N° Paciente</label>
    					<input  
    							type="text"
    							name="idPaciente"
    							id="idPaciente"
								value="{{old('idPaciente')}}"
								class="form-control"
								readonly="readonly"
								style="text-transform:uppercase;" 
								placeholder="N° Paciente...">
    				</div>
    			</div>


    			<div class="row">		
			        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<p></p>
							<label for="nombre">Nombre (es)</label>
							<input 
								type="text" 
								name="nombre"
								id="nombre"  
								value="{{old('nombre')}}"
								class="form-control"
								readonly="readonly"
								style="text-transform:uppercase;" 
								placeholder="Nombre Paciente . . .">	
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<p></p>
							<label for="apellido_paterno">Primer Apellido</label>
							<input 
								type="text" 
								name="apellido_paterno" 
								id="apellido_paterno"
								value="{{old('apellido_paterno')}}"
								class="form-control" 
								readonly="readonly"
								style="text-transform:uppercase;"
								placeholder="Apellido Paterno . . ."
							>	
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<p></p>
							<label for="apellido_materno">Segundo Apellido</label>
							<input 
								type="text" 
								name="apellido_materno" 
								id="apellido_materno"
								value="{{old('apellido_materno')}}" 
								class="form-control"
								readonly="readonly" 
								style="text-transform:uppercase;"
								placeholder="Apellido Materno . . .">	
						</div>
					</div>
  				</div>

  				<!-- ************************************************************************************-->
    			<div class="row">		
			        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
						<div class="form-group">
							<label for="sexo">Sexo</label>
							<input 
								type="text" 
								name="sexo"
								id="sexo"  
								value="{{old('sexo')}}"
								class="form-control"
								readonly="readonly"
								style="text-transform:uppercase;" 
								placeholder="Sexo...">	
						</div>
					</div>
  				</div>	    		
    		</div>    			
    	</div> 

		</div>   		
    </div>
<!-----------------------DATOS DE PACINET-------------------------------------------------------------->
    <!-- Datos del fisioterapeuta -->
	<div class="row">
		<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
			<div class="row">
		    	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">		
					<div class="form-group">
						<h2>Fisioterapeuta</h2>					
						<SELECT name="pidFisioterapeuta" id="pidFisioterapeuta" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
							@foreach($fisios as $fis)
								<option style="text-transform:uppercase;" 
								pidf="{{$fis->idFisioterapeuta}}" 
								ce_fi="{{$fis->cedulaF}}"
								nombre-fi="{{$fis->nombreF}}"
								paterno-fi="{{$fis->apellido_paternoF}}"  
								materno-fi="{{$fis->apellido_maternoF}}" 
								sexo-fi="{{$fis->sexoF}}"
								value="{{$fis->idFisioterapeuta}}">{{$fis->fisiocompleto}}</option>
							@endforeach
						</SELECT>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
    						
    						<input  
    							type=HIDDEN
    							name="idFisioterapeuta"
    							id="idFisioterapeuta"
								value="{{old('idFisioterapeuta')}}"
								class="form-control"
								readonly="readonly"
								style="text-transform:uppercase;" 
								placeholder="N° Paciente...">
    					</div>		
					</div>				 			
		    	</div>
			</div>			
		</div>       	
	</div>

	<div class="row" align="center">
		<div class="panel panel-primary" style="max-width: 108rem;">
			<div class="datos" style="max-width: 108rem;">
    			<div class="panel-body" >    			
	    			<div class="row" align="left">
	    				<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
	    					<label for="cedulaF">Cédula</label>
	    					<input  
	    							type="text"
	    							name="cedulaF"
	    							id="cedulaF"
									value="{{old('cedulaF')}}"
									class="form-control"
									readonly="readonly"
									style="text-transform:uppercase;" 
									placeholder="Cédula">
	    				</div>
	    			</div>

	    			<div class="row">		
				        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="form-group">
								<p></p>
								<label for="nombreF">Nombre (es)</label>
								<input 
									type="text" 
									name="nombreF"
									id="nombreF"  
									value="{{old('nombreF')}}"
									class="form-control"
									readonly="readonly"
									style="text-transform:uppercase;" 
									placeholder="Nombre Fisioterapeuta . . .">	
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="form-group">
								<p></p>
								<label for="apellido_paternoF">Primer Apellido</label>
								<input 
									type="text" 
									name="apellido_paternoF" 
									id="apellido_paternoF"
									value="{{old('apellido_paternoF')}}"
									class="form-control" 
									readonly="readonly"
									style="text-transform:uppercase;"
									placeholder="Apellido Paterno . . ."
								>	
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="form-group">
								<p></p>
								<label for="apellido_maternoF">Segundo Apellido</label>
								<input 
									type="text" 
									name="apellido_maternoF" 
									id="apellido_maternoF"
									value="{{old('apellido_maternoF')}}" 
									class="form-control"
									readonly="readonly" 
									style="text-transform:uppercase;"
									placeholder="Apellido Materno . . .">	
							</div>
						</div>
	  				</div>

  				<!-- ************************************************************************************-->
	    			<div class="row">		
				        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
							<div class="form-group">
								<label for="sexoF">Sexo</label>
								<input 
									type="text" 
									name="sexoF"
									id="sexoF"  
									value="{{old('sexoF')}}"
									class="form-control"
									readonly="readonly"
									style="text-transform:uppercase;" 
									placeholder="Sexo...">	
							</div>
						</div>
	  				</div>
	  			</div>   			
    		</div>  
		</div> 
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		   	<div class="form-group">
				<!--<button type="button" id="btn_crear" class="btn-primary">Crear</button>-->
				<button id="btn_crear" class="btn btn-primary">Crear</button>			
				<button class="btn btn-danger" type="reset">Cancelar</button>    				
			</div>    			
		</div>	 		
    </div>

    			<!--  ++++++++++++++++++++++++++++ -->

		<!--  ++++++++++++++++++++++++++++ -->


		<div class="row" align="center"><!-- Habre row de cabecera-->
			<div class="panel panel-primary" style="max-width: 108rem;"> <!-- habre panel de cabecera-->
				<div class="panel-body" > <!-- habre body-->
					<div class="form-group col-lg-12 col-md-3 col-sm-2 col-xs-12">				
						<div class="row">
							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="edad">Edad</label>
										<input  
											type="number" 
											name="edad"
											id="edad"
											class="form-control"
											required
											length="1" 
			      							maxlength="3"
			      							disabled 
											value="{{old('edad')}}" 
											class="form-control"
											placeholder="Años">	
								</div>
							</div>

							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="peso">Peso</label>
									<input 
										type="number" 
										step="any" 
										name="peso" 
										id="peso"
										required
										
										
										disabled
										value="{{old('peso')}}" 
										class="form-control"
										placeholder="Kg.">	
								</div>
							</div>	

							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="estatura">Estatura</label>
									<input 
										type="number" 
										step="any"
										name="estatura"
										id="estatura" 
										required
										disabled
										value="{{old('estatura')}}" 
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
										step="any"
										disabled
										value="{{old('temperatura')}}" 
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
										value="{{old('alergias')}}" 
										class="form-control"
										placeholder="Alergias...">			
								</div>				
					    	</div>

						</div>

					<!-----------------------DTOS DE LESIÓN--------------------------------------->	
						<dir class="row" >
							<div class="col-lg-12 col-md-8 col-sm-6 col-xs-12">		
								<div class="panel panel-primary" style="max-width: 108rem;">
									<div class="panel-body" >
										<div class="form-group">
											<div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">	
												<label for="Lesion">Lesion</label>					
												<SELECT   name="pidcLesion" id="pidcLesion" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
												@foreach($lesiones as $les)
													<option style="text-transform:uppercase;" pidl="{{$les->idcLesion}}" no="{{$les->tipo_lesion}}" des="{{$les->descripcion}}" value="{{$les->idcLesion}}">{{$les->tipo_lesion}}</option>
												@endforeach
												</SELECT>
											</div>		
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
												<div class="form-group">
													<input 
														type=HIDDEN  
														name="idcLesion" 
														id="idcLesion"
														value="{{old('idcLesion')}}" 
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
															value="{{old('tipo_lesion')}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															placeholder="Tipo de Lesion . . .">	
													</div>
												</div>

												<div class="col-lg-8 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="descripción">Descripción</label>
														<input 
															type="text" 
															name="descripción" 
															id="descripción"
															value="{{old('descripción')}}" 
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
					<!-------------------------------TERMINA LESION---------------------------------->

						<div class="row" align="center">		
							<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="diagnostico">Diagnóstico</label>
									<TEXTAREA
										cols="20"
										rows="5"
										type="text" 
										name="diagnostico" 
										id="pdiagnostico"
										required
										length="1" 
		      							maxlength="500"
										
										value="{{old('diagnostico')}}" 
										class="form-control"
										placeholder="Escribir el diagnostico del paciente..."></TEXTAREA>
											
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
										type="text" 
										name="tratamineto" 
										id="tratamineto"
										required
										
										length="1" 
		      							maxlength="500"
										value="{{old('tratamineto')}}" 
										class="form-control"
										placeholder="Escribir la recomendación al paciente..."
										></TEXTAREA>							
									
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
												<SELECT   name="pidcEstudio" id="pidcEstudio" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
												@foreach($estudios as $est)
													<option style="text-transform:uppercase;" pide="{{$est->idcEstudio}}" noestudio="{{$est->tipo_estudio}}" comen="{{$est->cometarios}}" value="{{$est->idcEstudio}}">{{$est->tipo_estudio}}</option>
												@endforeach
												</SELECT>
											</div>		
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
												<div class="form-group">
													<input 
														type=HIDDEN  
														name="idcEstudio" 
														id="idcEstudio"
														value="{{old('idcEstudio')}}" 
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
														<label for="tipo_lesion">Tipo de Estudio</label>
														<input 
															type="text" 
															name="tipo_estudio" 
															id="tipo_estudio"
															value="{{old('tipo_estudio')}}" 
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
															value="{{old('cometarios')}}" 
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
				</div><!-- cierra-->
			</div>	<!-- Cierra body-->			
		</div><!-- cierra panel de cabecera-->		
  	

  	
	
		<!--<div class="panel panel-primary col-lg-6 col-md-6 col-sm-6 col-xs-12">...</div>	-->	
		<div class="form-group" id="guardar">
			<!--<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>-->	
			<button id="btn_guardar" class="btn btn-primary">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>	
				
        </div>
    
		{!!Form::close()!!}

	@push ('scrips')
		<script>			

            pidPaciente.addEventListener("change", ()=>{
			let opt = pidPaciente.options[pidPaciente.selectedIndex];
			let idp = opt.getAttribute("idp");
			idPaciente.value = idp;
			let elnombre = opt.getAttribute("nombre-pc");
			nombre.value = elnombre;
			let app = opt.getAttribute("ap");
			apellido_paterno.value = app;
			let app2 = opt.getAttribute("ap2");
			apellido_materno.value = app2;
			let sex = opt.getAttribute("se");
			sexo.value = sex;
			let paci_edad = opt.getAttribute("edad_paci");
			edad.value = paci_edad;

			
			})   

			pidcLesion.addEventListener("change", ()=>{
			let opt = pidcLesion.options[pidcLesion.selectedIndex];
			let idles = opt.getAttribute("pidl");
			idcLesion.value = idles;
			let eltipo = opt.getAttribute("no");
			tipo_lesion.value = eltipo;
			let lades = opt.getAttribute("des");
			descripción.value = lades;
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

			pidFisioterapeuta.addEventListener("change", ()=>{
			let opt = pidFisioterapeuta.options[pidFisioterapeuta.selectedIndex];
			let df2 = opt.getAttribute("pidf");
			idFisioterapeuta.value = df2;
			let df3 = opt.getAttribute("ce_fi");
			cedulaF.value = df3;
			let df4 = opt.getAttribute("nombre-fi");
			nombreF.value = df4;
			let df5 = opt.getAttribute("paterno-fi");
			apellido_paternoF.value = df5;
			let df6 = opt.getAttribute("materno-fi");
			apellido_maternoF.value = df6;
			let df7 = opt.getAttribute("sexo-fi");
			sexoF.value = df7;
			}) 




			$(document).ready(function(){
				$('#btn_crear').click(function(){
					crear();
				});
			});



			function crear()
			{
				x1=$("#nombre").val();
				x2=$("#nombreF").val();


				if(x1!="" && x2!="" )
				{
					$("#btn_crear").hide();
					$("#btn_cancelar").show();
					document.getElementById("pidPaciente").disabled = true;
					document.getElementById("edad").disabled = true;
  					document.getElementById("peso").disabled = false;
  					document.getElementById("estatura").disabled = false;
  					document.getElementById("temperatura").disabled = false;
  					document.getElementById("alergias").disabled = false;

				}else
				{
					document.getElementById("pidPaciente").disabled = false;
					document.getElementById("pidFisioterapeuta").disabled = false;
					$("#btn_crear").show();
					$("#btn_cancelar").hide();
				}
			
			}

			$(document).ready(function(){
				$('#btn_cancelar').click(function(){
					cancelar_consulta();
				});
			});

			function cancelar_consulta()
			{				

				$("#btn_crear").show();
				$("#btn_cancelar").hide();
				
				document.getElementById("edad").disabled = true;
				document.getElementById("peso").disabled = true;
				document.getElementById("estatura").disabled = true;
				document.getElementById("temperatura").disabled = true;
				document.getElementById("alergias").disabled = true;
				document.getElementById("pidPaciente").disabled = true;
				document.getElementById("pidFisioterapeuta").disabled = true;

			}

			$(document).ready(function(){
				$('#btn_guardar').click(function(){
					guardar();
				});
			});


			function guardar()
			{				

				document.getElementById("edad").disabled = false;
  				document.getElementById("peso").disabled = false;
  				document.getElementById("estatura").disabled = false;
  				document.getElementById("temperatura").disabled = false;
  				document.getElementById("alergias").disabled = false;


			}






/*
			var cont=0;

			function agregar()
			{
				lesi=$("#idcLesion option:selected").text();
				var fila='<tr class="selected" id="fila'+cont'"><td><button class="btn btn-warning" type="button" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idcLesion[]" value="'+idcLesion+'">'+tipo_lesion+'</td></tr>';
				cont++;
				$('#detalles').append(fila);
			}
			function eliminar(index)
			{
				$("#fila"+index).remove();
			}


			
			function crear()
			{
				idPaciente=$("#pidPaciente").val();
				NSS=$("#pNSS").val();
				nombre=$("#pnombre").val();
				apellido_paterno=$("#papellido_paterno").val();
				apellido_materno=$("#papellido_materno").val();
				sexo=$("#psexo").val();
				idProfesion=$("#pidProfesion option:selected").text();				

			}
			


			function limpiar()
			{
				$("#pidPaciente").val("");
				$("#pNSS").val("");
				$("#pnombre").val("");
				$("#papellido_paterno").val("");
				$("#papellido_materno").val("");
				$("#psexo").val("");
				$("#pidProfesion").val("");
			}


			
			function evaluar()
			{
				nombre=$("#pnombre").val();

				if(nombre!="")
				{

					$("#cancelar").show();
				}else
				{
					$("#crear").hide();
				}
			}
			*/		



		</script>

	@endpush

@endsection
