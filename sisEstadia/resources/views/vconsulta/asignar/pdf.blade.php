<!--<!DOCTYPE html>
<html>
	<head>
		<title>hola 1</title>
		<div align="center"><img src="{{asset('img/fisio360.png')}}"></div>
	</head>
	<body>
		<font>hola</font>
		<table>
			
			
				<tbody>		
					@foreach ($consultas as $con)	
					<tr>
						<td>DR. {{ $con->nom_fis}} {{ $con->pat_fis}} {{ $con->mat_fis}}</td>					
					</tr>
					<tr>
						<label>Cédula: {{$con->ce}}</label>					
					</tr>
				@endforeach
				</tbody>
				
		</table>
	</body>
</html>

-->

<!DOCTYPE html>
<html>
    <head>
        
        <title>Document</title>
        <style>
        

    </style>
    </head>
    <body>
        <h1 align="center">Fisio 360</h1>
        
        <h3 align="right">
			@foreach ($consultas as $con)				
				<label>DR. {{ $con->nom_fis}} {{ $con->pat_fis}} {{ $con->mat_fis}}</label>	
				<br><label>Cédula: {{$con->ce}}</label>	
				<br><label>Teléfono: {{$con->telfisio}}</label>	 					
			@endforeach				
			<hr size="3px" width="50%" noshade="noshade" align="right" >			
        </h3>
        
        
         <h4 align="left">
			@foreach ($consultas as $con)
				<label>Paciente: {{ $con->nom_pac}} {{ $con->pat_pac}} {{ $con->mat_pac}}</label>	
				<br><label>N°: {{ $con->num_pac}}</label> 
				<br><label>Edad: {{ $con->edad}} años</label> 
				<br><label>Peso: {{ $con->peso}} Kg.</label>	
				<br><label>Estarura: {{ $con->estatura}} cm.</label> 	

			@endforeach				
						
        </h4>

		<hr size="3px" width="100%" noshade="noshade" align="right" >
        <div class="row">

        	<br><h3 align="	center"><label>	Diagnóstico</label></h3>
        	<p>	{{ $con->diagnostico}}</p><br><br><br><br><br><br>	

        </div>

        
		<div class="row">

        	<br><h3 align="	center">	</head><label>	Recomendaciones</label></h3>
        	<br>
        	<h2><p>	{{ $con->recomendacion}}</p> </h2>
        	<br><br><br><br>

        </div>

        <div class="row">        	
        	 <h6 align="center">
        	 	<br><br><br><br>
        	 	<hr size="3px" width="40%" noshade="noshade" align="center" >
					@foreach ($consultas as $con)				
						<label>DR. {{ $con->nom_fis}} {{ $con->pat_fis}} {{ $con->mat_fis}}</label>	
						<br><label>Cédula: {{$con->ce}}</label>	
						<br><label>Telefono: {{$con->telfisio}}</label>	 			
					@endforeach							
		    </h6>
        </div>


    </body>
   
</html>

