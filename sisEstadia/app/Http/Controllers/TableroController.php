<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisEstadia\Http\Requests\TableroFormRequest;
use sisEstadia\Fisioterapeuta;
use sisEstadia\Paciente;
use sisEstadia\Cita;
use sisEstadia\Consulta;
use DB;

class TableroController extends Controller
{
     public function __construct()
    {

    }

     public function getUltimoDiaMes($elAnio,$elMes) {
     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }


/*
    public function registros_mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $usuarios=User::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($usuarios);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($usuarios as $usuario){
        $diasel=intval(date("d",strtotime($usuario->created_at) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }

*/
    public function lesiones_atendidas(){
        /*tipospublicacion=consulta*/
        /*ctp==c*/
        $la=Consulta::all();
        $ctp=count($la)
        ->where('evento','=','cita');
        /*publicaciones=lesion*/
        $lesiones=cLesion::all();
        $ct=count($lesiones);
        /**/
        for($i=0;$i<=$ctp-1;$i++){
         $idTP=$la[$i]->id;
         $numlesion[$idTP]=0;
        }

        for($i=0;$i<=$ct-1;$i++){
         $idTP=$lesiones[$i]->idConsulta;
         $numlesion[$idTP]++;
           
        }

        $data=array("totaltipos"=>$ctp,"tipos"=>$lesiones, "numerodepubli"=>$numlesion);
        return json_encode($data);
    }


    public function index()
    {

        $contar = Fisioterapeuta::where('estadoF','Activo')->count();
        $contar2 = Paciente::where('estado','Activo')->count();
        $contar4 = Consulta::where('evento','Consulta')->count();
        $contar3 = Cita::where('evento','Cita')->count();


        $pastel = DB::select("SELECT profe.nombre, count('paci.idProfesion') as total
                 FROM paciente as paci 
                 INNER JOIN profesion as profe
                 ON paci.idProfesion =profe.idProfesion 
                 GROUP BY profe.nombre");
        

        return view('tablero.index',['contar2'=>$contar2,'contar'=>$contar,'contar4'=>$contar4,'contar3'=>$contar3,'pastel'=>$pastel,]);
    }



    /*
    public function create()
    {



    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
    */
}
