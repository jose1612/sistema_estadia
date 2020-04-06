<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;

use sisEstadia\Http\Requests;
use sisEstadia\Ejercicio;
use Illuminate\Support\Facades\Redirect;
use sisEstadia\Http\Requests\EjercicioFormRequest;
use DB;


class EjercicioController extends Controller
{
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
            $ejercicios=DB::table('Ejercicio')->where('nombreE','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idEjercicio','desc')
            ->paginate(8);
            /*aqui es donde se crean las carpetas*/
            return view('registro.ejercicio.index',["ejercicios"=>$ejercicios,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("registro.ejercicio.create");       

    }

    public function store(EjercicioFormRequest $request)
    {
        $ejercicio=new Ejercicio();
        $ejercicio->nombreE=$request->get('nombreE');
        $ejercicio->repeticiones=$request->get('repeticiones');
        $ejercicio->descripcion=$request->get('descripcion');
        $ejercicio->condicion='1';
        $ejercicio->save();
        /*Despues de realizar la accion deberá de mandarme a la pagina principal del index*/
        return Redirect::to('registro/ejercicio');
    }

    public function show($id)
    {

        /*en esta seccion se realizo un cambi o de letra por mayuscula*/
        return view("registro.ejercicio.show",["ejercicio"=>Ejercicio::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("registro.ejercicio.edit",["ejercicio"=>Ejercicio::findOrFail($id)]);
    }

    public function update(EjercicioFormRequest $request,$id)
    {
        $ejercicio=Ejercicio::findOrFail($id);
        $ejercicio->nombreE=$request->get('nombreE');
        $ejercicio->repeticiones=$request->get('repeticiones');
        $ejercicio->descripcion=$request->get('descripcion');
        $ejercicio->update();
        return Redirect::to('registro/ejercicio');
    }

    public function destroy($id)
    {
        $ejercicio=Ejercicio::findOrFail($id);
        
        $ejercicio->delete();
        return Redirect::to('registro/ejercicio');
        /*
        $ejercicio=Ejercicio::findOrFail($id);
        $ejercicio->delete();
        return Redirect::to('registro/ejercicio');
        */

    }

}
