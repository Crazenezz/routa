<?php

namespace app\lib;
use app\lib\View;
use app\lib\Util;

abstract class Controller {

    protected $_util;
    
    public function __construct() {
        $this->_util = new Util();
    }
    
    public function run($params = array()) {
        if (!empty($params)) {
            $data = array();
            foreach ($params as $key => $param) {
                if (method_exists($this, $param)) {
                    for($i = $key + 1; $i < $key + count($params); $i++) {
                        $data[] = $params[$i];
                    }
                    $this->$param($data);
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
