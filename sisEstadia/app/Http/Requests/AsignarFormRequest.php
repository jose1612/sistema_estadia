<?php

namespace sisEstadia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignarFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'idFisioterapeuta'=>'',
            'idPaciente'=>'',   
            'idcEstudio'=>'',            
            'idcLesion'=>'',
            'idcMateial'=>'',
            'idEjercicio'=>'', 
            'idTerapia'=>'',     

            'seciones'=>'',
            'estado_terapia'=>'',
            'restarseciones'=>'',
            'asistencia'=>'',
            'comentarios_secion'=>'required',
            'condicion'=>''
        ];
    }
}
