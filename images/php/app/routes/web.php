<?php

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

use GuzzleHttp\Client;

const ENDPOINT = 'https://api.github.com/user';

$router->get('/', function () use ($router) {

    $client = new Client();
    try {

        $response = $client->request('GET', ENDPOINT, [
            'auth' => ['camposa03','Zbl2726501']
        ]);
        
        return $response->getBody();
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
    

    //return $response->getStatusCode();
    //return $router->app->version();
});

$router->get('/test', function() use ($router) {
    return "You have hit the test endpoint";
});
