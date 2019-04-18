<?php

$configuration = [
    'settings' => [
		'base_url' => '/slimstart',
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