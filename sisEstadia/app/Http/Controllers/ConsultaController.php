<?php

namespace sisEstadia\Http\Controllers;

use sisEstadia\Mail\CorreoMensaje;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisEstadia\Http\Requests\ConsultaFormRequest;
use sisEstadia\Consulta;
use DB;


use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use PDF;


class ConsultaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        
        if($request)    
        {
            $query=trim($request->get('searchText'));
            $consultas=DB::table('Consulta as c')
            ->join('Paciente as p', 'c.idPaciente','=','p.idPaciente')
            ->join ('Fisioterapeuta as f', 'c.idFisioterapeuta','=','f.idFisioterapeuta')
            ->join ('cEstudio as est', 'c.idcEstudio','=','est.idcEstudio')
            ->join ('cLesion as cl', 'c.idcLesion','=','cl.idcLesion')
            ->join ('cMateial as mat', 'c.idcMateial','=','mat.idcMateial')
            ->join ('Ejercicio as ejer', 'c.idEjercicio','=','ejer.idEjercicio')
            ->join ('Terapia as tep', 'c.idTerapia','=','tep.idTerapia')
            ->select('c.fecha_consulta',                     
                     'c.idConsulta',
                     'c.peso',
                     'c.estatura',
                     'c.alergias',
                     'c.temperatura',
                     'c.diagnostico',
                     'c.tratamineto',
                     'p.idPaciente as num_pac',
                     'p.telefono as telpac',
                     'p.nombre as nom_pac',
                     'p.apellido_paterno as pat_pac',
                     'p.apellido_materno as mat_pac',
                     'p.edad as edad_pac',
                     'f.idFisioterapeuta as id_fisio',
                     'f.nombreF as nom_fis',
                     'f.apellido_paternoF as pat_fis',
                     'f.apellido_maternoF as mat_fis',
                     'f.cedulaF as ce',
                     'f.telefonoF as telfisio',
                     'cl.tipo_lesion as tipoLesion',
                     'cl.tipo_lesion as tile'              
                    )
            ->where('p.nombre','LIKE','%'.$query.'%')
            ->where('f.nombreF','LIKE','%'.$query.'%')
            ->where('c.evento','=','Consulta')     
            ->orderBy('c.idConsulta','desc')           
            ->paginate(10);            
            return view('vconsulta.consulta.index',["consultas"=>$consultas,"searchText"=>$query]);
        }
    }

