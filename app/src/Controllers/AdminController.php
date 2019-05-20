<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class AdminController{
    private $tpl;

    public function __construct($tpl){
        $this->tpl = $tpl;
    }

    public function index($request, $response, $args){
        $resp = $this->tpl->render($response, 'dashboard.php');
        return $resp;
    }

    public function tables($request, $response, $args){
        $resp = $this->tpl->render($response, 'tables.php');
        return $resp;
    }
}