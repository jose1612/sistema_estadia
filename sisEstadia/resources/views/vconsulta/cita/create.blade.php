@extends('layouts.admin')

@section('contenido')
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>

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

{!!Form::open(array('url'=>'vconsulta/cita','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}

	<!--NOMBRE COMPLETO-->	
	<div class="row">
		<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">		
					<div class="form-group">
						<h2>Paciente</h2>					
						<SELECT name="pidPaciente" id="pidPaciente" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
							@foreach($pacientes as $pac)
								<option style="text-transform:uppercase;" idp="{{$pac->idPaciente}}" nombre-pc="{{$pac->nombre}}" se="{{$pac->sexo}}"ap="{{$pac->apellido_paterno}}" ap2="{{$pac->apellido_materno}}" value="{{$pac->idPaciente}}">{{$pac->completo}}</option>
							@endforeach
						</SELECT>
					</div>				 			
		    	</div>
		    	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">		
					<div class="form-group">
						<h2>Fisioterapeuta</h2>					
						<SELECT name="pidFisioterapeuta" id="pidFisioterapeuta" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
							@foreach($fisios as $fis)
								<option style="text-transform:uppercase;" pidf="{{$fis->idFisioterapeuta}}" nombre-fi="{{$fis->nombreF}}" value="{{$fis->idFisioterapeuta}}">{{$fis->fisiocompleto}}</option>
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
		    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-6">
		    		<div class="form-group">
		    			<button type="button" id="btn_crear" class="btn-primary">Crear</button>    				
		    		</div>    			
		    	</div>
			</div>			
		</div>       	
	</div>	

	<div class="row" align="center">
    	<div class="datos" style="max-width: 108rem;">
    		<div class="panel-body" >
    			
    			<div class="row" align="right">
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

		<div class="row" align="center"><!-- Habre row de cabecera-->
			<div class="panel panel-primary" style="max-width: 108rem;"> <!-- habre panel de cabecera-->
				<div class="panel-body" > <!-- habre body-->
					<div class="form-group col-lg-12 col-md-3 col-sm-2 col-xs-12">					
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
						<div class="row" align="center">
							<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
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
																							
													length="1" 
		      										maxlength="500"
													value="{{old('tratamineto')}}" 
													class="form-control"
													placeholder="Escribir la recomendación al paciente..."
												></TEXTAREA>							
									
										</div>
									</div>
								</div>	
								<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
									<div class="form-group">
										<label for="fecha_cita">Fecha Cita</label>
										<input
											align="center"
											type="date" 
											name="fecha_cita" 
											id="datepicker"
											required									
											value="{{old('fecha_cita')}}" 
											class="form-control">
												
									</div>
								</div>
								<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
									<div class="form-group">
										<label for="tratamineto">Hora</label>
										<input 
											value="8:00:00"
											type="time" 
											name="hora"											 
											id="hora"
											required
											max="20:00" 
											min="8:00" 
											step="30"										
											value="{{old('hora')}}" 
											class="form-control"
											>							
										
									</div>
								</div>
								<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
									<div class="form-group">
										<label for="estado">Estado de Cita</label>
										<input 
											type="text" 
											name="estado_cita" 
											id="estado_cita"
											required
											readonly="readonly"										
											value="Pendiente" 
											class="form-control"
											>							
										
									</div>
								</div>									
							</div>										
						</div>							
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
			let df = opt.getAttribute("pidf");
			idFisioterapeuta.value = df;
			}) 

			function crear()
			{
				nombre=$("#nombre").val();

				if(nombre!="")
				{
					$("#btn_crear").hide();
					$("#btn_cancelar").show();
					document.getElementById("pidPaciente").disabled = true;
					document.getElementById("edad").disabled = false;
  					document.getElementById("peso").disabled = false;
  					document.getElementById("estatura").disabled = false;
  					document.getElementById("temperatura").disabled = false;
  					document.getElementById("alergias").disabled = false;

				}else
				{
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
				document.getElementById("pidPaciente").disabled = true;
				document.getElementById("edad").disabled = true;
				document.getElementById("peso").disabled = true;
				document.getElementById("estatura").disabled = true;
				document.getElementById("temperatura").disabled = true;
				document.getElementById("alergias").disabled = true;

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



	</script>

	@endpush
@endsection

<!-- MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null-->