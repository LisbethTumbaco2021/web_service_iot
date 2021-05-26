<?php

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

/** @var \Laravel\Lumen\Routing\Router $router */
/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It is a breeze. Simply tell Lumen the URIs it should respond to
  | and give it the Closure to call when that URI is requested.
  |
 */


/*$router->get('/test', function (GuzzleHttp\Client $client) {
  $data = array("foco"=>"404");    
    try {
        $response = $client->request('GET', "http://192.168.1.50/4"); //$response = Http::get('http://192.168.1.50');
        $data = json_decode($response->getBody());     
    } catch (\Exception $e) {        
        
    }   
    return $data["foco"];//response()->json($data);//$data;
});*/



$router->get('/', function (GuzzleHttp\Client $client) {
    $data = array("foco"=>"404");    
    try {
        $response = $client->request('GET', "http://192.168.1.50"); //$response = Http::get('http://192.168.1.50');
        $data = json_decode($response->getBody());     
    } catch (\Exception $e) {        
        
    }   
    return response()->json($data);//$data;
});

$router->get('/encender', function (GuzzleHttp\Client $client) {
    $data = array("foco"=>"404");    
    try {
        $response = $client->request('GET', "http://192.168.1.50/2"); //$response = Http::get('http://192.168.1.50');
        $data = json_decode($response->getBody());     
    } catch (\Exception $e) {        
        
    }   
    return response()->json($data);//$data;
});

$router->get('/apagar', function (GuzzleHttp\Client $client) {
    
    $data = array("foco"=>"404");    
    try {
        $response = $client->request('GET', "http://192.168.1.50/3"); //$response = Http::get('http://192.168.1.50');
        $data = json_decode($response->getBody());     
    } catch (\Exception $e) {        
        
    }   
    return response()->json($data);//$data;
});

$router->get('/estado', function (GuzzleHttp\Client $client) {
    $data = array("foco"=>"404");    
    try {
        $response = $client->request('GET', "http://192.168.1.50/4"); //$response = Http::get('http://192.168.1.50');
        $data = json_decode($response->getBody());     
    } catch (\Exception $e) {        
        
    }   
    return response()->json($data);//$data;
    
});

$router->get('/ver_data','ControlDatos@verDatos');
