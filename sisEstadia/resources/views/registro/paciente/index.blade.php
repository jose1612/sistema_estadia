@extends('layouts.admin')
@section('contenido')
    
    <!-- Main content -->

          
    <div class="row">
    	<div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
    		<div class="row">
    			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">			
					@include('registro.paciente.search')
				</div>
    		</div>
    		<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">	
				<h3 align="right">
					<a href="paciente/create">
						<button class="btn btn-success">
							<span class="glyphicon glyphicon-plus-sign"></span>
							&nbsp;&nbsp;Añadir nuevo
						</button>
					</a>
			
			
					<a href="/tablero/index">
						<button class="btn btn-info">
							<span class="fa fa-chevron-circle-right"></span>
							&nbsp;&nbsp;Regresar
						</button>
					</a>			
			</div>
			<div class="row">
				<div class="col-lg-7 col-md-8 col-sm-8 col-xs-9">
					<h3 align="right">CARDEX DE LOS PACIENTES</h3>
				</div>
			</div>
    		{{$pacientes->render()}} 
    		<div clas="row">
    			@foreach ($pacientes as $pac)
    			<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
    				<div align="center" class="panel panel-primary" style="max-width: 108rem;">
    					<div class="panel-body text-primary" >
	    					<img style="height: 100px; width: 100px; background-color: black; margin: 5px;" src="{{asset('imagenes/pacientes/'.$pac->imagen)}}" alt="..." class="rounded-circle">
	    					<h2 class="card-title" style="text-transform:uppercase;"> ID:{{$pac->idPaciente}}</h2>
					        	<p class="card-text" style="text-transform:uppercase;"> Nombre:{{$pac->nombre}} {{ $pac->apellido_paterno}}</p>
				    			<p class="card-text" style="text-transform:uppercase;"> Calle {{ $pac->calle}} N° {{ $pac->numero_exterior}}</p>
				    			<p class="card-text" style="text-transform:uppercase;">Col. {{ $pac->colonia}}</p>
				    			<p class="card-text"style="text-transform:uppercase;">TEL:{{ $pac->telefono}}</p>
				    			<p class="card-text">E-mail: {{ $pac->correo}}</p>
				    			<p class="card-text">SEXO: {{ $pac->sexo}}</p>	
    					</div>

    					<div class="panel-footer bg-transparent border-primary py-3">

				    		<a href="" data-target="#modal-ver-{{$pac->idPaciente}}" data-toggle="modal"><button class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;</button></a>

							<a href="{{URL::action('PacienteController@edit',$pac->idPaciente)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;</button></a>

							<a href="" data-target="#modal-delete-{{$pac->idPaciente}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;</button></a>	

							<a href="{{URL('registro/paciente/historial/'.$pac->idPaciente)}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp; </button></a>

				  		</div>	    				
    				</div>
    			</div>
    			@include('registro.paciente.modal')
    			@endforeach
    		</div>    		
    	</div>
    	<div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
    		{{$pacientes->render()}}
    	</div> 
    </div>  
@endsection

