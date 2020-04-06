<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisEstadia\Http\Requests\PacienteFormRequest;
use sisEstadia\Paciente;
use DB;

use Carbon\Carbon;
use Response;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;






class PacienteController extends Controller
{
    public function __construct()
    {

    }
    /*Función index que permite la la obtención la obtencion de los datos de la BD*/
    public function index(Request $request)
    {
    	/*si existe el objeto de tipo request*/
    	if($request)
    	{
            /*Variable php que almacena el objeto para realizar una busqueda*/
    		$query=trim($request->get('searchText'));
            /*Mediante una variable php se realiza una consulta a la BD*/
    		$pacientes=DB::table('Paciente as a')
    		->join('Profesion as r', 'a.idProfesion','=','r.idProfesion')
    		->select('a.idPaciente',
                     'a.nombre',
                     'a.apellido_paterno',
                     'a.apellido_materno',
                     'r.nombre as profe',
                     'a.calle',
                     'a.numero_exterior',
                     'a.numero_interior',
                     'a.colonia',
                     'a.telefono',
                     'a.correo',
                     'a.sexo',
                     'a.fecha_nacimineto',
                     'a.NSS', 
                     'a.usuario',
                     'a.contrasenia',
                     'a.conf_contrasenia',
                     'a.estado',
                     'a.municipio',
                     'a.imagen',
                     'a.edad'
                   )
    		->where('a.nombre','LIKE','%'.$query.'%')
            ->where('a.estado','=','Activo')
    		->orderBy('a.idPaciente','desc')
    		->paginate(10);
    		/*aqui es donde se crean las carpetas*/
    		return view('registro.paciente.index',["pacientes"=>$pacientes,"searchText"=>$query]);
    	}
    }


    /*Funcion que realiza la obtención de las profesiones que puede tener un fisioterapeuta*/
    public function create()
    {
    	$profesiones=DB::table('Profesion')->where('condicion','=','Activo')->get();
    	return view("registro.paciente.create",['profesiones'=>$profesiones]);   	

    }
    /*Funcion que permite agregar un nuevo paciente*/
    public function store(PacienteFormRequest $request)
    {
    	$paciente=new Paciente();
        
    	$paciente->idProfesion=$request->get('idProfesion');
    	$paciente->nombre=$request->get('nombre') ;
    	$paciente->apellido_paterno=$request->get('apellido_paterno');
    	$paciente->apellido_materno=$request->get('apellido_materno');
        $paciente->sexo=$request->get('sexo');
        $paciente->fecha_nacimineto=$request->get('fecha_nacimineto');
        $paciente->NSS=$request->get('NSS');
        $paciente->estado='Activo';
    	$paciente->calle=$request->get('calle');
    	$paciente->numero_exterior=$request->get('numero_exterior');
    	$paciente->numero_interior=$request->get('numero_interior');
    	$paciente->colonia=$request->get('colonia');
        $paciente->municipio=$request->get('municipio');

    	$paciente->telefono=$request->get('telefono');    	
    	$paciente->correo=$request->get('correo');
    	
    	
    	$paciente->usuario=$request->get('usuario');
    	$paciente->contrasenia=$request->get('contrasenia');
    	$paciente->conf_contrasenia=$request->get('conf_contrasenia');


        $x = Carbon::parse($paciente->fecha_nacimineto)->age; // 1990-10-25
        $paciente->edad=$x;
        //dump($x); // 26
    	
    	if(Input::hasFile('imagen'))
    	{
    		$file=Input::file('imagen');
    		$file->move(public_path().'/imagenes/pacientes/',$file->getClientOriginalName());
    		$paciente->imagen=$file->getClientOriginalName();
    	}
    	$paciente->save();
    	/*Despues de realizar la accion deberá de mandarme a la pagina principal del index*/
    	return Redirect::to('registro/paciente');
    }


