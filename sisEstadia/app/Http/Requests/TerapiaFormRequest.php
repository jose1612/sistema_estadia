<?php

namespace sisEstadia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerapiaFormRequest extends FormRequest
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

            'nombreTerapia'=>'required|max:50', 
            'dia_1'=>'', 
            'dia_2'=>'', 
            'dia_3'=>'', 
            'dia_4'=>'', 
            'dia_5'=>'', 
            'hrInicio'=>'required', 
            'hrFin'=>'required', 
            'cupo'=>'required', 
            'secTer'=>'required', 
            'edadInicio'=>'required', 
            'edadFin'=>'required', 
            'video'=>'', 
            'comenTerapia'=>'required', 
            'estadoTerapia'=>'',
        ];
    }
}
