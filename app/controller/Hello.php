<?php

namespace app\controller;
use app\lib\Controller;

class Hello extends Controller {

    public function name($params = []) {
        echo "Hello $params[4]!<br/>";
        echo "Age: $params[5]";
    }
}
