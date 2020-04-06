<?php

namespace sisEstadia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaFormRequest extends FormRequest
{
   /**
     * Determina si el usuario está autorizado a realizar un Request
     *
     * @return bool
     */
    public function authorize()
    {
        /* Se modifica la autorización a true para autorizar hacer el Request */
        return true;
    }

    /**
     * Obtener las reglas de validación que se aplican al Request.
     *
     * @return array
     */
    public function rules()
    {
        /*Sección donde se agregan las reglas, 
            - Esta sección se encuentra ligada a los modelos, debido a que contiene 
              los campos que deberán ser almacenados en la base de datos 
              se agregan los objetos y se determina si son requeridos, el tipo y tamaño del objeto.
        */
        return [

            'idFisioterapeuta'=>'required',
            'idPaciente'=>'required',   
            'idcEstudio'=>'required',            
            'idcLesion'=>'required',
            'idcMateial'=>'',
            'idEjercicio'=>'', 
            'idTerapia'=>'', 

            
            'edad'=>'required',
            'peso'=>'required',
            'alergias'=>'',
            'temperatura'=>'required',
            'diagnostico'=>'required|max:500',
            'tratamineto'=>'required|max:500',
            'estatura'=>'required',

            
        ];
        
    }
}