/*NO LO BORRES ESTE SIRVE PARA EL HISTORIAL DE LAS CONSULTAS*/
    
    public function pdf($id)
    {
        $consultas=DB::table('Consulta as c')
            ->join('Paciente as p', 'c.idPaciente','=','p.idPaciente')
            ->join ('Fisioterapeuta as f', 'c.idFisioterapeuta','=','f.idFisioterapeuta')
            ->join ('cEstudio as est', 'c.idcEstudio','=','est.idcEstudio')
            ->join ('cLesion as cl', 'c.idcLesion','=','cl.idcLesion')
            ->join ('cMateial as mat', 'c.idcMateial','=','mat.idcMateial')
            ->join ('Ejercicio as ejer', 'c.idEjercicio','=','ejer.idEjercicio')
            ->join ('Terapia as tep', 'c.idTerapia','=','tep.idTerapia')
            ->select('c.fecha_consulta as fc',
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
           
        $pdf = PDF::loadView('vconsulta.consulta.pdf', ["consultas" => $consultas]);
        return $pdf->stream('reporte.pdf');       
    }
/*NO LO BORRES ESTE SIRVE PARA EL HISTORIAL DE LAS CONSULTAS*/

    public function create()
    {    
       
        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.edad')
        ->where('paci.estado','=','Activo')->get();  

        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF','fisio.cedulaF','fisio.apellido_paternoF','fisio.apellido_maternoF','fisio.sexoF','fisio.telefonoF')
        ->where('fisio.estadoF','=','Activo')->get();

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();

        return view("vconsulta.consulta.create",['pacientes'=>$pacientes,'fisios'=>$fisios,'lesiones'=>$lesiones,'estudios'=>$estudios]); 
    }

    public function store(ConsultaFormRequest $request)
    {
        
        $consulta=new Consulta();
        
        $consulta->idPaciente=$request->get('idPaciente');
        $consulta->idFisioterapeuta=$request->get('idFisioterapeuta'); 
        $consulta->idcEstudio=$request->get('idcEstudio');
        $consulta->idcLesion=$request->get('idcLesion');
        $consulta->idcMateial=1;
        $consulta->idEjercicio=1;
        $consulta->idTerapia=1;


        $mytime = Carbon::now('America/Mexico_City');
        $consulta->fecha_consulta=$mytime->toDateTimeString();
        
        $mytime = Carbon::now('America/Mexico_City');
        $consulta->fecha_creada=$mytime->toDateTimeString();

        $consulta->edad=$request->get('edad');
        $consulta->peso=$request->get('peso');
        $consulta->estatura=$request->get('estatura');
        $consulta->temperatura=$request->get('temperatura');
        $consulta->alergias=$request->get('alergias');

        $consulta->diagnostico=$request->get('diagnostico');
        $consulta->tratamineto=$request->get('tratamineto');      
        

        $consulta->evento='Consulta';
        $consulta->save();

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


        Mail::to('sceo141026@upemor.edu.mx')->queue(new CorreoMensaje($consulta,$fisios,$pacientes,$lesiones,$estudios));


        return Redirect::to('vconsulta/consulta');
        
    }

    public function show($id)
    {
              
       /*
       return view("vconsulta.consulta.show",["consulta"=>Consulta::findOrFail($id)]);
       */
       $consulta=Consulta::findOrFail($id);

        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF','fisio.cedulaF','fisio.apellido_paternoF','fisio.apellido_maternoF','fisio.telefonoF','fisio.imagenF')
        ->where('fisio.estadoF','=','Activo')->get();

        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.imagen','paci.telefono','paci.edad')
        ->where('paci.estado','=','Activo')->get(); 

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();

        return view("vconsulta.consulta.show",["consulta"=>$consulta,"pacientes"=>$pacientes,"fisios"=>$fisios,"lesiones"=>$lesiones,"estudios"=>$estudios]);
        
        
    }


    public function edit($id)
    {
        $consulta=Consulta::findOrFail($id);

        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF','fisio.cedulaF','fisio.apellido_paternoF','fisio.apellido_maternoF','fisio.telefonoF','fisio.imagenF')
        ->where('fisio.estadoF','=','Activo')->get();

        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.imagen','paci.telefono','paci.edad')
        ->where('paci.estado','=','Activo')->get(); 

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();

        return view("vconsulta.consulta.edit",["consulta"=>$consulta,"pacientes"=>$pacientes,"fisios"=>$fisios,"lesiones"=>$lesiones,"estudios"=>$estudios]);        
    }

    public function update(ConsultaFormRequest $request,$id)
    {
        $consulta=Consulta::findOrFail($id);
        $consulta->idPaciente=$request->get('idPaciente');
        $consulta->idFisioterapeuta=$request->get('idFisioterapeuta'); 
        $consulta->idcEstudio=$request->get('idcEstudio');
        $consulta->idcLesion=$request->get('idcLesion');
        $consulta->idcMateial=1;
        $consulta->idEjercicio=1;
        $consulta->idTerapia=1;
                

        $mytime = Carbon::now('America/Mexico_City');
        $consulta->fecha_consulta=$mytime->toDateTimeString();

        $consulta->edad=$request->get('edad');
        $consulta->peso=$request->get('peso');
        $consulta->estatura=$request->get('estatura');
        $consulta->temperatura=$request->get('temperatura');
        $consulta->alergias=$request->get('alergias');

        $consulta->diagnostico=$request->get('diagnostico');
        $consulta->tratamineto=$request->get('tratamineto');      
        

        $consulta->save();
        return Redirect::to('vconsulta/consulta');

    }

    public function destroy($id)
    {        
        $consulta=Consulta::findOrFail($id);        
        $consulta->delete();
        return Redirect::to('vconsulta/consulta');
    }
}
