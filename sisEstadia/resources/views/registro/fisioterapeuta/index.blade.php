@extends('layouts.admin')
@section('contenido')
    
    <!-- Main content -->

          
    <div class="row">
    	<div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
    		<div class="row">
    			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">			
					@include('registro.fisioterapeuta.search')
				</div>
    		</div>
    		<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">	
				<h3 align="right">
					<a href="fisioterapeuta/create">
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
    		{{$fisios->render()}} 
    		<div clas="row">
    			@foreach ($fisios as $fis)
    			<div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
    				<div align="center" class="panel panel-success" style="max-width: 108rem;">
    					<div class="panel-body text-success" >
	    					<img style="height: 100px; width: 100px; background-color: black; margin: 5px;" src="{{asset('imagenes/fisioterapeutas/'.$fis->imagenF)}}" alt="..." class="rounded-circle">
	    					<h2 class="card-title" style="text-transform:uppercase;">ID:{{$fis->idFisioterapeuta}}</h2>
							<p class="card-text" style="text-transform:uppercase;">Nombre:{{$fis->nombreF}} {{$fis->apellido_paternoF}}</p>
							<p class="card-text" style="text-transform:uppercase;">Calle:{{$fis->calleF}} N°:{{$fis->numero_exteriorF}}</p>
				    		<p class="card-text" style="text-transform:uppercase;">Col.{{$fis->coloniaF}}</p>
				    		<p class="card-text"style="text-transform:uppercase;">TEL:{{$fis->telefonoF}}</p>
				    		<p class="card-text">E-mail:{{$fis->correoF}}</p>
				    		<p class="card-text">SEXO:{{ $fis->sexoF}}</p>
    					</div>

    					<div class="panel-footer bg-transparent border-primary py-3">
				    		<a href="" data-target="#modal-ver-{{$fis->idFisioterapeuta}}" data-toggle="modal"><button class="btn btn-success">Ver más..<span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;</button></a>

								<a href="{{URL::action('FisioterapeutaController@edit',$fis->idFisioterapeuta)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;</button></a>

								<a href="" data-target="#modal-delete-{{$fis->idFisioterapeuta}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;</button></a>
				  		</div>	    				
    				</div>
    			</div>
    			@include('registro.fisioterapeuta.modal')
    			@endforeach
    		</div>    		
    	</div>
    	<div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
    		{{$fisios->render()}} 
    	</div> 
    </div>  
@endsection

