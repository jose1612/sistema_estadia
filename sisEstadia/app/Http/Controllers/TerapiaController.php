<?php

namespace sisEstadia\Http\Controllers;
use Illuminate\Http\Request;
use sisEstadia\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisEstadia\Http\Requests\TerapiaFormRequest;
use sisEstadia\Terapia;
use DB;


class TerapiaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if($request)
        {
            
            $query=trim($request->get('searchText'));

            $terapia=DB::table('Terapia')->where('nombreTerapia','LIKE','%'.$query.'%')
            ->where ('estadoTerapia','=','Activa')
            ->orderBy('idTerapia','desc')
            ->paginate(8);
            /*aqui es donde se crean las carpetas*/
            return view('vconsulta.terapia.index',["terapia"=>$terapia,"searchText"=>$query]);
        }
        
    }

    public function create()
    {
    	return view("vconsulta.terapia.create"); 
        
    }

    public function store(TerapiaFormRequest $request)
    {
    	$terapia = new Terapia();
    	$terapia->nombreTerapia=$request->get('nombreTerapia');
    	$terapia->dia_1=$request->get('dia_1');
        $terapia->dia_2=$request->get('dia_2');
        $terapia->dia_3=$request->get('dia_3');
        $terapia->dia_4=$request->get('dia_4');
        $terapia->dia_5=$request->get('dia_5');
        $terapia->hrInicio=$request->get('hrInicio');
        $terapia->hrFin=$request->get('hrFin');
        $terapia->cupo=$request->get('cupo');
        $terapia->secTer=$request->get('secTer');
        $terapia->edadInicio=$request->get('edadInicio');
        $terapia->edadFin=$request->get('edadFin');
        $terapia->video=$request->get('video');
        $terapia->comenTerapia=$request->get('comenTerapia');
        $terapia->estadoTerapia=$request->get('estadoTerapia');
        $terapia->save();
    		
        return Redirect::to('vconsulta/terapia');
    }

    public function show($id)
    {
    	return view("vconsulta.terapia.show",["terapia"=>Terapia::findOrFail($id)]);
    }

    public function edit($id)
    {
       return view("vconsulta.terapia.edit",["terapia"=>Terapia::findOrFail($id)]);
    }

    public function update(TerapiaFormRequest $request,$id)
    {
        
    	$terapia=Terapia::findOrFail($id);
    	$terapia->nombreTerapia=$request->get('nombreTerapia');
        $terapia->dia_1=$request->get('dia_1');
        $terapia->dia_2=$request->get('dia_2');
        $terapia->dia_3=$request->get('dia_3');
        $terapia->dia_4=$request->get('dia_4');
        $terapia->dia_5=$request->get('dia_5');
        $terapia->hrInicio=$request->get('hrInicio');
        $terapia->hrFin=$request->get('hrFin');
        $terapia->cupo=$request->get('cupo');
        $terapia->secTer=$request->get('secTer');
        $terapia->edadInicio=$request->get('edadInicio');
        $terapia->edadFin=$request->get('edadFin');
        $terapia->video=$request->get('video');
        $terapia->comenTerapia=$request->get('comenTerapia');
        $terapia->update();
        return Redirect::to('vconsulta/terapia');

    }

    public function destroy($id)
    {
    	$terapia=Terapia::findOrFail($id);
        /*$terapia->estadoTerapia='Inactiva';*/
        $terapia->delete();
        return Redirect::to('vconsulta/terapia');
    }
}
