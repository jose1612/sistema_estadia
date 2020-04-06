<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SexoFisioController extends Controller
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
        

       $pastel = DB::select("select sexoF,
       count(case when sexoF = 'Masculino' then 1 end) as masF,
       count(case when sexoF = 'Femenino' then 1 end) as femF
       from Fisioterapeuta
       group by sexoF");     
       
       /*
        $pastel = DB::select("select sexo , count(*) as pacientes from paciente group by Masculino");*/





       return view('graficas.sexoFisio.index',["pastel"=>$pastel]);

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
