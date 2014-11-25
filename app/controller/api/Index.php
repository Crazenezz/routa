<?php

namespace app\controller\api;
use app\lib\Api_Controller;

class Index extends API_Controller {

    public function __construct() {
        parent::__construct('json');
    }

    public function run() {
        $pdo = new \PDO("mysql:dbname=fb_sample", "root", "root");
        $db = new \NotORM($pdo);
        
        $user = $db->user[7];
        
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
