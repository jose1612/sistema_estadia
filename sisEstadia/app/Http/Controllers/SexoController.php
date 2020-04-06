<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;

class SexoController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        /*si existe el objeto
        $pastel = DB::select("SELECT count('credencial') as total, estado as ubicacion
                  FROM customers INNER JOIN states 
                  ON customers.estadof_id=states.id GROUP BY ubicacion");
        */
        

       $pastel = DB::select("select sexo,
       count(case when sexo = 'Masculino' then 1 end) as mas,
       count(case when sexo = 'Femenino' then 1 end) as fem
       from Paciente
       group by sexo");     
       
       /*
        $pastel = DB::select("select sexo , count(*) as pacientes from paciente group by Masculino");*/





       return view('graficas.graficaSexo.idex',["pastel"=>$pastel]);

/*
		$pastel = DB::table('paciente as paci')
        ->selectRaw('profe.nombre, count(paci.idProfesion) as Total')
        ->join('profesion as profe', 'paci.idPaciente', '=', 'profe.idProfesion')
        ->where('paci.idProfesion', '=','profe.idProfesion')
        ->groupBy('profe.nombre')
        ->get();
*/
    }
}
