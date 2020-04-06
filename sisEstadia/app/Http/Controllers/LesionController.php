<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;

use sisEstadia\Http\Requests;
use sisEstadia\Lesion;
use Illuminate\Support\Facades\Redirect;
use sisEstadia\Http\Requests\LesionFormRequest;
use DB;

class LesionController extends Controller
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
            $lesiones=DB::table('cLesion')->where('tipo_lesion','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orderBy('idcLesion','desc')
            ->paginate(3);
            /*aqui es donde se crean las carpetas*/
            return view('registro.lesion.index',["lesiones"=>$lesiones,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("registro.lesion.create");      

    }

    public function store(LesionFormRequest $request)
    {
        $lesion=new Lesion();
        $lesion->tipo_lesion=$request->get('tipo_lesion');
        $lesion->descripcion=$request->get('descripcion');
        $lesion->causa=$request->get('causa');
        $lesion->prevencion=$request->get('prevencion');
        $lesion->condicion='1';
        $lesion->save();
        /*Despues de realizar la accion deberá de mandarme a la pagina principal del index*/
        return Redirect::to('registro/lesion');
    }

    public function show($id)
    {

        /*en esta seccion se realizo un cambi o de letra por mayuscula*/
        return view("registro.lesion.show",["lesion"=>Lesion::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("registro.lesion.edit",["lesion"=>Lesion::findOrFail($id)]);
    }

    public function update(LesionFormRequest $request,$id)
    {
        $lesion=Lesion::findOrFail($id);
        $lesion->tipo_lesion=$request->get('tipo_lesion');
        $lesion->descripcion=$request->get('descripcion');
        $lesion->causa=$request->get('causa');
        $lesion->prevencion=$request->get('prevencion');
        $lesion->update();
        return Redirect::to('registro/lesion');
    }

    public function destroy($id)
    {
        /*$lesion=Lesion::findOrFail($id);
        $lesion->delete();
        return Redirect::to('registro/lesion');*/

        $lesion=Lesion::findOrFail($id);
        $lesion->delete();
        return Redirect::to('registro/lesion');

    }
}
