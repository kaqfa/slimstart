<?php
use Slim\Views\PhpRenderer;

$container = $app->getContainer();

$container['tpl'] = function($c){
    $render = new PhpRenderer("./templates");
    $render->addAttribute('baseUrl', $c->get('settings')['base_url']);
    return $render;
};

$container['pdo'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $pdo = new PDO("mysql:host=" . $settings['host'] . ";dbname=" . $settings['dbname'],
                   $settings['user'], $settings['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};