<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>holi</title>
</head>
<body>
        
            <img style="float:left; margin:10px; width:95px; height:95px;"alt="" src="C:\sandra\logo.png">
            <hr style="color: #0056b2;"> 
            <!--Datos del Fisioterapeuta-->
            @foreach($fisios as $fis)
            @if ($fis->idFisioterapeuta==$citas->idFisioterapeuta)
            <p align="right" style="text-transform:uppercase;">
                DR. {{$fis->nombreF}} {{$fis->apellido_paternoF}} {{$fis->apellido_maternoF}}<br/>
                Cédula: {{$fis->cedulaF}}<br/>
                Teléfono: {{$fis->telefonoF}}<br/>
            </p>
            @endif
            @endforeach 
            <hr width="40%" align="right" style="color: #9BEFC6;">
            <!--Datos del Paciente-->
            <p align="left" style="text-transform:uppercase;">
                Fecha de Solicitud:&nbsp;&nbsp;&nbsp;{{$citas->fecha_creada}}<br/>
                @foreach($pacientes as $pac)
                    @if ($pac->idPaciente==$citas->idPaciente)                        
                        N° Paciente:&nbsp;&nbsp;{{$pac->idPaciente}} 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Nombre:&nbsp;&nbsp;{{$pac->nombre}} {{ $pac->apellido_paterno}} {{ $pac->apellido_materno}} 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        TEL:&nbsp;&nbsp;{{ $pac->telefono}}<br/>                        
                    @endif
                @endforeach

                &nbsp;
                Fecha Proxima Cita:&nbsp;{{$citas->fecha_cita}}&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                
                Hora:&nbsp;&nbsp;{{$citas->hora}} Hrs.
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <br/>
            </p>
            <hr width="100%" align="left" style="color: #9BEFC6;">
            <br/>
            <p></p>
            <p></p>
            <br></br>
            <table width="730px" align="center">
                <tr bgcolor="#C6D7CF">
                    <td align="center">Recomendaciones</td>
                </tr>
                <tr  width="100%" bgcolor="#FFFFFF" align="left">
                    <td >{{$citas->tratamineto}}</td>
                </tr>
            </table><br/>
            <p></p>
            <p></p>
            <br></br>
            <p></p>
            <p></p>
            <br></br>
            
            <table width="730px" align="center">
                @foreach($estudios as $est)
                    @if ($est->idcEstudio==$citas->idcEstudio)
                        <tr bgcolor="#C6D7CF">
                            <td colspan="3" align="center">Estudios</td>
                        </tr>
                        <tr bgcolor="#E4EAE7" align="center">
                            <td>Id</td>
                            <td>Estudio</td>
                            <td>Comentarios</td>
                        </tr>
                        <tr bgcolor="#FFFFFF" align="center">
                            <td>{{$est->idcEstudio}}</td>
                            <td>{{$est->tipo_estudio}}</td>
                            <td>{{$est->cometarios}}</td>
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
                    @endif
                @endforeach
            </table><br/>
            <p></p>
            <p></p>
            <br></br>
            <table width="730px" align="center">
                @foreach($lesiones as $les)
                    @if ($les->idcLesion==$citas->idcLesion)
                        <tr bgcolor="#C6D7CF">
                            <td colspan="3" align="center">Lesiones</td>
                        </tr>
                        <tr bgcolor="#E4EAE7" align="center">
                            <td>Id</td>
                            <td>Lesion</td>
                            <td>Comentarios</td>
                        </tr>
                        <tr bgcolor="#FFFFFF" align="center">
                            <td>{{$les->idcLesion}}</td>
                            <td>{{$les->tipo_lesion}}</td>
                            <td>{{$les->descripcion}}</td>
                        </tr>
                    @endif
                @endforeach
            </table><br/>
        
            <p></p>
            <p></p>
            <br></br>        
</body>
</html>