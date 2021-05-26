<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RevisionIot extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iot:revisar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Para revisar y guardar datos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        date_default_timezone_set("America/Guayaquil");
        $job = (new \App\Jobs\IotJob())->delay(1);
        dispatch($job);
        
        /*$when = \Carbon\Carbon::now()->addMinutes(1);
        
        $fecha = date('Y-m-d');
        $lista = \App\Notificaciones::where('visualizar', true)->where('fecha', $fecha)->get();
        $nro = $lista->count();
        if ($nro > 0) {
            $aux = array();
            foreach ($lista as $item) {
                $notifica = \App\Notificaciones::find($item->id);
                $notifica->visualizar = false;
                $notifica->save();
                $persona = \App\Persona::where('external_id', $item->external_paciente)->first();
                $aux[] = array('paciente' => $notifica->descripcion, 'fecha' => $item->fecha);
            }
            //correo
            $lista = \App\Http\Controllers\utilidades\Consultas::lista_medicos();
            foreach ($lista as $item) {
                $job = (new \App\Jobs\SendEmaiNotificationlJob($item['email'], $nro, $aux))->delay($when);
                dispatch($job);
            }
            foreach ($lista as $item) {
                if ($item['token_firebase'] != 'NO') {
                    $title = 'Notificacion';
                    $body = 'Tienes ' . $nro . ' tareas pendientes que necesitas revisar';
                    $job = (new \App\Jobs\SendNotificacionMedico($title, $body, $item['token_firebase']))->delay($when);
                    dispatch($job);
                }
            }                        
        }*/
    }

}
