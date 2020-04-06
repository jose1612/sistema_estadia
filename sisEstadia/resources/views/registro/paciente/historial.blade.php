@extends('layouts.admin')
@section('contenido')

	<div class="row" align="center">    	
	    <div class="panel panel-info" style="max-width: 108rem;">
	    	<div align="center" class="panel-heading"><h1>Historial</h1></div>
	    		<div class="panel-body" >	    				
	    			<div class="row">
	    				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
	    					<div align="left">
		   						<div class="form-group">									
									<img style="height: 199px; width: 199px; background-color: black; margin: 1px;" src="{{asset('imagenes/pacientes/'.$pac->imagen)}}" alt="..." class="rounded-circle">									
		   						</div>
		   					</div>		
	    				</div>
	    				
	    				<div class="row" >
		    				<div class="col-lg-7 col-md-4 col-sm-4 col-xs-4">
		    					<div class="row" align="left">
			    					<div class="col-lg-8 col-md-4 col-sm-4 col-xs-6">
			    						<div class="form-group">			    								
			    							<h4>N° Paciente:&nbsp;&nbsp;{{$pac->idPaciente}}</h4>
			    							<h4>Nombre:&nbsp;&nbsp;{{$pac->nombre}} {{$pac->apellido_paterno}} {{$pac->apellido_materno}}</h4>
			    							<h4>Tel:&nbsp;&nbsp;{{$pac->telefono}}</h4>
			    							<h4>Calle:{{$pac->calle}}&nbsp;&nbsp;N°&nbsp;&nbsp;{{$pac->numero_exterior}}&nbsp;&nbsp;Col.&nbsp;&nbsp;{{$pac->colonia}}&nbsp;&nbsp;Localidad:&nbsp;&nbsp;{{$pac->municipio}}</h4>
			    							<h4>E-mail:&nbsp;&nbsp;{{$pac->correo}}</h4>
			    							<h4>Sexo:&nbsp;&nbsp;{{$pac->sexo}}</h4>
			    						</div>
			    					</div>
			    				</div>
		    				</div>	    					
	    				</div>    					
	    			</div>
	    		</div>	    			
	    </div>    		
    </div>

    <!--DESPUES DE LA CABECERA-->
	<div class="row" align="center">
	    @foreach($historiales as $his)
	    	@if( $his->evento == 'Consulta')
		   		<div class="panel panel-primary" style="max-width: 108rem;">
		   			<div align="left" class="panel-heading"><h4>Consulta</h4></div>
			   			<div class="panel-body" >
		    				<div class="row">
		    					<div class="col-lg-12 col-md-3 col-sm-2 col-xs-12">
		    						<div class="row">
			    						<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
			    							<div class="form-group">
			    								<img style="float:left; margin:10px; width:95px; height:95px;"alt="" src="‪C:\sandra2\logo.png">
				    							 <p align="right" style="text-transform:uppercase;">
									                DR. {{ $his->nom_fis}} {{ $his->pat_fis}} {{ $his->mat_fis}}<br/>
									                Cédula: {{$his->ce}}<br/>
									                Teléfono: {{$his->telfisio}}<br/>
									            </p>
	           									 <hr width="40%" align="right" style="color: #9BEFC6;">			    								
			    								<p align="left" style="text-transform:uppercase;">
									                Fecha:&nbsp;&nbsp;&nbsp;{{$his->fc}}<br/>
									                Edad:&nbsp;{{$his->ed_pac}}&nbsp;años
									                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
									                Peso:&nbsp;{{$his->peso_consulta}}&nbsp;&nbsp;Kg.
									                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
									                Estarura:&nbsp;&nbsp;{{ $his->est_con}} cm.
									                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
									                Temperatura:&nbsp;&nbsp;{{$his->tem_con}}&nbsp;&nbsp;C°
									                <br/>
									            </p>
									            <hr width="100%" align="left" style="color: #9BEFC6;">
									            <p></p>
									            <p></p>
									            <br></br>
									            <table width="730px" align="center">
									                <tr bgcolor="#C6D7CF">
									                    <td align="center">Diagnóstico</td>
									                </tr>
									                <tr  width="100%" bgcolor="#FFFFFF" align="left">
									                    <td >{{$his->dia_con}}</td>
									                </tr>
									            </table>
									            <br/>
									            <p></p>
									            <p></p>
									            <br></br>
									            <table width="730px" align="center">
									                <tr bgcolor="#C6D7CF">
									                    <td align="center">Recomendaciones</td>
									                </tr>
									                <tr  width="100%" bgcolor="#FFFFFF" align="left">
									                    <td >{{ $his->tra_con}}</td>
									                </tr>
									            </table><br/>
									            <p></p>
									            <p></p>
									            <br></br>
									            <p></p>
									            <p></p>
									            <br></br>
									             <table width="730px" align="center">
									                <tr bgcolor="#C6D7CF">
									                    <td colspan="3" align="center">Estudios</td>
									                </tr>
									                <tr bgcolor="#E4EAE7" align="center">
									                    <td>Id</td>
									                    <td>Estudio</td>
									                    <td>Comentarios</td>
									                </tr>
									                <tr bgcolor="#FFFFFF" align="center">
									                    <td>{{$his->clave_est}}</td>
									                    <td>{{ $his->tip_est}}</td>
									                    <td>{{ $his->come_est}}</td>
									                </tr>
									                    <tr bgcolor="#FFFFFF" align="center">
									                    <td></td>
									                    <td></td>
									                    <td></td>
									                </tr>
									                    <tr bgcolor="#FFFFFF" align="center">
									                    <td></td>
									                    <td></td>
									                    <td></td>
									                </tr>
									            </table><br/>
									            <p></p>
									            <p></p>
									            <br></br>
									            <table width="730px" align="center">
									                <tr bgcolor="#C6D7CF">
									                    <td colspan="3" align="center">Lesiones</td>
									                </tr>
									                <tr bgcolor="#E4EAE7" align="center">
									                    <td>Id</td>
									                    <td>Lesion</td>
									                    <td>Comentarios</td>
									                </tr>
									                <tr bgcolor="#FFFFFF" align="center">
									                    <td>{{$his->clave_les}}</td>
									                    <td>{{ $his->tip_les}}</td>
									                    <td>{{ $his->des_les}}</td>
									                </tr>
									            </table><br/>
			    							</div>
			    						</div>
			    					</div>
			    				</div>
			    			</div>
			    		</div>
			    	
			    </div>
			@elseif($his->evento == 'Cita')
				<div class="panel panel-success" style="max-width: 108rem;">
		   			<div align="left" class="panel-heading"><h4>Cita</h4></div>
			   			<div class="panel-body" >
		    				<div class="row">
		    					<div class="col-lg-12 col-md-3 col-sm-2 col-xs-12">
		    						<div class="row">
			    						<div class="col-lg-12 col-md-4 col-sm-4 col-xs-6">
			    							<div class="form-group">
			    								<img style="float:left; margin:10px; width:95px; height:95px;"alt="" src="‪C:\sandra2\logo.png">
            									<hr style="color: #0056b2;"> 
