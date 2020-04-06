<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisEstadia\Http\Requests\HistorialFormRequest;
use sisEstadia\Historial;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use PDF;

class HistorialController extends Controller
{

    public function __construct()
    {
        
    }
    
    if($request)
        {
            $query=trim($request->get('searchText'));
            $historiales=DB::table('Consulta as c')
            ->join('Paciente as p', 'c.idPaciente','=','p.idPaciente')
            ->join ('Fisioterapeuta as f', 'c.idFisioterapeuta','=','f.idFisioterapeuta')
            ->join ('cEstudio as est', 'c.idcEstudio','=','est.idcEstudio')
            ->join ('cLesion as cl', 'c.idcLesion','=','cl.idcLesion')
            ->join ('cMateial as mat', 'c.idcMateial','=','mat.idcMateial')
            ->join ('Ejercicio as ejer', 'c.idEjercicio','=','ejer.idEjercicio')
            ->select('c.idConsulta',
            		 'c.evento',
            		 'c.fecha_consulta',
                     'c.edad',                     
                     'c.peso',
                     'c.estatura',
                     'c.alergias',
                     'c.temperatura',
                     'c.diagnostico',
                     'c.tratamineto',
                     'c.fecha_cita',
                     'c.hora',
                     'c.estado_cita',
                     'c.seciones',
                     'c.asistencia',
                     'c.restarseciones',
                     'c.fecha_creada',
                     'c.estado_terapia',
                     'c.comentarios_secion', 
                     'c.est_hist',              
                     /*--------------------*/
                     /*PAcientes*/
                     /*'p.idPaciente as num_pac',
                     'p.telefono as telpac',
                     'p.nombre as nom_pac',
                     'p.apellido_paterno as pat_pac',
                     'p.apellido_materno as mat_pac',
                     'p.estado',*/
                     'p.idPaciente',
                     'p.nombre',
                     'p.apellido_paterno',
                     'p.apellido_materno',
                     'p.calle',
                     'p.numero_exterior',
                     'p.numero_interior',
                     'p.colonia',
                     'p.telefono',
                     'p.correo',
                     'p.sexo',
                     'p.fecha_nacimineto',
                     'p.NSS', 
                     'p.usuario',
                     'p.contrasenia',
                     'p.conf_contrasenia',
                     'p.estado',
                     'p.municipio',
                     'p.imagen',
                     /*

                     'f.idFisioterapeuta as id_fisio',
                     'f.nombre as nom_fis',
                     'f.apellido_paterno as pat_fis',
                     'f.apellido_materno as mat_fis',
                     'f.cedula as ce',
                     'f.telefono as telfisio',
                     'cl.tipo_lesion as tile'*/
                     'f.idFisioterapeuta',
                     'f.nombre',
                     'f.apellido_paterno',
                     'f.apellido_materno',
                     'f.sexo',
                     'f.fecha_nacimineto',                     
                     'f.NSS',
                     'f.estado',
                     'f.fecha_ingreso',
                     'f.cedula', 
                     'f.calle',
                     'f.numero_exterior',
                     'f.numero_interior',
                     'f.colonia',
                     'f.municipio',
                     'f.correo',
                     'f.telefono',   
                     'f.usuario',
                     'f.contrasenia',
                     'f.conf_contrasenia',                     
                     'f.imagen'             
                    )
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->where('p.idPaciente','LIKE','%'.$query.'%')
            ->where('p.estado','=','Activo')     
            ->orderBy('c.idPaciente','desc')           
            ->paginate(10);            
            return view('vconsulta.historial.index',["historiales"=>$historiales,"searchText"=>$query]);
        }
    }

    public function create()
    {
    	        

    }

    public function store(HistorialFormRequest $request)
    {
        

    }

    public function show($id)
    {
    	//
     /*
       $historiales=Historial::findOrFail($id);

        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombre," ",fisio.apellido_paterno," ",fisio.apellido_materno) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombre','fisio.cedula','fisio.apellido_paterno','fisio.apellido_materno','fisio.telefono','fisio.imagen')
        ->where('fisio.estado','=','Activo')->get();

        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.imagen','paci.telefono')
        ->where('paci.estado','=','Activo')->get(); 

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();

        $materiales=DB::table('cMateial as mat')
        ->select(DB::raw('mat.nombreM'),'mat.idcMateial','mat.tipo_materia','mat.cantidad','mat.comentarios')->get();

        $ejercicios=DB::table('Ejercicio as eje')
        ->select(DB::raw('eje.nombreE'),'eje.repeticiones','eje.descripcion','eje.idEjercicio')->get();


        return view("vconsulta.cita.show",["citas"=>$citas,"pacientes"=>$pacientes,"fisios"=>$fisios,"lesiones"=>$lesiones,"estudios"=>$estudios]);
       */ 
        
    }

    public function edit($id)
    {
        
    }

    public function update(HistorialFormRequest $request,$id)
    {
        
    }

    public function destroy($id)
    {

    }
}
