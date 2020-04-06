<?php

namespace sisEstadia\Http\Controllers;

use Illuminate\Http\Request;
use sisEstadia\Http\Requests;


use Alert;
use Artisan;
use Carbon\Carbon;
use Log;
use Storage;

class BackupController extends Controller
{

	public function __construct()
    {
        
    }
   /*Se crea el metodo index para realizar el respaldo de l abase de datos*/
    public function index()
    {
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        $files = $disk->files(config('laravel-backup.backup.name'));
        $backups = [];
        foreach ($files as $k => $f) {
            if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace(config('laravel-backup.backup.name') . '/', '', $f),
                    'file_size' => $this->human_filesize($disk->size($f)),
                    'last_modified' => $this->getDate($disk->lastModified($f)),
                ];
            }
        }
        
        $backups = array_reverse($backups);
       /**/
        return view("backup.index")->with(compact('backups'));
    }

    public function create()
    {
        try {
            Artisan::call('backup:run',['--only-files'=>true]);
            $output = Artisan::output();
            Log::info("Backpack\BackupManager -- new backup started from admin interface \r\n" . $output);
            //Alert::success('New backup created');
            return redirect()->back();
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect()->back();
        }
    }


    function getDate($date_modify)
    {
        /*Retorna la hora obtenida del sistema en el formato dia-mes-año min.-seg.*/
        return Carbon::createFromTimeStamp($date_modify)->formatLocalized('%d %B %Y %H:%M');
    }
    /*Funcion que realiza la traduccion para conocer el tamaño de la BD*/
    function human_filesize($bytes,$decimals = 2)
    {
        if($bytes < 1024)
        {
            return $bytes . 'B';
        }
        $factor = floor(log($bytes, 1024));
        return sprintf("%.{$decimals}f", $bytes / pow(1024,$factor)). ['B','KB','MB','GB', 'TB', 'PB'] [$factor];
    }


    /*Funcion para realizar la descarga de la base de datos*/
    public function download($file_name)
    {
        ob_end_clean();
        $file = config('laravel-backup.backup.name') . '/' . $file_name;
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        if ($disk->exists($file)) {
            $fs = Storage::disk(config('laravel-backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);
            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Type" => $fs->getMimetype($file),
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }

    /*Funcion para eliminar la base de datos*/
    public function delete($file_name)
    {
        $disk = Storage::disk(config('laravel-backup.backup.destination.disks')[0]);
        if ($disk->exists(config('laravel-backup.backup.name') . '/' . $file_name)) {
            $disk->delete(config('laravel-backup.backup.name') . '/' . $file_name);
            return redirect()->back();
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }

}
