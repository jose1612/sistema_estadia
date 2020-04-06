<?php

namespace sisEstadia;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    /*Se declara una variable de tipo protected una variable php y le vamos a indicar que va hacer referencia a la tabla Horario*/
    protected $table='Horario';

    /*Se declara una variable de tipo protected,una variable php utilizando el estandar de escritura UpperCamelCase que hace referencia a la lleve primaria de la tabla Horario*/
    protected $primaryKey="idHorario";

   /*Laravel automáticamente permite adicionar a la tabla dos columnas, estas permiten identificar cuando se ha actualizado el registro*/
    public $timestamps=false;

    /*Se especifican los campos que seran almacenados en la base de datos, mediante una variable de tipo fillable como un arreglo.
    Los campos que seran almacenados deberan de ser los campos que se enciuentran establecidos en la base de datos*/  
    protected $fillable =[
    	'turno',
        'inicio',
    	'fin',
    	'cupo',
        'condicion'
    ];

    protected $guarded =[
    	
    ];
}