    /*Función que permite realizar una vista de la tabla paciene*/
    public function show($id)
    {
        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF','fisio.cedulaF','fisio.apellido_paternoF','fisio.apellido_maternoF','fisio.sexoF','fisio.telefonoF')
        ->where('fisio.estadoF','=','Activo')->get();

        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.edad','paci.telefono','paci.imagen','paci.correo','paci.calle','paci.numero_exterior','paci.colonia','paci.municipio')
        ->where('paci.estado','=','Activo')->get(); 

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();

        $materiales=DB::table('cMateial as mat')
        ->select(DB::raw('mat.nombreM'),'mat.idcMateial','mat.tipo_materia','mat.cantidad','mat.comentarios')->get();
         $ejercicios=DB::table('Ejercicio as eje')
        ->select(DB::raw('eje.nombreE'),'eje.repeticiones','eje.descripcion','eje.idEjercicio')->get();

    	return view("registro.paciente.show",["paciente"=>Paciente::findOrFail($id)]);
    }
    /*Función edit la encargada que permite editar a un paciente obteniendo la clave foranea que esta tabla contien*/
    
    public function edit($id)
    {
    	$paciente=Paciente::findOrFail($id);
    	$profesiones=DB::table('Profesion')->where('condicion','=','Activo')->get();

    	return view("registro.paciente.edit",["paciente"=>$paciente,"profesiones"=>$profesiones]);
    }

 
    /*Función que se encarga de una actualización al registro del paciente */

    public function update(PacienteFormRequest $request,$id)
    {
    	$paciente=Paciente::findOrFail($id);
        
    	$paciente->idProfesion=$request->get('idProfesion');
    	$paciente->nombre=$request->get('nombre');
    	$paciente->apellido_paterno=$request->get('apellido_paterno');
    	$paciente->apellido_materno=$request->get('apellido_materno');
        $paciente->sexo=$request->get('sexo');
        $paciente->fecha_nacimineto=$request->get('fecha_nacimineto');
        $paciente->NSS=$request->get('NSS');

    	$paciente->calle=$request->get('calle');
    	$paciente->numero_exterior=$request->get('numero_exterior');
    	$paciente->numero_interior=$request->get('numero_interior');
    	$paciente->colonia=$request->get('colonia');
        $paciente->municipio=$request->get('municipio');

    	$paciente->telefono=$request->get('telefono');    	
    	$paciente->correo=$request->get('correo');
    	
    	
    	$paciente->usuario=$request->get('usuario');
    	$paciente->contrasenia=$request->get('contrasenia');
    	$paciente->conf_contrasenia=$request->get('conf_contrasenia');

        $x = Carbon::parse($paciente->fecha_nacimineto)->age; // 1990-10-25
        $paciente->edad=$x;
        //dump($edad); // 26
    	
    	if(Input::hasFile('imagen'))
    	{
    		$file=Input::file('imagen');
    		$file->move(public_path().'/imagenes/pacientes/',$file->getClientOriginalName());
    		$paciente->imagen=$file->getClientOriginalName();
    	}
    	$paciente->save();
    	return Redirect::to('registro/paciente');
    }

    /*La función destroy no elimina al paciente, solo lo deja inactivo*/

    public function destroy($id)
    {
    	$paciente=Paciente::findOrFail($id);
        $paciente->estado='Inactivo';
    	$paciente->update();
    	return Redirect::to('registro/paciente');

    }

