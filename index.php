<?php
session_start();

require './vendor/autoload.php';

require 'config.php';

$app = new \Slim\App($c);

require 'dependencies.php';

require 'router.php';

$app->run();