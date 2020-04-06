<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;

use sisEstadia\Http\Requests;
use sisEstadia\Horario;
use Illuminate\Support\Facades\Redirect;
use sisEstadia\Http\Requests\HorarioFormRequest;
use DB;


class HorarioController extends Controller
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
            $horarios=DB::table('Horario')->where('turno','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idHorario','desc')
            ->paginate(5);
            /*aqui es donde se crean las carpetas*/
            return view('registro.horario.index',["horarios"=>$horarios,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("registro.horario.create");       

    }

    public function store(HorarioFormRequest $request)
    {
        $horario=new Horario();
        $horario->turno=$request->get('turno');
        $horario->inicio=$request->get('inicio');
        $horario->fin=$request->get('fin');
        $horario->cupo=$request->get('cupo');        
        $horario->condicion='1';
        $horario->save();
        /*Despues de realizar la accion deberá de mandarme a la pagina principal del index*/
        return Redirect::to('registro/horario');
    }

    public function show($id)
    {

        /*en esta seccion se realizo un cambi o de letra por mayuscula*/
        return view("registro.horario.show",["horario"=>Horario::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("registro.horario.edit",["horario"=>Horario::findOrFail($id)]);
    }

    public function update(HorarioFormRequest $request,$id)
    {
        $horario=Horario::findOrFail($id);
        $horario->turno=$request->get('turno');
        $horario->inicio=$request->get('inicio');
        $horario->fin=$request->get('fin');
        $horario->cupo=$request->get('cupo');
        $horario->update();
        return Redirect::to('registro/horario');
    }

    public function destroy($id)
    {
        
        $horario=Horario::findOrFail($id);
        $horario->condicion='0';
        $horario->update();
        return Redirect::to('registro/horario');

    }
}
