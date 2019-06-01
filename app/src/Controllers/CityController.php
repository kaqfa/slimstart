<?php

namespace App\Controllers;

final class CityController{
    private $tpl;
    private $city;

    public function __construct($tpl, $cityModel){
        $this->tpl = $tpl;
        $this->city = $cityModel;
    }

    public function index($request, $response, $args){
        $data['cities'] = $this->city->getCities();
        return $this->tpl->render($response, 'city-list.php', $data);
    }

    public function getAdd($request, $response, $args){
        $data['countries'] = $this->city->getCountries();
        return $this->tpl->render($response, 'city-form.php', $data);
    }

    public function postAdd($request, $response, $args){
        $post = $request->getParsedBody();
        $this->city->insertCity($post['city'], $post['country_id']);

        $_SESSION['msg'] = 'Kota '.$post['city'].' berhasil ditambahkan.';
        return $response->withRedirect($request->getUri()->getBasePath().'/city');
    }

    public function getEdit($request, $response, $args){
        $data['countries'] = $this->city->getCountries();
        $data['city'] = $this->city->getCityById($args['city_id']);
        return $this->tpl->render($response, 'city-form.php', $data);
    }

    public function postEdit($request, $response, $args){
        $post = $request->getParsedBody();
        $edit_data = array('city' => $post['city'], 'country_id' => $post['country_id']);
        $this->city->updateCity($args['city_id'], $edit_data);

        $_SESSION['msg'] = 'Kota '.$post['city'].' berhasil diedit.';
        return $response->withRedirect($request->getUri()->getBasePath().'/city');
    }

    public function getDel($request, $response, $args){
        $this->city->delCity($args['city_id']);
        $_SESSION['msg'] = 'Kota berhasil dihapus.';
        return $response->withRedirect($request->getUri()->getBasePath().'/city');
    }
}