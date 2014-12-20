<?php

namespace app\controller;
use app\lib\Controller;

class Hello_Name extends Controller {

    public function run($params = array()) {
        echo 'Hello Name!';
    }
}
