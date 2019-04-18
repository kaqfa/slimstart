<?php

$configuration = [
    'settings' => [
		'base_url' => '/slimstart/sample_pdo',
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