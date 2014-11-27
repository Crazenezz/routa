<?php

namespace app\controller;
use app\lib\Controller;

class Hello_Name extends Controller {

    public function run($params = []) {
        echo 'Hello Name!';
    }
}
