<?php

namespace App\Models;

class Model{
    protected $pdo;
    protected $stmt;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function executeQ($query, $params = null){
        $this->stmt = $this->pdo->prepare($query);
        if ($params === null){
            $this->stmt->execute();
        } else {
            $this->stmt->execute($params);
        }
    }

    public function getQuery($query, $params = null){
        $this->executeQ($query, $params);
        return $this->stmt->fetchAll();
    }

    public function getSingleQuery($query, $params = null){
        $this->executeQ($query, $params);
        return $this->stmt->fetch();
    }

    public function writeQuery($query, $params){
        if($params === null){
            $_SESSION['err'] = 'Query insert, update, atau delete harus memiliki parameter';
            return false;
        }
        $this->executeQ($query, $params);
        return $this->stmt;
    }

}