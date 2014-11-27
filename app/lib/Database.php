<?php

namespace app\lib;

class Database {
    
    private $_pdo;
    private $_db;
    
    public function __construct() {
        $this->_pdo = new \PDO("mysql:dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $this->_db = new \NotORM($this->_pdo);
    }
    
    public function db() {
        return $this->_db;
    }
}