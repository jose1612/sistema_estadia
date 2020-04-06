<!DOCTYPE html>
<html>
    <head>
        
        <title>Cita</title>
        
    </head>
    <body>
        @foreach ($citas as $con)
            <img style="float:left; margin:10px; width:95px; height:95px;"alt="" src="C:\sandra\logo.png">
            <hr style="color: #0056b2;"> 
            <!--Datos del Fisioterapeuta-->
            <p align="right" style="text-transform:uppercase;">
                DR. {{ $con->nom_fis}} {{ $con->pat_fis}} {{ $con->mat_fis}}<br/>
                Cédula: {{$con->ce}}<br/>
                Teléfono: {{$con->telfisio}}<br/>
            </p>
            <hr width="40%" align="right" style="color: #9BEFC6;">
            <!--Datos del Paciente-->
            <p align="left" style="text-transform:uppercase;">
                Fecha:&nbsp;&nbsp;&nbsp;{{$con->fc}}<br/>
                N° Paciente:&nbsp;&nbsp;{{ $con->num_pac}} 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Nombre:&nbsp;&nbsp;{{$con->nom_pac}} {{ $con->pat_pac}} {{ $con->mat_pac}} 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                TEL:&nbsp;&nbsp;{{ $con->telpac}}<br/>
                Fecha Cita:&nbsp;&nbsp;{{ $con->f_c}}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                Hora:&nbsp;&nbsp;{{ $con->hr}}&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;
                <br/>
            </p>
            <table width="730px" align="center">
                <tr bgcolor="#C6D7CF">
                    <td align="center">Recomendaciones</td>
                </tr>
                <tr  width="100%" bgcolor="#FFFFFF" align="left">
                    <td >{{ $con->tra_con}}</td>
                </tr>
            </table><br/>
            <p></p>
            <p></p>
            <br></br>
            <p></p>
            <p></p>
            <br></br>

            <br/>
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
             <h6 align="center">
                <br><br>
                <hr size="3px" width="40%" noshade="noshade" align="center" >                               
                        <label>DR. {{ $con->nom_fis}} {{ $con->pat_fis}} {{ $con->mat_fis}}</label> 
                        <br><label>Cédula: {{$con->ce}}</label> 
                        <br><label>Telefono: {{$con->telfisio}}</label>                                     
            </h6>  
        @endforeach

    </body>
   
</html>
