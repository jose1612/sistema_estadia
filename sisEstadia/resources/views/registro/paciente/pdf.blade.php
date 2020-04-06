<!DOCTYPE html>
<html>
    <head>
        
        <title>Historial Paciente</title>
        
    </head>
    <body>
         @foreach ($historiales as $con)
            <img style="float:left; margin:10px; width:150px; height:150px;"alt="" src="C:\sandra\logo.png">
            <hr style="color: #0056b2;">
            <label style="text-transform:uppercase;">N° Paciente:{{ $con->num_pac}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Paciente:{{$con->nom_pac}} {{ $con->pat_pac}} {{ $con->mat_pac}}</label> 

            <p align="right" style="text-transform:uppercase;">DR. {{ $con->nom_fis}} {{ $con->pat_fis}} {{ $con->mat_fis}}</p>
            <p align="right" style="text-transform:uppercase;">Cédula: {{$con->ce}}</p>
            <p align="right" style="text-transform:uppercase;">Teléfono: {{$con->telfisio}}</p>
            <hr width="40%" align="right" style="color: #9BEFC6;">
            <br>
            <br>
            <label style="text-transform:uppercase;">N° Paciente:{{ $con->num_pac}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Paciente:{{$con->nom_pac}} {{ $con->pat_pac}} {{ $con->mat_pac}}</label> 
            
            <hr width="100%" align="left" style="color: #9BEFC6;">

            <!--Datos de la consulta -->
            <p align="center" style="text-transform:uppercase;"><h2 align="center">Datos Cita</h2></p>
            <hr width="100%" align="center" style="color: #0056b2;">
            <p></p>
            <p></p>
            <table width="700px" align="center">
                <tr bgcolor="#FFFFFF">
                    <td colspan="2">Fecha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $con->fecha_cita}}</td>
                    <td colspan="2">Hora:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $con->hora}}</td>
                </tr>               
            </table><br/>
            <p></p>
            <p></p>
            <br></br>
            <table width="730px" align="center">
                <tr bgcolor="#C0C0C0">
                    <td colspan="3" align="center">Estudios</td>
                </tr>
                <tr bgcolor="#85D1AC" align="center">
                    <td>Id</td>
                    <td>Estudio</td>
                    <td>Comentarios</td>
                </tr>
                <tr bgcolor="#FFFFFF" align="center">
                    <td>{{$con->id_estudio}}</td>
                    <td>{{ $con->tipoEstudio}}</td>
                    <td>{{ $con->comeEstudio}}</td>
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
                <tr bgcolor="#4CE4C4">
                    <td colspan="3" align="center">Lesiones</td>
                </tr>
                <tr bgcolor="#4CAAE4" align="center">
                    <td>Id</td>
                    <td>Lesion</td>
                    <td>Comentarios</td>
                </tr>
                <tr bgcolor="#FFFFFF" align="center">
                    <td>{{$con->idLesion}}</td>
                    <td>{{ $con->tipoLesion}}</td>
                    <td>{{ $con->desLesion}}</td>
                </tr>
            </table><br/>
            <p></p>
            <p></p>
            <br></br>
        @endforeach

    </body>
   
</html>