    public function historial($id)
    {
        $historiales=DB::table('Consulta as c')
            ->join('Paciente as p', 'c.idPaciente','=','p.idPaciente')
            ->join ('Fisioterapeuta as f', 'c.idFisioterapeuta','=','f.idFisioterapeuta')
            ->join ('cEstudio as est', 'c.idcEstudio','=','est.idcEstudio')
            ->join ('cLesion as cl', 'c.idcLesion','=','cl.idcLesion')
            ->join ('cMateial as mat', 'c.idcMateial','=','mat.idcMateial')
            ->join ('Ejercicio as ejer', 'c.idEjercicio','=','ejer.idEjercicio')
            ->select('c.idConsulta',
                     'c.evento',
                     'c.fecha_consulta as fc',
                     'c.edad as ed_pac',                     
                     'c.peso as peso_consulta',
                     'c.estatura as est_con',
                     'c.alergias',
                     'c.temperatura as tem_con',
                     'c.diagnostico as dia_con',
                     'c.tratamineto as tra_con',
                     'c.fecha_cita as f_c',
                     'c.hora as hr',
                     'c.estado_cita',
                     'c.seciones',
                     'c.asistencia',
                     'c.restarseciones',
                     'c.fecha_creada as f_creada',
                     'c.estado_terapia',
                     'c.comentarios_secion', 
                     'c.est_hist', 

                    /*TODOS LOS DATOS DE LA TABLA PACIENTE*/
                     'p.idPaciente as num_pac',
                     'p.telefono as tel_pac',
                     'p.nombre as nom_pac',
                     'p.apellido_paterno as pat_pac',
                     'p.apellido_materno as mat_pac',
                     'p.telefono as tel_pac',
                     'p.estado as activado',
                     'p.imagen as img_pac',
                     'p.calle as cal_pac',
                     'p.numero_exterior as nu_pac',
                     'p.colonia as col_pac',
                     'p.municipio as mun_pac',
                     'p.correo as cor_pac',
                     /*------------------------------------------*/

                     /*TODOS LOS DATOS DE LA TABLA FISIOTERAPEUTA*/
                     'f.idFisioterapeuta as id_fisio',
                     'f.nombreF as nom_fis',
                     'f.apellido_paternoF as pat_fis',
                     'f.apellido_maternoF as mat_fis',
                     'f.cedulaF as ce',
                     'f.telefonoF as telfisio',
                     /*------------------------------------------*/

                     /*TODOS LOS DAROS DE LA LESION DE LA TABLA*/
                     'cl.idcLesion as clave_les',
                     'cl.tipo_lesion as tip_les',
                     'cl.descripcion as des_les',
                     'cl.causa as cas_les',
                     'cl.prevencion as pre_les',
                     /*------------------------------------------*/

                     /* TODOS LOS DATOS DE LA TABLA ESTUDIO*/
                     'est.idcEstudio as clave_est',
                     'est.tipo_estudio as tip_est',
                     'est.cometarios as come_est',
                     /*--------------------------------------------*/ 

                     /*TODOS LOS DATOS DE LA TABLA MATERIAL*/ 
                     'mat.idcMateial as clave_mat',
                     'mat.nombreM as nom_mat',
                     'mat.tipo_materia as tip_mat',
                     'mat.cantidad as can_mat',
                     'mat.comentarios as com_mat',
                     /*--------------------------------------------*/ 

                     /*TODOS LOS DATOS DE LA TABLA EJERCICIO*/
                     'ejer.idEjercicio as clave_ejer',
                     'ejer.nombreE as nom_ejer',
                     'ejer.repeticiones as rep_ejer',
                     'ejer.descripcion as des_ejer'

                    )
            ->where('p.idPaciente','=',$id)
            ->get();



        $fisios=DB::table('Fisioterapeuta as fisio')
        ->select(DB::raw('CONCAT(fisio.nombreF," ",fisio.apellido_paternoF," ",fisio.apellido_maternoF) AS fisiocompleto'),'fisio.idFisioterapeuta','fisio.nombreF','fisio.cedulaF','fisio.apellido_paternoF','fisio.apellido_maternoF','fisio.sexoF','fisio.telefonoF')
        ->where('fisio.estadoF','=','Activo')->get();

        $pacientes=DB::table('Paciente as paci')
        ->select(DB::raw('CONCAT(paci.nombre," ",paci.apellido_paterno," ",paci.apellido_materno) AS completo'),'paci.idPaciente','paci.nombre','paci.apellido_paterno','paci.apellido_materno','paci.sexo','paci.edad','paci.telefono','paci.imagen','paci.correo','paci.calle','paci.numero_exterior','paci.colonia','paci.municipio')
        ->where('paci.estado','=','Activo')->get(); 

        $lesiones=DB::table('cLesion as les')
        ->select(DB::raw('les.tipo_lesion'),'les.idcLesion','les.causa','les.prevencion','les.descripcion')->get();

        $estudios=DB::table('cEstudio as est')
        ->select(DB::raw('est.tipo_estudio'),'est.idcEstudio','est.cometarios')->get();

        $materiales=DB::table('cMateial as mat')
        ->select(DB::raw('mat.nombreM'),'mat.idcMateial','mat.tipo_materia','mat.cantidad','mat.comentarios')->get();
         $ejercicios=DB::table('Ejercicio as eje')
        ->select(DB::raw('eje.nombreE'),'eje.repeticiones','eje.descripcion','eje.idEjercicio')->get();

        $pac=Paciente::findOrFail($id);
        $profesiones=DB::table('Profesion')->where('condicion','=','Activo')->get();

        return view("registro.paciente.historial",['historiales'=>$historiales,'pac'=>$pac,'pacientes'=>$pacientes,'fisios'=>$fisios,'lesiones'=>$lesiones,'estudios'=>$estudios,'materiales'=>$materiales,'ejercicios'=>$ejercicios]);       
    }

}
