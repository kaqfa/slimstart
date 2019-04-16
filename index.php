<?php
use Slim\Views\PhpRenderer;

require './vendor/autoload.php';


$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$c = new \Slim\Container($configuration);

$app = new \Slim\App($c);

$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("./templates");

require 'router.php';

$app->run();