<?php

namespace sisEstadia\Http\Controllers;
use Illuminate\Http\Request;
use sisEstadia\Http\Requests;
use sisEstadia\Mail\CorreoCita;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisEstadia\Http\Requests\CitaFormRequest;
use sisEstadia\Cita;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use PDF;
use DB;

class CitaController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(Request $request)
    {
        //
        if($request)
        {
            $query=trim($request->get('searchText'));
            $citas=DB::table('Consulta as c')
            ->join('Paciente as p', 'c.idPaciente','=','p.idPaciente')
            ->join ('Fisioterapeuta as f', 'c.idFisioterapeuta','=','f.idFisioterapeuta')
            ->join ('cEstudio as est', 'c.idcEstudio','=','est.idcEstudio')
            ->join ('cLesion as cl', 'c.idcLesion','=','cl.idcLesion')
            ->join ('cMateial as mat', 'c.idcMateial','=','mat.idcMateial')
            ->join ('Ejercicio as ejer', 'c.idEjercicio','=','ejer.idEjercicio')
            ->join ('Terapia as tep', 'c.idTerapia','=','tep.idTerapia')
            ->select('c.fecha_consulta',
                     'c.edad',
                     'c.idConsulta',
                     'c.peso',
                     'c.estatura',
                     'c.alergias',
                     'c.temperatura',
                     'c.diagnostico',
                     'c.tratamineto',
                     'c.fecha_cita',
                     'c.fecha_creada',
                     'c.hora',
                     'c.estado_cita',
                     'p.idPaciente as num_pac',
                     'p.telefono as telpac',
                     'p.nombre as nom_pac',
                     'p.apellido_paterno as pat_pac',
                     'p.apellido_materno as mat_pac',
                     'f.idFisioterapeuta as id_fisio',
                     'f.nombreF as nom_fis',
                     'f.apellido_paternoF as pat_fis',
                     'f.apellido_maternoF as mat_fis',
                     'f.cedulaF as ce',
                     'f.telefonoF as telfisio',
                     'cl.tipo_lesion as tile'             
                    )
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->where('f.nombreF','LIKE','%'.$query.'%')
            ->where('c.evento','=','Cita')     
            ->orderBy('c.idConsulta','desc')           
            ->paginate(4);            
            return view('vconsulta.cita.index',["citas"=>$citas,"searchText"=>$query]);
        }
    }

    public function pdf($id)
    {
        $citas=DB::table('Consulta as c')
            ->join('Paciente as p', 'c.idPaciente','=','p.idPaciente')
            ->join ('Fisioterapeuta as f', 'c.idFisioterapeuta','=','f.idFisioterapeuta')
            ->join ('cEstudio as est', 'c.idcEstudio','=','est.idcEstudio')
            ->join ('cLesion as cl', 'c.idcLesion','=','cl.idcLesion')
            ->join ('cMateial as mat', 'c.idcMateial','=','mat.idcMateial')
            ->join ('Ejercicio as ejer', 'c.idEjercicio','=','ejer.idEjercicio')
            ->join ('Terapia as tep', 'c.idTerapia','=','tep.idTerapia')
            ->select('c.fecha_creada as fc',
                     'c.fecha_cita as f_c',
                     'c.hora as hr',
                     'c.idConsulta as clave_consulta',
                     'c.peso as peso_consulta',
                     'c.estatura as est_con',
                     'c.alergias as aler_con',
                     'c.temperatura as tem_con',
                     'c.diagnostico as dia_con',
                     'c.tratamineto as tra_con',
                     'p.idPaciente as num_pac',
                     'p.telefono as telpac',
                     'p.nombre as nom_pac',
                     'p.edad as edad_pac',
                     'p.apellido_paterno as pat_pac',
                     'p.apellido_materno as mat_pac',
                     'f.idFisioterapeuta as id_fisio',
                     'f.nombreF as nom_fis',
                     'f.apellido_paternoF as pat_fis',
                     'f.apellido_maternoF as mat_fis',
                     'f.cedulaF as ce',
                     'f.telefonoF as telfisio',
                     'cl.idcLesion as idLesion',
                     'cl.tipo_lesion as tipoLesion',
                     'cl.descripcion as desLesion',
                     'cl.causa as ca_lesion',
                     'est.idcEstudio as id_estudio',
                     'est.tipo_estudio as tipoEstudio',
                     'est.cometarios as comeEstudio'
                    )
            ->where('c.idConsulta','=',$id)
            ->get();
           
        $pdf = PDF::loadView('vconsulta.cita.pdf', ["citas" => $citas]);
        return $pdf->stream('reporte.pdf');  

       
    }

    public function create()
    {
    	//
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

        return view("vconsulta.cita.create",['pacientes'=>$pacientes,'fisios'=>$fisios,'lesiones'=>$lesiones,'estudios'=>$estudios]);            

    }

    public function store(CitaFormRequest $request)
    {
        //
        $citas=new Cita();        
        $citas->idPaciente=$request->get('idPaciente');
        $citas->idFisioterapeuta=$request->get('idFisioterapeuta'); 
        $citas->idcEstudio=$request->get('idcEstudio');
        $citas->idcLesion=$request->get('idcLesion');
        $citas->idcMateial=1;
        $citas->idEjercicio=1;  
        $citas->idTerapia=1;

        $mytime = Carbon::now('America/Mexico_City');
        $citas->fecha_creada=$mytime->toDateTimeString();

        $citas->fecha_cita=$request->get('fecha_cita');
        $citas->hora=$request->get('hora');
        $citas->estado_cita='Pendiente';
        $citas->evento='Cita';
        $citas->diagnostico=$request->get('diagnostico');
        $citas->tratamineto=$request->get('tratamineto');
        $citas->save();



        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF','fisio.cedulaF','fisio.apellido_paternoF','fisio.apellido_maternoF','fisio.sexoF','fisio.telefonoF')
        ->where('fisio.estadoF','=','Activo')->get();

        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.edad','paci.telefono')
        ->where('paci.estado','=','Activo')->get(); 

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();





        Mail::to('sceo141026@upemor.edu.mx')->queue(new CorreoCita($citas,$fisios,$pacientes,$lesiones,$estudios));
        return Redirect::to('vconsulta/cita');

    }

    public function show($id)
    {
    	//
     
       $citas=Cita::findOrFail($id);

        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF','fisio.cedulaF','fisio.apellido_paternoF','fisio.apellido_maternoF','fisio.telefonoF','fisio.imagenF')
        ->where('fisio.estadoF','=','Activo')->get();

        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.imagen','paci.telefono')
        ->where('paci.estado','=','Activo')->get(); 

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();

        return view("vconsulta.cita.show",["citas"=>$citas,"pacientes"=>$pacientes,"fisios"=>$fisios,"lesiones"=>$lesiones,"estudios"=>$estudios]);
        
        
    }

    public function edit($id)
    {
        //
        $citas=Cita::findOrFail($id);

        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF','fisio.cedulaF','fisio.apellido_paternoF','fisio.apellido_maternoF','fisio.telefonoF','fisio.imagenF')
        ->where('fisio.estadoF','=','Activo')->get();

        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.imagen','paci.telefono')
        ->where('paci.estado','=','Activo')->get(); 

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();

        return view("vconsulta.cita.edit",["citas"=>$citas,"pacientes"=>$pacientes,"fisios"=>$fisios,"lesiones"=>$lesiones,"estudios"=>$estudios]);
    }

    public function update(ConsultaFormRequest $request,$id)
    {
        $citas=Consulta::findOrFail($id);
        $citas->idPaciente=$request->get('idPaciente');
        $citas->idFisioterapeuta=$request->get('idFisioterapeuta'); 
        $citas->idcEstudio=$request->get('idcEstudio');
        $citas->idcLesion=$request->get('idcLesion');
        $citas->idcMateial=1;
        $citas->idEjercicio=1;
        $citas->idTerapia=1;

        $mytime = Carbon::now('America/Mexico_City');
        $citas->fecha_consulta=$mytime->toDateTimeString();

        $citas->edad=$request->get('edad');
        $citas->peso=$request->get('peso');
        $citas->estatura=$request->get('estatura');
        $citas->temperatura=$request->get('temperatura');
        $citas->alergias=$request->get('alergias');

        $citas->diagnostico=$request->get('diagnostico');
        $citas->tratamineto=$request->get('tratamineto');      
        

        $citas->save();
        return Redirect::to('vconsulta/cita');

    }

    public function destroy($id)
    {
    	//
        $citas=Cita::findOrFail($id);
        $citas->estado_cita='Cancelada';        
        $citas->delete();
        return Redirect::to('vconsulta/cita');
    }
}
