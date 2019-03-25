<?php

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
        "db" => [
	        "host" => "localhost",
	        "dbname" => "sakila",
	        "user" => "root",
	        "pass" => ""
	    ],
    ],
];

$c = new \Slim\Container($configuration);