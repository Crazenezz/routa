<?php

namespace app\controller;
use app\lib\controller;
use app\lib\view;

class Index extends Controller {

    public function run() {
        View::show('layout');
    }
}

?>
