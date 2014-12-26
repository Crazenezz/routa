<?php

namespace app\controller;
use app\lib\Controller;

class Hello extends Controller {

    public function name($params = array()) {
        echo "Hello $params[0]!<br/>";
        echo "Age: $params[1]";
    }
}
