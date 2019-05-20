<?php

namespace App\Controllers;

final class LoginController{
    private $tpl;
    private $staff;

    public function __construct($tpl, $staffModel){
        $this->tpl = $tpl;
        $this->staff = $staffModel;
    }

    public function getLogin($request, $response, $args){
        return $this->tpl->render($response, 'login.php');
    }

    public function getRegister($request, $response, $args){
        return $this->tpl->render($response, 'register.php');
    }

    public function postLogin($request, $response, $args){
        $email = $request->getParam('email');
        $password = $request->getParam('password');
        $user = $this->staff->auth($email, $password);
        if($user){
            $_SESSION['login'] = $user['username'];
            $_SESSION['unit'] = $user['store_id'];
            return $response->withRedirect($request->getUri()->getBasePath().'/');
        } else {
            $_SESSION['err'] = 'Email &amp; password tidak sesuai';
            return $response->withRedirect($request->getUri()->getBasePath().'/login?wrong_password');
        }
    }

    public function postRegister($request, $response, $args){

    }

    public function getLogout($request, $response, $args){
        session_destroy();
        $_SESSION['msg'] = 'Berhasil logout';
        return $response->withRedirect($request->getUri()->getBasePath().'/login');
    }
}