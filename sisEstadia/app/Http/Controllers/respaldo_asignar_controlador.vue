<?php

namespace sisEstadia\Http\Controllers;

use sisEstadia\Mail\CorreoMensaje;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisEstadia\Http\Requests\AsignarFormRequest;
use sisEstadia\Asignar;
use DB;


use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use PDF;

class AsignarController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        
        if($request)
        {
            $query=trim($request->get('searchText'));
            $terapias=DB::table('Consulta as c')
            ->join('Paciente as p', 'c.idPaciente','=','p.idPaciente')
            ->join ('Fisioterapeuta as f', 'c.idFisioterapeuta','=','f.idFisioterapeuta')
            ->join ('cEstudio as est', 'c.idcEstudio','=','est.idcEstudio')
            ->join ('cLesion as cl', 'c.idcLesion','=','cl.idcLesion')
            ->join ('cMateial as mat', 'c.idcMateial','=','mat.idcMateial')
            ->join ('Ejercicio as ejer', 'c.idEjercicio','=','ejer.idEjercicio')
            ->join ('Terapia as tep', 'c.idTerapia','=','tep.idTerapia')
            ->select('c.fecha_creada',
                     'c.idConsulta',
                     /*Campos de Terapia*/
                     'c.seciones',
                     'c.asistencia',
                     'c.restarseciones',
                     'c.asistencia',
                     'c.estado_terapia',
                     'c.comentarios_secion',
                     /*-----------------------*/

                     /*CAMPOS DE LA TABLA TERAPIA*/
                     'tep.idTerapia as clave_ter',
                     'tep.nombreTerapia as nom_ter',
                     'tep.dia_1 as lun',
                     'tep.dia_2 as mar',
                     'tep.dia_3 as mie',
                     'tep.dia_4 as jue',
                     'tep.dia_5 as vie',
                     'tep.hrInicio as i_ter',
                     'tep.hrFin as f_ter',
                     'tep.secTer as se_ter',
                     'tep.edadInicio as menor_ter',
                     'tep.edadFin as mayor_ter',
                     'tep.video as vi_ter',
                     'tep.comenTerapia as com_ter',
                     'tep.estadoTerapia as est_ter',
                     /*--------------------------*/

                     /*CAMPOS DE L ATABLA PACIENTE*/
                     'p.idPaciente as num_pac',
                     'p.telefono as telpac',
                     'p.nombre as nom_pac',
                     'p.apellido_paterno as pat_pac',
                     'p.apellido_materno as mat_pac',
                     'p.imagen as img_pac',
                     'f.idFisioterapeuta as id_fisio',
                     'f.nombreF as nom_fis',
                     'f.apellido_paternoF as pat_fis',
                     'f.apellido_maternoF as mat_fis',
                     'f.cedulaF as ce',
                     'f.telefonoF as telfisio',
                      /*-----------------------*/

                     /*Campos Lesion*/
                     'cl.idcLesion as cl_clave',
                     'cl.tipo_lesion as cl_tipo',
                     'cl.descripcion as cl_des',
                     'cl.causa as cl_causa',
                     'cl.prevencion as cl_prev',
                     /*-----------------------*/

                     /*Campos Estudio*/
                     'est.idcEstudio as est_clave',
                     'est.tipo_estudio as est_tipo',
                     'est.cometarios as est_comen',
                     /*--------------------*/            
                     
                     /*Campos de Ejercicio*/
                     'ejer.idEjercicio as ejer_clave',
                     'ejer.nombreE as eje_nombre',
                     'ejer.repeticiones as eje_repe',
                     'ejer.descripcion as eje_des',
                     /*-----------------------------*/

                     /*Campos del material*/
                     'mat.idcMateial as mat_clave',
                     'mat.nombreM as nom_mat',
                     'mat.tipo_materia as mat_tipo',
                     'mat.cantidad as mat_cant',
                     'mat.comentarios as mat_coment'               
                    )
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->where('f.nombreF','LIKE','%'.$query.'%')
            ->where('p.apellido_paterno','LIKE','%'.$query.'%')
            ->where('f.apellido_paternoF','LIKE','%'.$query.'%')
            ->where('p.apellido_materno','LIKE','%'.$query.'%')
            ->where('f.apellido_maternoF','LIKE','%'.$query.'%')
            ->where('c.evento','=','Terapia')     
            ->orderBy('c.idConsulta','desc')           
            ->paginate(4);            
            return view('vconsulta.asignar.index',["terapias"=>$terapias,"searchText"=>$query]);
        }
        
    }



    public function create()
    {    
       
        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo')
        ->where('paci.estado','=','Activo')->get();  

        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF')
        ->where('fisio.estadoF','=','Activo')->get();

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();


        $terapias=DB::table('Terapia as tera')
        ->select(DB::raw('CONCAT("Clave: ",tera.idTerapia," ",tera.nombreTerapia)AS completo_ter'),'tera.idTerapia','tera.nombreTerapia','tera.secTer','tera.comenTerapia','tera.dia_1','tera.dia_2','tera.dia_3','tera.dia_4','tera.dia_5','tera.hrInicio','tera.hrFin','tera.secTer','tera.comenTerapia','tera.estadoTerapia')
        ->where('tera.estadoTerapia','=','ACTIVA')->get(); 


        $materiales=DB::table('cMateial as mat')
        ->select(DB::raw('mat.nombreM'),'mat.idcMateial','mat.tipo_materia','mat.cantidad','mat.comentarios')->get();

        $ejercicios=DB::table('Ejercicio as eje')
        ->select(DB::raw('eje.nombreE'),'eje.repeticiones','eje.descripcion','eje.idEjercicio')->get();


        return view("vconsulta.asignar.create",['pacientes'=>$pacientes,'terapias'=>$terapias,'fisios'=>$fisios,'lesiones'=>$lesiones,'estudios'=>$estudios,'materiales'=>$materiales,'ejercicios'=>$ejercicios]); 

    }

    public function store(AsignarFormRequest $request)
    {
        
        $terapias=new Asignar();
        
        $terapias->idPaciente=$request->get('idPaciente');
        $terapias->idFisioterapeuta=$request->get('idFisioterapeuta'); 
        $terapias->idcEstudio=1;
        $terapias->idcLesion=1;
        $terapias->idcMateial=$request->get('idcMateial');
        $terapias->idEjercicio=$request->get('idEjercicio'); 
        $terapias->idTerapia=$request->get('idTerapia');

        $mytime = Carbon::now('America/Mexico_City');
        $terapias->fecha_creada=$mytime->toDateTimeString();

        $terapias->asistencia=$request->get('asistencia');
        $terapias->comentarios_secion=$request->get('comentarios_secion');
        $terapias->estado_terapia=$request->get('estado_terapia');
        $terapias->restarseciones=$request->get('restarseciones');
        $terapias->seciones=0;
     
        

        $terapias->evento='Terapia';
        $terapias->save();


        //Mail::to('sceo141026@upemor.edu.mx')->queue(new CorreoMensaje($consulta));

        return Redirect::to('vconsulta/asignar');
        
    }

    public function show($id)
    {        
        
        $terapias=Asignar::findOrFail($id);

        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.imagen','paci.telefono')
        ->where('paci.estado','=','Activo')->get();  

        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF','fisio.cedulaF','fisio.apellido_paternoF','fisio.apellido_maternoF','fisio.telefonoF','fisio.imagenF')
        ->where('fisio.estadoF','=','Activo')->get();

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();


        $terapia=DB::table('Terapia as tera')
        ->select(DB::raw('CONCAT("Clave: ",tera.idTerapia," ",tera.nombreTerapia)AS completo_ter'),'tera.idTerapia','tera.nombreTerapia','tera.secTer','tera.comenTerapia','tera.dia_1','tera.dia_2','tera.dia_3','tera.dia_4','tera.dia_5','tera.hrInicio','tera.hrFin','tera.secTer','tera.comenTerapia','tera.estadoTerapia')
        ->where('tera.estadoTerapia','=','ACTIVA')->get(); 


        $materiales=DB::table('cMateial as mat')
        ->select(DB::raw('mat.nombreM'),'mat.idcMateial','mat.tipo_materia','mat.cantidad','mat.comentarios')->get();

        $ejercicios=DB::table('Ejercicio as eje')
        ->select(DB::raw('eje.nombreE'),'eje.repeticiones','eje.descripcion','eje.idEjercicio')->get();

       return view("vconsulta.asignar.show",["terapias"=>$terapias,"materiales"=>$materiales,"ejercicios"=>$ejercicios,"terapia"=>$terapia,"pacientes"=>$pacientes,"fisios"=>$fisios,"lesiones"=>$lesiones,"estudios"=>$estudios]);

    }

    public function edit($id)
    {
        $terapias=Asignar::findOrFail($id);

        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.imagen','paci.telefono')
        ->where('paci.estado','=','Activo')->get();  

        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF','fisio.cedulaF','fisio.apellido_paternoF','fisio.apellido_maternoF','fisio.telefonoF','fisio.imagenF')
        ->where('fisio.estadoF','=','Activo')->get();

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();


        $terapia=DB::table('Terapia as tera')
        ->select(DB::raw('CONCAT("Clave: ",tera.idTerapia," ",tera.nombreTerapia)AS completo_ter'),'tera.idTerapia','tera.nombreTerapia','tera.secTer','tera.comenTerapia','tera.dia_1','tera.dia_2','tera.dia_3','tera.dia_4','tera.dia_5','tera.hrInicio','tera.hrFin','tera.secTer','tera.comenTerapia','tera.estadoTerapia')
        ->where('tera.estadoTerapia','=','ACTIVA')->get(); 


        $materiales=DB::table('cMateial as mat')
        ->select(DB::raw('mat.nombreM'),'mat.idcMateial','mat.tipo_materia','mat.cantidad','mat.comentarios')->get();

        $ejercicios=DB::table('Ejercicio as eje')
        ->select(DB::raw('eje.nombreE'),'eje.repeticiones','eje.descripcion','eje.idEjercicio')->get();

        return view("vconsulta.asignar.edit",["terapias"=>$terapias,"materiales"=>$materiales,"ejercicios"=>$ejercicios,"terapia"=>$terapia,"pacientes"=>$pacientes,"fisios"=>$fisios,"lesiones"=>$lesiones,"estudios"=>$estudios]);
        
    }

    public function update(AsignarFormRequest $request,$id)
    {
       
        $terapias=Asignar::findOrFail($id);

        $terapias->idPaciente=$request->get('idPaciente');
        
        $terapias->idFisioterapeuta=$request->get('idFisioterapeuta'); 
        $terapias->idcEstudio=1;
        $terapias->idcLesion=1;
        $terapias->idcMateial=$request->get('idcMateial');
        $terapias->idEjercicio=$request->get('idEjercicio'); 
        $terapias->idTerapia=$request->get('idTerapia');
        
        $terapias->seciones=$request->get('seciones');

        $mytime = Carbon::now('America/Mexico_City');
        $terapias->fecha_creada=$mytime->toDateTimeString();

        $terapias->asistencia=$request->get('asistencia');
        
        $terapias->estado_terapia=$request->get('estado_terapia');
        $terapias->restarseciones=$request->get('restarseciones');
        
        $terapias->comentarios_secion=$request->get('comentarios_secion');

        $terapias->save();
        return Redirect::to('vconsulta/asignar');
       

    }

    public function destroy($id)
    {
        
       

    }
}


https://laracasts.com/discuss/channels/laravel/update-stock




$message= array();//place outside the loop
if($product->quantity - $item->qty<0);
$message[] = 'Not enough Product' . $item->id;
else
$product->update(['quantity' => $product->quantity - $item->qty]);
