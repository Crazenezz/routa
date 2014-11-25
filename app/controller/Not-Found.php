<?php

namespace app\controller;
use app\lib\Controller;
use app\lib\View;

class Not_Found extends Controller {

    public function run() {
        View::show('404');
    }
}