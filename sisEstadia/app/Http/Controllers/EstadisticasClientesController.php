<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;

class EstadisticasClientesController extends Controller
{
    //
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

       $pastel = DB::select("SELECT profe.nombre, count('paci.idProfesion') as total
		         FROM paciente as paci 
		         INNER JOIN profesion as profe
        		 ON paci.idProfesion =profe.idProfesion 
        		 GROUP BY profe.nombre");

       return view('graficas.graficaProfesion.index',["pastel"=>$pastel]);

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
