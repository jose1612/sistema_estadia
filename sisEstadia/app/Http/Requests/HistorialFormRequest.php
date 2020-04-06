<?php

namespace sisEstadia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistorialFormRequest extends FormRequest
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
            'idFisioterapeuta'=>'required',
            'idPaciente'=>'required',   
            'idcEstudio'=>'required',            
            'idcLesion'=>'required',
            'idcMateial'=>'required',
            'idEjercicio'=>'required', 
            /*Consulta*/
            'diagnostico'=>'required|max:500',
            'edad'=>'required',
            'peso'=>'required',
            'alergias'=>'required',
            'temperatura'=>'required',
            'tratamineto'=>'required|max:500',
            'estatura'=>'required',
            /*Cita*/
            'fecha_cita'=>'required', 
            'hora'=>'required',
            'estado_cita'=>'required'
            /*Terapia*/
            'seciones'=>'required',
            'comentarios_secion'=>'required',
            'estado_terapia'=>'required',
            'restarseciones'=>'',
            'asistencia'=>''
        ];
    }
}
