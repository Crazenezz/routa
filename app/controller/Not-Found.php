<?php

namespace app\controller;
use app\lib\Controller;
use app\lib\View;

class Not_Found extends Controller {

    public function run($params = []) {
        View::show('layout', array(
            'content' => View::contents('404')
        ));
    }
}