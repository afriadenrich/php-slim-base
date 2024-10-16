<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();


app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*'); // Permite todos los orígenes
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE'); // Métodos permitidos
    res.setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization'); // Headers permitidos
    
    // Para manejar las solicitudes OPTIONS (pre-flight) en algunos navegadores
    if (req.method === 'OPTIONS') {
        return res.sendStatus(200);
    }

    next();
});

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Funciona!");
    return $response;
});

$app->get("/usuarios", function(Request $request, Response $response, $args) {
    $params = $request->getQueryParams();
   
    $response->getBody()->write(json_encode($params));

    return $response;
});


$app->run();
