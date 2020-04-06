<?php

namespace sisEstadia\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PacienteFormRequest extends FormRequest
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

            'idProfesion'=>'required',
            'nombre'=>'required|max:20',
            'apellido_paterno'=>'required|max:20',
            'apellido_materno'=>'required|max:20',
            'sexo'=>'required|max:10',
            'fecha_nacimineto'=>'required|max:20',
            'NSS'=>'max:30', 
            'calle'=>'required|max:20',
            'numero_exterior'=>'required|max:20',
            'numero_interior'=>'max:4',
            'colonia'=>'required|max:20',
            'municipio'=>'required|max:45',
            'telefono'=>'required|max:10',     
            'correo'=>'max:30',           
            'usuario'=>'required|max:15',
            'contrasenia'=>'required|max:15',
            'conf_contrasenia'=>'required|max:15',           
            'imagen'=>'mimes:jpeg,bmp,png',
            'edad'=>''
        ];
        
    }
}
