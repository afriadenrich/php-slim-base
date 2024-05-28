<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

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
