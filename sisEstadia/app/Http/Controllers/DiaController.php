<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisEstadia\Http\Requests\DiaFormRequest;
use sisEstadia\Dia;
use DB;

class DiaController extends Controller
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
            
            $query=trim($request->get('searchText'));
            $dias=DB::table('Dia as d')
            ->join('Fisioterapeuta as f','d.idFisioterapeuta','=','f.idFisioterapeuta')
            ->join('Horario as h','d.idHorario','=','h.idHorario')
            ->select('d.idDia',
                     'd.nombre',
            		 'd.condicion',
            		 'f.nombreF as fisio',
            		 'h.turno as tur',
                     'h.inicio as in',
                     'h.fin as fi',
                     'h.cupo as cupo')
            ->where('d.nombre','LIKE','%'.$query.'%')
            ->where ('d.condicion','=','1')
            ->orderBy('d.idDia','desc')
            ->paginate(10);
            /*aqui es donde se crean las carpetas*/
            return view('registro.dia.index',["dias"=>$dias,"searchText"=>$query]);
        }
    }

    public function create()
    {
       
        $fisios=DB::table('Fisioterapeuta')->where('estadoF','=','Activo')->get();
        $horarios=DB::table('Horario')->where('condicion','=','1')->get();

    	return view("registro.dia.create",['horarios'=>$horarios, 'fisios'=>$fisios]);       

    }

    public function store(DiaFormRequest $request)
    {
        $dia=new Dia();
        $dia->idFisioterapeuta=$request->get('idFisioterapeuta');
        $dia->idHorario=$request->get('idHorario');
        $dia->nombre=$request->get('nombre');
        $dia->condicion='1';
        $dia->save();
        /*Despues de realizar la accion deberá de mandarme a la pagina principal del index*/
        return Redirect::to('registro/dia');
    }

    public function show($id)
    {

        /*en esta seccion se realizo un cambi o de letra por mayuscula*/
        return view("registro.dia.show",["dia"=>Dia::findOrFail($id)]);
    }

    public function edit($id)
    {
        $dia=Dia::findOrFail($id);
        
        $fisios=DB::table('Fisioterapeuta')->where('estadoF','=','Activo')->get();
        $horarios=DB::table('Horario')->where('condicion','=','1')->get();

       return view("registro.dia.edit",["dia"=>$dia,"fisios"=>$fisios,"horarios"=>$horarios]);

    }

    public function update(DiaFormRequest $request,$id)
    {
        $dia=Dia::findOrFail($id);
        $dia->idFisioterapeuta=$request->get('idFisioterapeuta');
        $dia->idHorario=$request->get('idHorario');
        $dia->nombre=$request->get('nombre');
        $dia->update();
        return Redirect::to('registro/dia');
    }

    public function destroy($id)
    {
        
        $dia=Dia::findOrFail($id);
        $dia->condicion='0';
        $dia->update();
        return Redirect::to('registro/dia');

    }
}
