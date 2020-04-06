<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;

use sisEstadia\Http\Requests;
use sisEstadia\Especialidad;
use Illuminate\Support\Facades\Redirect;
use sisEstadia\Http\Requests\EspecialidadFormRequest;
use DB;

class EspecialidadController extends Controller
{
    //
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	/*si existe el objeto*/
    	if($request)
    	{
    		/*podre obtener todos los registros de la base de datos*/
    		$query=trim($request->get('searchText'));
    		/*                  se coloca el nombre de la tabla en donde se obtendran los registros*/
    		$especialidades=DB::table('Especialidad')->where('nombre','LIKE','%'.$query.'%')
    		->where ('condicion','=','1')
    		->orderBy('idEspecialidad','desc')
    		->paginate(5);
    		/*aqui es donde se crean las carpetas*/
    		return view('registro.especialidad.index',["especialidades"=>$especialidades,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	return view("registro.especialidad.create");   	

    }

    public function store(EspecialidadFormRequest $request)
    {
    	$especialidad=new Especialidad();
    	$especialidad->nombre=$request->get('nombre');
    	
    	$especialidad->condicion='1';
    	$especialidad->save();
    	/*Despues de realizar la accion deberá de mandarme a la pagina principal del index*/
    	return Redirect::to('registro/especialidad');
    }

    public function show($id)
    {

        /*en esta seccion se realizo un cambi o de letra por mayuscula*/
    	return view("registro.especialidad.show",["especialidad"=>Especialidad::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("registro.especialidad.edit",["especialidad"=>Especialidad::findOrFail($id)]);
    }

    public function update(EspecialidadFormRequest $request,$id)
    {
    	$especialidad=Especialidad::findOrFail($id);
    	$especialidad->nombre=$request->get('nombre');
    	$especialidad->update();
    	return Redirect::to('registro/especialidad');
    }

    public function destroy($id)
    {
    	
        $especialidad=Especialidad::findOrFail($id);
        $especialidad->condicion='0';
        $especialidad->update();
        return Redirect::to('registro/especialidad');

    }
}
