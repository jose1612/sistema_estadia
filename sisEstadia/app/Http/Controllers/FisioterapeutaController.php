<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisEstadia\Http\Requests\FisioterapeutaFormRequest;
use sisEstadia\Fisioterapeuta;
use DB;


class FisioterapeutaController extends Controller
{
   
     public function __construct()
    {

    }
    public function index(Request $request)
    {
    	/*si existe el objeto*/
    	if($request)
    	{
    		$query=trim($request->get('searchText'));
    		$fisios=DB::table('Fisioterapeuta as f')
    		->join('Especialidad as e', 'f.idEspecialidad','=','e.idEspecialidad')
    		->select('f.idFisioterapeuta',
                     'f.nombreF',
                     'f.apellido_paternoF',
                     'f.apellido_maternoF',
                     'f.sexoF',
                     'f.fecha_naciminetoF',                     
                     'f.NSSF',
                     'f.estadoF',
                     'f.fecha_ingresoF',
                     'f.cedulaF', 
                     'e.nombre as especial',
                     'f.calleF',
                     'f.numero_exteriorF',
                     'f.numero_interiorF',
                     'f.coloniaF',
                     'f.municipioF',
                     'f.correoF',
                     'f.telefonoF',   
                	 'f.usuarioF',
                     'f.contraseniaF',
                     'f.conf_contraseniaF',                     
                     'f.imagenF'
                     )


    		->where('f.nombreF','LIKE','%'.$query.'%')
            ->where('f.estadoF','=','Activo')
    		->orderBy('f.idFisioterapeuta','desc')
    		->paginate(7);
    		/*aqui es donde se crean las carpetas*/
    		return view('registro.fisioterapeuta.index',["fisios"=>$fisios,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	$especialidades=DB::table('Especialidad')->where('condicion','=','1')->get();
    	return view("registro.fisioterapeuta.create",['especialidades'=>$especialidades]);   	

    }

    public function store(FisioterapeutaFormRequest $request)
    {
    	$fisio=new Fisioterapeuta();

    	$fisio->idEspecialidad=$request->get('idEspecialidad');
    	$fisio->nombreF=$request->get('nombreF');
    	$fisio->apellido_paternoF=$request->get('apellido_paternoF');
    	$fisio->apellido_maternoF=$request->get('apellido_maternoF');
        $fisio->sexoF=$request->get('sexoF');
        $fisio->fecha_naciminetoF=$request->get('fecha_naciminetoF');
        $fisio->NSSF=$request->get('NSSF');
        $fisio->estadoF='Activo';
        $fisio->fecha_ingresoF=$request->get('fecha_ingresoF');
        $fisio->cedulaF=$request->get('cedulaF');

    	$fisio->calleF=$request->get('calleF');
    	$fisio->numero_exteriorF=$request->get('numero_exteriorF');
    	$fisio->numero_interiorF=$request->get('numero_interiorF');
    	$fisio->coloniaF=$request->get('coloniaF');
        $fisio->municipioF=$request->get('municipioF');

    	$fisio->telefonoF=$request->get('telefonoF');    	
    	$fisio->correoF=$request->get('correoF');
    	
    	
    	$fisio->usuarioF=$request->get('usuarioF');
    	$fisio->contraseniaF=$request->get('contraseniaF');
    	$fisio->conf_contraseniaF=$request->get('conf_contraseniaF');
    	
    	

    	if(Input::hasFile('imagenF'))
    	{
    		$file=Input::file('imagenF');
    		$file->move(public_path().'/imagenes/fisioterapeutas/',$file->getClientOriginalName());
    		$fisio->imagenF=$file->getClientOriginalName();
    	}
    	$fisio->save();
    	/*Despues de realizar la accion deberá de mandarme a la pagina principal del index*/
    	return Redirect::to('registro/fisioterapeuta');
    }

    public function show($id)
    {

        /*en esta seccion se realizo un cambi o de letra por mayuscula*/
    	return view("registro.fisioterapeuta.show",["fisio"=>Fisioterapeuta::findOrFail($id)]);
    }

    public function edit($id)
    {
    	$fisio=Fisioterapeuta::findOrFail($id);
    	$especialidades=DB::table('Especialidad')->where('condicion','=','1')->get();

    	return view("registro.fisioterapeuta.edit",["fisio"=>$fisio,"especialidades"=>$especialidades]);
    }

    public function update(FisioterapeutaFormRequest $request,$id)
    {
    	$fisio=Fisioterapeuta::findOrFail($id);
        
    	$fisio->idEspecialidad=$request->get('idEspecialidad');
    	$fisio->nombreF=$request->get('nombreF');
    	$fisio->apellido_paternoF=$request->get('apellido_paternoF');
    	$fisio->apellido_maternoF=$request->get('apellido_maternoF');
        $fisio->sexoF=$request->get('sexoF');
        $fisio->fecha_naciminetoF=$request->get('fecha_naciminetoF');
        $fisio->NSSF=$request->get('NSSF');
        $fisio->fecha_ingresoF=$request->get('fecha_ingresoF');
        $fisio->cedulaF=$request->get('cedulaF');

    	$fisio->calleF=$request->get('calleF');
    	$fisio->numero_exteriorF=$request->get('numero_exteriorF');
    	$fisio->numero_interiorF=$request->get('numero_interiorF');
    	$fisio->coloniaF=$request->get('coloniaF');
        $fisio->municipioF=$request->get('municipioF');

    	$fisio->telefonoF=$request->get('telefonoF');    	
    	$fisio->correoF=$request->get('correoF');
    	
    	
    	$fisio->usuarioF=$request->get('usuarioF');
    	$fisio->contraseniaF=$request->get('contraseniaF');
    	$fisio->conf_contraseniaF=$request->get('conf_contraseniaF');
    	
    	if(Input::hasFile('imagenF'))
    	{
    		$file=Input::file('imagenF');
    		$file->move(public_path().'/imagenes/fisioterapeutas/',$file->getClientOriginalName());
    		$fisio->imagenF=$file->getClientOriginalName();
    	}
    	$fisio->save();
    	return Redirect::to('registro/fisioterapeuta');
    }

    public function destroy($id)
    {
    	$fisio=Fisioterapeuta::findOrFail($id);
        $fisio->estadoF='Inactivo';
    	$fisio->update();
    	return Redirect::to('registro/fisioterapeuta');

    }

}
