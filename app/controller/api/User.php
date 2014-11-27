<?php

namespace app\controller\api;
use app\lib\Api_Controller;
use app\lib\Database;

class User extends API_Controller {
    
    private $_db;
    private $_params;
    
    public function __construct() {
        parent::__construct('json');
        
        $database = new Database();
        $this->_db = $database->db();
    }
    
    public function run($params = []) {
        $this->_params = $params;
        parent::run($params);
    }

    public function data() {
        $user = $this->_db->user[7];
        
        echo json_encode(
            array(
                'status' => 'succeed',
                'message' => 'No Message!',
                'data' => array(
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'email' => $user['email']
                )
            )
        );
    }
}