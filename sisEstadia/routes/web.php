<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mi_primer', function () {
    return 'hola';
});

/* Grupo de rutas para la gestion de una material mediante el controlador de material*/
Route::resource('graficas/graficaProfesion','EstadisticasClientesController');

Route::resource('graficas/graficaSexo','SexoController');
Route::resource('graficas/sexoFisio','SexoFisioController');


/* Grupo de rutas para la gestion de una material mediante el controlador de material*/
Route::resource('registro/material','MaterialController');

/* Grupo de rutas para la gestion de una profesion mediante el controlador de profesion*/
Route::resource('registro/profesion','ProfesionController');

/* Grupo de rutas para la gestion de una ejercicio mediante el controlador de ejercicio*/
Route::resource('registro/ejercicio','EjercicioController');

/* Grupo de rutas para la gestion de una especialidad mediante el controlador de especialidad*/
Route::resource('registro/especialidad','EspecialidadController');

/* Grupo de rutas para la gestion de una paciente mediante el controlador de paciente*/
Route::resource('registro/paciente','PacienteController');

/* Grupo de rutas para la gestion de una index mediante el controlador de index*/
Route::resource('tablero/index','TableroController');

/* Grupo de rutas para la gestion de una fisioterapeuta mediante el controlador de fisioterapeuta*/
Route::resource('registro/fisioterapeuta','FisioterapeutaController');

/* Grupo de rutas para la gestion de una horario mediante el controlador de horario*/
Route::resource('registro/horario','HorarioController');

/* Grupo de rutas para la gestion de una horario mediante el controlador de horario*/
Route::resource('registro/estudio','EstudioController');

/* Grupo de rutas para la gestion de una especialidad mediante el controlador de especialidad*/
Route::resource('registro/especialidad','EspecialidadController');

/* Grupo de rutas para la gestion de una dia mediante el controlador de dia*/
Route::resource('registro/dia','DiaController');

/* Grupo de rutas para la gestion de una consulta mediante el controlador de consulta*/
Route::resource('vconsulta/consulta','ConsultaController');

/* Grupo de rutas para la gestion de una terapia mediante el controlador de terapia*/
Route::resource('vconsulta/terapia','TerapiaController');

/* Grupo de rutas para la gestion de una cita mediante el controlador de cita*/
Route::resource('vconsulta/cita','CitaController');


/* Grupo de rutas para la gestion de una cita mediante el controlador de cita*/
Route::resource('vconsulta/asignar','AsignarController');


/* Grupo de rutas para la gestion de una lesion mediante el controlador de lesion*/
Route::resource('registro/lesion','LesionController');

/* Se crea una ruta de tipo get que permite crear un PDF de las recomendaciones de la consulta*/
Route::get('vconsulta/consulta/pdf/{id}','ConsultaController@pdf');

/* Se crea una ruta de tipo get que permite crear un PDF de las recomendaciones de la cita*/
Route::get('vconsulta/cita/pdf/{id}','CitaController@pdf');

/* Se crea una ruta de tipo get que permite crear un PDF de las recomendaciones de la Historial*/
Route::get('registro/paciente/historial/{id}','PacienteController@historial');




/*Se crea una ruta de tipo get para realizar el respaldo de la base de datos*/
Route::get('/backup',['as'=>'backup','uses'=>'BackupController@index']);
/*Se crea una ruta de tipo get para crear el respaldo de la base de datos*/
Route::get('backup/create',['as'=>'createBackup','uses'=>'BackupController@create']);
/*Se crea una ruta de tipo get para descargar el respaldo de la base de datos*/
Route::get('backup/download/{file_name}',['as'=>'backupDownload','uses'=>'BackupController@download']);
/*Se crea una ruta de tipo get para eliminar el respaldo de la base de datos*/
Route::get('backup/delete/{file_name}', ['as'=>'backupDelete','uses'=>'BackupController@delete']);
/*Se crea una ruta para la autenticacion de los usuarios*/


/* Grupo de rutas para la gestion de una cita mediante el controlador de cita*/
Route::resource('vconsulta/historial','HistorialController');


Auth::routes();


