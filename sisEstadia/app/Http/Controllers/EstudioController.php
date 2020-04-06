<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;

use sisEstadia\Http\Requests;
use sisEstadia\Estudio;
use Illuminate\Support\Facades\Redirect;
use sisEstadia\Http\Requests\EstudioFormRequest;
use DB;

class EstudioController extends Controller
{
    //
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
            $estudios=DB::table('cEstudio')->where('tipo_estudio','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orderBy('idcEstudio','desc')
            ->paginate(5);
            /*aqui es donde se crean las carpetas*/
            return view('registro.estudio.index',["estudios"=>$estudios,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("registro.estudio.create");     

    }
    /*este es para almacenar*/
    public function store(EstudioFormRequest $request)
    {
        $estudio=new Estudio();
        $estudio->tipo_estudio=$request->get('tipo_estudio');
        $estudio->cometarios=$request->get('cometarios');
        $estudio->condicion='1';
        $estudio->save();
        /*Despues de realizar la accion deberá de mandarme a la pagina principal del index*/
        return Redirect::to('registro/estudio');
    }

    public function show($id)
    {

        /*en esta seccion se realizo un cambi o de letra por mayuscula*/
        return view("registro.estudio.show",["estudio"=>Estudio::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("registro.estudio.edit",["estudio"=>Estudio::findOrFail($id)]);
    }

    public function update(EstudioFormRequest $request,$id)
    {
        $estudio=Estudio::findOrFail($id);
        $estudio->tipo_estudio=$request->get('tipo_estudio');
        $estudio->cometarios=$request->get('cometarios');
        $estudio->update();
        return Redirect::to('registro/estudio');
    }

    public function destroy($id)
    {
        /*$estudio=Estudio::findOrFail($id);
        $estudio->delete();
        return Redirect::to('registro/estudio');*/

        $estudio=Estudio::findOrFail($id);
        $estudio->delete();
        return Redirect::to('registro/estudio');

    }

}
