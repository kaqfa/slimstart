<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// $app->get('/', function ($request, $response, $args) {
//     return $response->getBody()->write("");
// });

$app->get('/', function ($request, $response, $args) {
    return $this->renderer->render($response, "/main_tpl.php", $args);
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});