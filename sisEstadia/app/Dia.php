<?php

namespace sisEstadia;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    /*Se declara una variable de tipo protected una variable php y le vamos a indicar que va hacer referencia a la tabla Dia*/
    protected $table='Dia';

    /*Se declara una variable de tipo protected,una variable php utilizando el estandar de escritura UpperCamelCase que hace referencia a la lleve primaria de la tabla Dia*/
    protected $primaryKey="idDia";

    /*Laravel automáticamente permite adicionar a la tabla dos columnas, estas permiten identificar cuando se ha actualizado el registro*/
    public $timestamps=false;

    /*Se especifican los campos que seran almacenados en la base de datos, mediante una variable de tipo fillable como un arreglo.
    Los campos que seran almacenados deberan de ser los campos que se encuentran establecidos en la base de datos*/
    protected $fillable =[
    	'idFisioterapeuta',
    	'idHorario',
    	'nombre',
    	'condicion'
    ];

    protected $guarded =[
    	
    ];
}
