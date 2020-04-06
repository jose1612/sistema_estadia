<?php

namespace sisEstadia;

use Illuminate\Database\Eloquent\Model;

class Fisioterapeuta extends Model
{
	/*Se declara una variable de tipo protected una variable php y le vamos a indicar que va hacer referencia a la tabla Fisioterapeuta*/
    protected $table='Fisioterapeuta';

    /*Se declara una variable de tipo protected,una variable php utilizando el estandar de escritura UpperCamelCase que hace referencia a la lleve primaria de la tabla Fisioterapeuta*/
    protected $primaryKey="idFisioterapeuta";

    /*Laravel automáticamente permite adicionar a la tabla dos columnas, estas permiten identificar cuando se ha actualizado el registro*/
    public $timestamps=false;

	/*Se especifican los campos que seran almacenados en la base de datos, mediante una variable de tipo fillable como un arreglo.
    Los campos que seran almacenados deberan de ser los campos que se enciuentran establecidos en la base de datos*/     
    protected $fillable =[    

		'idEspecialidad',

		'nombreF', 'apellido_paternoF', 'apellido_maternoF', 'sexoF', 'fecha_naciminetoF', 'NSSF',
		'estadoF', 'fecha_ingresoF', 'cedulaF', 

		'calleF', 'numero_exteriorF', 'numero_interiorF', 'coloniaF', 'municipioF', 

		'telefonoF', 'correoF', 

		'usuarioF',	'contraseniaF', 'conf_contraseniaF',		
		
		'imagenF'
    ];

    protected $guarded =[
    	/*esto solo será por si lo ocuapremos mas adelante*/
    ];
}
