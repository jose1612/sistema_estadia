<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;
use sisEstadia\Material;
use Illuminate\Support\Facades\Redirect;
use sisEstadia\Http\Requests\MaterialFormRequest;
use DB;

class MaterialController extends Controller
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
            $materiales=DB::table('cMateial')->where('nombreM','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orderBy('idcMateial','desc')
            ->paginate(3);
            /*aqui es donde se crean las carpetas*/
            return view('registro.material.index',["materiales"=>$materiales,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("registro.material.create");    

    }

    public function store(MaterialFormRequest $request)
    {
        $material=new Material();
        $material->nombreM=$request->get('nombreM');
        $material->tipo_materia=$request->get('tipo_materia');
        $material->cantidad=$request->get('cantidad');
        $material->comentarios=$request->get('comentarios');
        $material->condicion='1';
        $material->save();
        /*Despues de realizar la accion deberá de mandarme a la pagina principal del index*/
        return Redirect::to('registro/material');
    }

    public function show($id)
    {

        /*en esta seccion se realizo un cambi o de letra por mayuscula*/
        return view("registro.material.show",["material"=>Material::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("registro.material.edit",["material"=>Material::findOrFail($id)]);
    }

    public function update(MaterialFormRequest $request,$id)
    {
        $material=Material::findOrFail($id);
        $material->nombreM=$request->get('nombreM');
        $material->tipo_materia=$request->get('tipo_materia');
        $material->cantidad=$request->get('cantidad');
        $material->comentarios=$request->get('comentarios');
        $material->update();
        return Redirect::to('registro/material');
    }

    public function destroy($id)
    {
        /*$material=Material::findOrFail($id);
        $material->delete();
        return Redirect::to('registro/material');*/
        $material=Material::findOrFail($id);
        $material->condicion='0';
        $material->update();
        return Redirect::to('registro/material');

    }


}
