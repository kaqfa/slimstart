<?php

namespace App\Models;
use App\Models\Model as Model;

class Staff extends Model{

    public function auth($email, $password){
        $query = 'select * from staff where email = ? and password = md5(?) and active = 1';
        $staff = $this->getSingleQuery($query, array($email, $password));
        if($staff){
            return $staff;
        } else {
            return false;
        }
    }
}