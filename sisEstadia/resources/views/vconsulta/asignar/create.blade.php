@extends('layouts.admin')

@section('contenido')


	<div class="row">		
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			 <h1> Nueva Terapia</h1>
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

{!!Form::open(array('url'=>'vconsulta/asignar','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
{{Form::token()}}
	<!--DATOS DEL PACIENTE-->	
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
									ap2="{{$pac->apellido_materno}}" value="{{$pac->idPaciente}}">{{$pac->completo}}</option>
							@endforeach
						</SELECT>
					</div>				 			
		    	</div>
		    	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">		
					<div class="form-group">
						<h2>Fisioterapeuta</h2>					
						<SELECT name="pidFisioterapeuta" id="pidFisioterapeuta" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
							@foreach($fisios as $fis)
								<option style="text-transform:uppercase;" 
									pidf="{{$fis->idFisioterapeuta}}" 
									nombre-fi="{{$fis->nombreF}}" 
									value="{{$fis->idFisioterapeuta}}">{{$fis->fisiocompleto}}
								</option>
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

	<!--DATOS DEL PACIENTE-->	
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
  				 
	    		<div class="col-lg-11 col-md-4 col-sm-4 col-xs-6">
	    			<div class="form-group">

	    				<a href="{{url('vconsulta/asignar/create')}}"></a><button type="button" id="btn_cancelar" class="btn-info">Cancelar</button>    				
	    			</div>    			
	    		</div>
	    		
    		</div>  
  			
    	</div>    		
    </div>
<!--------------------------DATOS DE LA TERAPIA -------------------------------------------------------->
		<div class="row" align="center"><!-- Habre row de cabecera-->
			<div class="panel panel-primary" style="max-width: 108rem;"> <!-- habre panel de cabecera-->
				<div class="panel-body" > <!-- habre body-->
					<div class="form-group col-lg-12 col-md-3 col-sm-2 col-xs-12">	
						<dir class="row" >
							<div class="col-lg-12 col-md-8 col-sm-6 col-xs-12">		
								<div class="panel panel-primary" style="max-width: 108rem;">
									<div class="panel-body" >
										<div class="form-group">
											<div class="col-lg-10 col-md-8 col-sm-6 col-xs-12">	
												<label>Terapia</label>					
												<SELECT name="pidTerapia" id="pidTerapia" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
												@foreach($terapias as $ter)
													<option style="text-transform:uppercase;" 
														idpX="{{$ter->idTerapia}}"
														nombre-pcX="{{$ter->nombreTerapia}}"
														seX="{{$ter->comenTerapia}}"
														sePX="{{$ter->secTer}}"														
														value="{{$ter->idTerapia}}">
														Clave: {{$ter->idTerapia}}
														Nombre: {{$ter->nombreTerapia}}
														Horario: {{$ter->dia_1}}&nbsp;&nbsp;{{$ter->dia_2}}&nbsp;&nbsp;{{$ter->dia_3}}&nbsp;&nbsp;{{$ter->dia_4}}&nbsp;&nbsp;{{$ter->dia_5}}&nbsp;&nbsp;{{$ter->hrInicio}} - {{$ter->hrFin}} 
														N° Seciones:{{$ter->secTer}}

													</option>
												@endforeach
												</SELECT>
											</div>		
											<div class="col-lg-1 col-md-4 col-sm-4 col-xs-6">
												<div class="form-group">
													<input 
														type='text'  
														name="idTerapia" 
														id="idTerapia"
														value="{{old('idTerapia')}}" 
														class="form-control"
														readonly="readonly" 
														style="text-transform:uppercase;"
														placeholder="id">	
												</div>
											</div>		
										</div>	
										<div class="row">
											<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="nombreTerapia">Terapia</label>
														<input 
															type="text" 
															name="nombreTerapia" 
															id="nombreTerapia"
															value="{{old('nombreTerapia')}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															placeholder="Tipo de Lesion . . .">	
													</div>
												</div>

												<div class="col-lg-8 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="comenTerapia">Comentarios</label>
														<input 
															type="text" 
															name="comenTerapia" 
															id="comenTerapia"
															value="{{old('comenTerapia')}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															placeholder="Tipo de Lesion . . .">	
													</div>
												</div>
												<div class="col-lg-1 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="secTer">Seciones</label>
														<input 
															type="number" 
															name="secTer" 
															id="secTer"
															value="{{old('secTer')}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															placeholder="N°">	
													</div>
												</div>													
											</div>										
										</div>						
									</div>															    		
						    	</div>			
					    	</div>							
						</dir>



<!----------------------------------------------------------------------------------------------------->


						<div class="row">
								<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
								<div class="form-group">
									<label for="tratamineto">Recomendaciones</label>
									<TEXTAREA 
									 	
									 	cols="20" 
									 	rows="5"
										type="text" 
										name="comentarios_secion" 
										id="comentarios_secion"
										required
										
										length="1" 
		      							maxlength="500"
										value="{{old('comentarios_secion')}}" 
										class="form-control"
										placeholder="Escribir la recomendación al paciente..."
										></TEXTAREA>							
									
								</div>
							</div>
						</div>	
						<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
						<!-----------------------DTOS DE TERAPIA--------------------------------------->	
						
					<!-------------------------------TERMINA LESION---------------------------------->
						<dir class="row" >
							<div  class="col-lg-12 col-md-8 col-sm-6 col-xs-12">	
								
								<div class="panel panel-primary" style="max-width: 108rem;">
									<div class="panel-body" >
										<div class="form-group">
											<div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">	
												<label for="pidcEstudio">Ejercicio</label>					
												<SELECT   name="pidcEstudio" id="pidcEstudio" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
												@foreach($ejercicios as $est)
													<option style="text-transform:uppercase;" 
														pide="{{$est->idEjercicio}}" 
														noestudio="{{$est->nombreE}}" 
														comen="{{$est->descripcion}}" 
														comen2="{{$est->repeticiones}}" 
														value="{{$est->idEjercicio}}">{{$est->nombreE}}</option>

												@endforeach
												</SELECT>
											</div>		
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
												<div class="form-group">
													<input 
														type="text" 
														name="idEjercicio" 
														id="idEjercicio"
														value="{{old('idEjercicio')}}" 
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
														<label for="nombre">Ejercio</label>
														<input 
															type="text" 
															name="nombreE" 
															id="nombreE"
															value="{{old('nombreE')}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															>	
													</div>
												</div>

												<div class="col-lg-1 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="repeticiones">Repeticiones</label>
														<input 
															type="text" 
															name="repeticiones" 
															id="repeticiones"
															value="{{old('repeticiones')}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															>	
													</div>
												</div>

												<div class="col-lg-6 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="descripcion">Comentarios</label>
														<input 
															type="text" 
															name="descripcion" 
															id="descripcion"
															value="{{old('descripcion')}}" 
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
												<!-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++  -->
						<dir class="row" >
							<div  class="col-lg-12 col-md-8 col-sm-6 col-xs-12">	
								
								<div class="panel panel-primary" style="max-width: 108rem;">
									<div class="panel-body" >
										<div class="form-group">
											<div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">	
												<label for="pidcEstudio3">Materliaes</label>					
												<SELECT   name="pidcEstudio3" id="pidcEstudio3" class="form-control selectpicker" data-live-search="true" style="text-transform:uppercase;">
												@foreach($materiales as $est)
													<option style="text-transform:uppercase;" pide3="{{$est->idcMateial}}" noestudio3="{{$est->nombreM}}" comen3="{{$est->tipo_materia}}" comen4="{{$est->cantidad}}" comen5="{{$est->comentarios}}" value="{{$est->idcMateial}}">{{$est->nombreM}}</option>
												@endforeach
												</SELECT>
											</div>		
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
												<div class="form-group">
													<input 
														type=HIDDEN 
														name="idcMateial" 
														id="idcMateial"
														value="{{old('idcMateial')}}" 
														class="form-control"
														readonly="readonly" 
														style="text-transform:uppercase;"
														placeholder="Tipo de Lesion . . .">	
												</div>
											</div>		
										</div>	
										<div class="row">
											<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
												<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="nombreM">Material</label>
														<input 
															type="text" 
															name="nombreM" 
															id="nombreM"
															value="{{old('nombreM')}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															>	
													</div>
												</div>

												<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="tipo_materia">Tipo</label>
														<input 
															type="text" 
															name="tipo_materia" 
															id="tipo_materia"
															value="{{old('tipo_materia')}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															>	
													</div>
												</div>

												<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="cantidad">Cantidad</label>
														<input 
															type="text" 
															name="cantidad" 
															id="cantidad"
															value="{{old('cantidad')}}" 
															class="form-control"
															readonly="readonly" 
															style="text-transform:uppercase;"
															placeholder="Comentaros . . .">	
													</div>
												</div>
												<div class="col-lg-6 col-md-4 col-sm-4 col-xs-6">
													<div class="form-group">
														<label for="comentarios">Comentarios</label>
														<input 
															type="text" 
															name="comentarios" 
															id="comentarios"
															value="{{old('comentarios')}}" 
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
  	

<!--------------------------------------------------------------------------------------------------->
	
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

			pidTerapia.addEventListener("change", ()=>{
			let opt = pidTerapia.options[pidTerapia.selectedIndex];

			let idpX = opt.getAttribute("idpX");
			idTerapia.value = idpX;

			let sex2 = opt.getAttribute("seX");
			comenTerapia.value = sex2;

			let elnombreX = opt.getAttribute("nombre-pcX");
			nombreTerapia.value = elnombreX;

			let appXA = opt.getAttribute("sePX");
			secTer.value = appXA;


			})  





			pidcEstudio.addEventListener("change", ()=>{
			let opt = pidcEstudio.options[pidcEstudio.selectedIndex];
			let pide = opt.getAttribute("pide");
			idEjercicio.value = pide;
			let noestudio = opt.getAttribute("noestudio");
			nombreE.value = noestudio;
			let comen = opt.getAttribute("comen");
			descripcion.value = comen;
			let comen2 = opt.getAttribute("comen2");
			repeticiones.value = comen2;
			}) 

			pidcEstudio3.addEventListener("change", ()=>{
			let opt = pidcEstudio3.options[pidcEstudio3.selectedIndex];
			let pide3 = opt.getAttribute("pide3");
			idcMateial.value = pide3;
			let noestudio3 = opt.getAttribute("noestudio3");
			nombreM.value = noestudio3;
			let comen3 = opt.getAttribute("comen3");
			tipo_materia.value = comen3;
			let comen4 = opt.getAttribute("comen4");
			cantidad.value = comen4;
			let comen5 = opt.getAttribute("comen5");
			comentarios.value = comen5;

			})

			pidFisioterapeuta.addEventListener("change", ()=>{
			let opt = pidFisioterapeuta.options[pidFisioterapeuta.selectedIndex];
			let df = opt.getAttribute("pidf");
			idFisioterapeuta.value = df;
			}) 




			$(document).ready(function(){
				$('#btn_crear').click(function(){
					crear();
				});
			});



			function crear()
			{
				nombre=$("#nombre").val();

				if(nombre!="")
				{
					$("#btn_crear").hide();
					$("#btn_cancelar").show();
					document.getElementById("pidPaciente").disabled = true;
  					document.getElementById("seciones").disabled = false;
  					document.getElementById("restarseciones").disabled = false;
  					document.getElementById("asistencia").disabled = false;
  					document.getElementById("estado_terapia").disabled = false;

				}else
				{
					$("#btn_crear").show();
					$("#btn_cancelar").hide();
				}
			
			}

		</script>

	@endpush

@endsection
