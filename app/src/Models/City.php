<?php

namespace App\Models;
use App\Models\Model as Model;

class City extends Model{

    public function getCities($condition=null, $params=null){
        $sql = 'select * from city join country on (city.country_id = country.country_id)';
        if ($condition !== null){
            $sql .= ' where '.$condition;
        }

        return $this->getQuery($sql, $params);
    }

    public function getCityById($id){
        $sql = 'select * from city join country on (city.country_id = country.country_id) 
                where city_id = ?';
        return $this->getSingleQuery($sql, array($id));
    }

    public function getCountries($condition=null, $params=null){
        $sql = 'select * from country';
        if($condition !== null){
            $sql .= ' where '.$condition;
        }

        return $this->getQuery($sql, $params);
    }

    public function insertCity($city, $country_id){
        $sql = 'insert into city values (null, ?, ?, now())';
        return $this->writeQuery($sql, array($city, $country_id));
    }

    public function updateCity($city_id, $data = array()){
        $sql = 'update city set city = ?, country_id = ? where city_id = ?';
        $params = array($data['city'], $data['country_id'], $city_id);
        return $this->writeQuery($sql, $params);
    }

    public function delCity($city_id){
        $sql = 'delete from city where city_id = ?';
        return $this->writeQuery($sql, array($city_id));
    }
}