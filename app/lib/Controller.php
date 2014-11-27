<?php

namespace app\lib;
use app\lib\View;

abstract class Controller {

    public function __construct() {}
    
    public function run($params = []) {
        if (!empty($params)) {
            foreach ($params as $param) {
                if (method_exists($this, $param)) {
                    $this->$param($params);
                } else {
                    View::show('404');
                }

                break;
            }
        } else {
            $this->index();
        }
    }
    
    public function index() {
        header('Content-type: text/html; charset=utf-8');
        
        View::show('404');
    }
    
    public function beforeRun() {}
    
    public function afterRun() {}
}
