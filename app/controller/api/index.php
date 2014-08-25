<?php

namespace app\controller\api;
use app\lib\api_controller;

class Index extends API_Controller {

    public function __construct() {
        parent::__construct('json');
    }

    public function run() {
        echo json_encode(
            array(
                'status' => 'succeed',
                'message' => 'No Message!',
                'data' => 'No Data!'
            )
        );
    }
}

?>