<!-- ---------------------------------------------------------------------------------------------------------->
				    							 <p align="right" style="text-transform:uppercase;">
									                DR. {{ $his->nom_fis}} {{ $his->pat_fis}} {{ $his->mat_fis}}<br/>
									                Cédula: {{$his->ce}}<br/>
									                Teléfono: {{$his->telfisio}}<br/>
									            </p>
	           									 <hr width="40%" align="right" style="color: #9BEFC6;">			    								
			    								<p align="left" style="text-transform:uppercase;">
									                Fecha:&nbsp;&nbsp;&nbsp;{{$his->f_creada}}<br/>
									                Fecha Cita:&nbsp;&nbsp;{{ $his->f_c}}
									                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									                &nbsp;&nbsp;&nbsp;&nbsp;
									                Hora:&nbsp;&nbsp;{{ $his->hr}}&nbsp;&nbsp;
									                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									                &nbsp;&nbsp;&nbsp;&nbsp;
									                <br/>
									            </p>
									            <hr width="100%" align="left" style="color: #9BEFC6;">
									            <table width="730px" align="center">
									                <tr bgcolor="#C6D7CF">
									                    <td align="center">Recomendaciones</td>
									                </tr>
									                <tr  width="100%" bgcolor="#FFFFFF" align="left">
									                    <td >{{ $his->tra_con}}</td>
									                </tr>
									            </table><br/>
									            <p></p>
									            <p></p>
									            <br></br>
									            <p></p>
									            <p></p>
									            <br></br>
									             <table width="730px" align="center">
									                <tr bgcolor="#C6D7CF">
									                    <td colspan="3" align="center">Estudios</td>
									                </tr>
									                <tr bgcolor="#E4EAE7" align="center">
									                    <td>Id</td>
									                    <td>Estudio</td>
									                    <td>Comentarios</td>
									                </tr>
									                <tr bgcolor="#FFFFFF" align="center">
									                    <td>{{$his->clave_est}}</td>
									                    <td>{{ $his->tip_est}}</td>
									                    <td>{{ $his->come_est}}</td>
									                </tr>
									                    <tr bgcolor="#FFFFFF" align="center">
									                    <td></td>
									                    <td></td>
									                    <td></td>
									                </tr>
									                    <tr bgcolor="#FFFFFF" align="center">
									                    <td></td>
									                    <td></td>
									                    <td></td>
									                </tr>
									            </table><br/>

									            <p></p>
									            <p></p>
									            <br></br>
									            <table width="730px" align="center">
									                <tr bgcolor="#C6D7CF">
									                    <td colspan="3" align="center">Lesiones</td>
									                </tr>
									                <tr bgcolor="#E4EAE7" align="center">
									                    <td>Id</td>
									                    <td>Lesion</td>
									                    <td>Comentarios</td>
									                </tr>
									                <tr bgcolor="#FFFFFF" align="center">
									                    <td>{{$his->clave_les}}</td>
									                    <td>{{ $his->tip_les}}</td>
									                    <td>{{ $his->des_les}}</td>
									                </tr>
									            </table><br/>									            
									            <p></p>
									            <p></p>
									            <br></br>
<!-- ---------------------------------------------------------------------------------------------------------->
			    							</div>
			    						</div>
			    					</div>
			    				</div>
			    			</div>
			    		</div>
			    	
			    </div>
			@else
				<div class="panel panel-warning" style="max-width: 108rem;">
		   			<div align="left" class="panel-heading"><h4>Terapias</h4></div>
			   			<div class="panel-body" >
		    				<div class="row">
		    					<div class="col-lg-12 col-md-3 col-sm-2 col-xs-12">
		    						<div class="row">
			    						<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
			    							<div class="form-group">
			    								{{$his->ce}}

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
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- -->
    <!-- --><!-- --><!-- -->

@endsection