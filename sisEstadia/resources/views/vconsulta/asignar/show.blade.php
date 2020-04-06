@extends('layouts.admin')

@section('contenido')

 

	<div class="row">		
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			@foreach($terapia as $te)
    			@if ($te->idTerapia==$terapias->idTerapia)
					<h3>Terapia Asignada: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$terapias->idConsulta}}- 

						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<h3>Avance del paciente {{$terapias->seciones}} / {{$te->secTer}} </h3>
								<label for="test">
									  <label><input class="foo" type="checkbox" name="checkbox" id="checkbox" value="0">
									  Marca Asistencia</label>
								</label>
			        		</div>					
						</div>

						<form  align="left" name="formulario" method="post" action="http://pagina.com/send.php">
				 			<meter min="0" max="{{$te->secTer}}" 
								         low="10" high="20"
								         optimum="{{$te->secTer}}" value={{$terapias->seciones}}>
						</form>	



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
        </div>
    </div>


{!!Form::model($terapias,['method'=>'GET','route'=>['asignar.show',$terapias->idconsulta],'files'=>'true'])!!}
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
    		@if ($fis->idFisioterapeuta==$terapias->idFisioterapeuta)
	    		<div class="panel panel-success" style="max-width: 108rem;">
	    			<div align="left" class="panel-heading"><h4>Fisioterapeuta</h4></div>
	    			<div class="panel-body" >
	    				<div class="row">
	    					<div class="col-lg-12 col-md-3 col-sm-2 col-xs-12">
	    						<div class="row">
		    						<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">
		    							<input type=hidden name="idFisioterapeuta"  class="form-control" value="{{$fis->idFisioterapeuta}}" >									
												<label for="cedul">Cedula</label>
												<input 
													disabled
													
													type="text" 
													readonly="readonly"
													style="text-transform:uppercase;"
													value="{{$fis->cedulaF}}">									
		    							</div>
		    							<input type=HIDDEN name="idseciones" id="idseciones" value="{{$terapias->seciones}}">

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
    		@if ($pac->idPaciente==$terapias->idPaciente)
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


<!--*************************DATOS DE LA TERAPIA ASIGNADA**********************************************-->
    	<div class="row" align="center">
    		@foreach($terapia as $te)
    		@if ($te->idTerapia==$terapias->idTerapia)
	    		<div class="panel panel-danger" style="max-width: 108rem;">
	    			<div align="left" class="panel-heading"><h4>Terapia asignada</h4> 
	    				<div align="right"> <h4>Estado de terapia {{$te->estadoTerapia}}</h4></div>
	    			</div>
	    			<div class="panel-body" >
	    				<div class="row">
	    					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
	    						<div class="row">
		    						<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
		    							<div class="form-group">									
												<label for="idTerapia">Id</label>
												<input 
													name="idTerapia" 
													id="idTerapia"
													disabled
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
												name="peso" 
												id="peso"
												
												length="1" 
				      							maxlength="3"
				      							disabled
												pattern="[0-9]+" 
												
												value="{{$te->hrInicio}} a {{$te->hrFin}} "  
												class="form-control"
												>	
										</div>
									</div>

									<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6" align="center">
										<div class="form-group">
											<label for="peso">Dias</label>
											<input 
												type="text" 
																						
				      							disabled											
												value="{{$te->dia_1}} {{$te->dia_2}} {{$te->dia_3}} {{$te->dia_4}} {{$te->dia_5}} "  
												class="form-control"
												>	
										</div>
									</div>	
									<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6" align="center">
										<div class="form-group">
											<label for="secTer">Seciones</label>
											<input 
												type="secTer" 
												name="secTer" 
												id="secTer"
				      							disabled
												pattern="[0-9]+" 												
												value="{{$te->secTer}}"  
												class="form-control"
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
												>{{$te->comenTerapia}}-----
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
<!--************************TERMINA DATOS LA TERAPIA ASIGNADA***********************************************-->


<!--*************************DATOS PERSONALIZADOS DE TERAPIA**********************************************-->
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
												
												length="1" 
				      							maxlength="500"
												
												value="{{$terapias->comentarios_secion}}" 
												class="form-control"
												>{{$terapias->comentarios_secion}}
											</TEXTAREA>								
		    							</div>
		    						</div>									
								</div>								
	    					</div>	
	    				</div>	    				
	    			</div>	    			
	    		</div>	    		
    	</div>
<!--************************TERMINA DATOS LA TERAPIA ASIGNADA***********************************************-->
<div class="form-group">	
			<a href="vconsulta/asignar">
						<button id="btn_crear"  class="btn btn-info">
							<span class="fa fa-chevron-circle-right"></span>
							&nbsp;&nbsp;Regresar
						</button>
		</a>	
        </div>




	{!!Form::close()!!}


	@push ('scrips')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" >

		$(function(){
		//Aquí es donde te digo que le hablo al document, le ligo el evento, le digo que selectores y le paso lo que quiero que haga
		$( document ).on( 'click', '.foo', function(){
		let val = $(this).val();
		  //Revisa en que status está el checkbox y controlalo según lo //desees
		  if( $( this ).is( ':checked' ) ){
		    alert( 'Guardando información de '+ val +'...' );

		    
		  }
		  
		  else{
		    alert( 'Desguardando información de ' + val + '...' );
		  }
		});

		});

	 </script>
 @endpush


	
@endsection





