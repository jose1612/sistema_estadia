<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;
use sisEstadia\Profesion;
use Illuminate\Support\Facades\Redirect;
use sisEstadia\Http\Requests\ProfesionFormRequest;
use DB;

class ProfesionController extends Controller
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
    		$profesiones=DB::table('Profesion')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','Activo')
    		->orderBy('idProfesion','desc')
    		->paginate(15);
    		/*aqui es donde se crean las carpetas*/
    		return view('registro.profesion.index',["profesiones"=>$profesiones,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	return view("registro.profesion.create");   	

    }

    public function store(ProfesionFormRequest $request)
    {
    	$profesion=new Profesion();
    	$profesion->nombre=$request->get('nombre');
    	
    	$profesion->condicion='Activo';
    	$profesion->save();
    	/*Despues de realizar la accion deberá de mandarme a la pagina principal del index*/
    	return Redirect::to('registro/profesion');
    }

    public function show($id)
    {

        /*en esta seccion se realizo un cambi o de letra por mayuscula*/
    	return view("registro.profesion.show",["profesion"=>Profesion::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("registro.profesion.edit",["profesion"=>Profesion::findOrFail($id)]);
    }

    public function update(ProfesionFormRequest $request,$id)
    {
    	$profesion=Profesion::findOrFail($id);
    	$profesion->nombre=$request->get('nombre');
        
    	$profesion->update();
    	return Redirect::to('registro/profesion');
    }

    public function destroy($id)
    {
    	
        $profesion=Profesion::findOrFail($id);
        $profesion->condicion='Inactivo';
        $profesion->update();
        return Redirect::to('registro/profesion');

    }
}
