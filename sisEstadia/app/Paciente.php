<?php

namespace sisEstadia;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    /*Se declara una variable de tipo protected una variable php y le vamos a indicar que va hacer referencia a la tabla Paciente*/
    protected $table='Paciente';

    /*Se declara una variable de tipo protected,una variable php utilizando el estandar de escritura UpperCamelCase que hace referencia a la lleve primaria de la tabla Paciente*/
    protected $primaryKey="idPaciente";

   /*Laravel automáticamente permite adicionar a la tabla dos columnas, estas permiten identificar cuando se ha actualizado el registro*/
    public $timestamps=false;

    /*Se especifican los campos que seran almacenados en la base de datos, mediante una variable de tipo fillable como un arreglo.
    Los campos que seran almacenados deberan de ser los campos que se enciuentran establecidos en la base de datos*/
    protected $fillable =[
    	
    	/*Datos del paciente*/
    	'idProfesion', 'nombre', 'apellido_paterno', 'apellido_materno', 'sexo', 'fecha_nacimineto', 'NSS', 'estado',		
		/*Direccion*/
		'calle', 'numero_exterior', 'numero_interior', 'colonia', 'municipio',		
		/*Contacto*/
		'telefono',	 'correo',		
		/*Conexio*/		 
		'usuario', 'contrasenia', 'conf_contrasenia', 		
		/*Foto*/		
		'imagen', 'edad'		 
    ];

    protected $guarded =[
    	
    ];
}
