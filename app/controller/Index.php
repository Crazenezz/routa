<?php

namespace app\controller;
use app\lib\Controller;
use app\lib\View;

class Index extends Controller {

    public function run() {
        View::show('layout');
    }
}