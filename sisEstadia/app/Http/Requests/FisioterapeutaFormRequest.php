<?php

namespace sisEstadia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FisioterapeutaFormRequest extends FormRequest
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
            //
            'idEspecialidad'=>'required',
            'nombreF'=>'required|max:20',
            'apellido_paternoF'=>'required|max:20',
            'apellido_maternoF'=>'required|max:20',
            'sexoF'=>'required|max:10',
            'fecha_naciminetoF'=> 'date',
            'NSSF'=>'max:15',
            'fecha_ingresoF'=>'date',
            'calleF'=>'required|max:20',
            'numero_exteriorF'=>'required|max:20',
            'numero_interiorF'=>'max:4',
            'coloniaF'=>'required|max:20', 
            'municipioF'=>'required|max:45',
            'telefonoF'=>'required|max:10',
            'correoF'=>'required|max:30',
            'cedulaF'=>'required|max:8',  
            'usuarioF'=>'max:15',
            'contraseniaF'=>'max:15',
            'conf_contraseniaF'=>'max:15',
            'imagenF'=>'mimes:jpeg,bmp,png'
        ];
        
    }
}
