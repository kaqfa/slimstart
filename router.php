<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// $app->get('/', function ($request, $response, $args) {
// 	$str = '';
//     return $response->getBody()->write($str);
// });

// $app->get('/', function ($request, $response, $args){
// 	$data['key'] = 'value';

//     return $this->tpl->render($response, 'template.php', $data);
// });

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("<H1>Selamat datang di pemrograman web dengan Slim</H1>");
    return $response;
});

$app->get('/actors', function ($request, $response, $args){
	$stmt = $this->pdo->prepare('select * from actor');
	$stmt->execute();
	$data['data_actor'] = $stmt->fetchAll();

    return $this->tpl->render($response, 'list-actor.php', $data);
});