<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;

class ControlDatos extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function conectar() {
        return $client = \Doctrine\CouchDB\CouchDBClient::create(array('dbname' => 'iot', 'user' => 'admin', 'password' => 'admin'));
    }

    /* public function generarId() {
      $cliente = $this->conectar();
      $allDocs = $cliente->allDocs();
      return $allDocs->body["total_rows"];
      }

      private function guardar($datos) {
      date_default_timezone_set('America/Los_Angeles');
      $id = $this->generarId();
      $cliente = $this->conectar();
      $data = array("id" => $id, "fecha" => date("Y-M-d h:m:s"), "estado" => $datos["estado"], "potencia" => $datos["potencia"]);
      $cliente->postDocument($data);
      return "OK";
      }

      public function guardarDatos() {
      $data = array("foco" => "404");
      try {
      $client = new \GuzzleHttp\Client();
      $response = $client->request('GET', "http://192.168.1.50/4"); //$response = Http::get('http://192.168.1.50');
      $data = json_decode($response->getBody());
      //echo $data->foco;
      $datos = array("estado" => $data->foco, "potencia" => $data->potencia);
      $this->guardar($datos);
      } catch (\Exception $e) {
      echo $e;
      //$datos = array("estado" => "NADA", "potencia" => 0.0);
      //$this->guardar($datos);
      }
      return response()->json($data); //$data;
      }
     */

    public function verDatos() {
        $cliente = $this->conectar();
      $allDocs = $cliente->allDocs();
      return response()->json($allDocs->body["rows"]);
    }

    //
}
