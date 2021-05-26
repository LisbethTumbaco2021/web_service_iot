<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Log;
class IotJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $this->guardarDatos();
    }
    
    public function conectar() {
        return $client = \Doctrine\CouchDB\CouchDBClient::create(array('dbname' => 'iot', 'user' => 'admin', 'password' => 'admin'));
    }

    public function generarId() {
        $cliente = $this->conectar();
        $allDocs = $cliente->allDocs();
        return $allDocs->body["total_rows"];
    }

    private function guardar($datos) {
        date_default_timezone_set('America/Los_Angeles');
        $id = $this->generarId();
        Log::info('Entre a guardar '.$id);
        $cliente = $this->conectar();
        $data = array("id" => $id, "fecha" => date("Y-M-d h:m:s"), "estado" => $datos["estado"], "voltaje" => $datos["voltaje"], "amperage" => $datos["amperage"], "irms" => $datos["irms"]);
        $cliente->postDocument($data);
        //return "OK";
    }

    public function guardarDatos() {
        $data = array("foco" => "404");
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', "http://192.168.1.50/4"); //$response = Http::get('http://192.168.1.50');
            $data = json_decode($response->getBody());
            //echo $data->foco;
            Log::info('Guarda por aqui '.$data->foco);
            if($data->foco == "1") {
                $datos = array("estado" => $data->foco, "voltaje" => $data->potencia, "amperage" => $data->amperage, "irms" => $data->irms);
                $this->guardar($datos);
            }
            
        } catch (\Exception $e) {
            echo $e;
            //$datos = array("estado" => "NADA", "potencia" => 0.0);
            //$this->guardar($datos);
        }
        echo "Ya guarde";
        //return response()->json($data); //$data;
    }
    
}
