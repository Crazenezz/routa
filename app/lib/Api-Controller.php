<?php

namespace app\lib;

abstract class API_Controller {

    public function __construct($type) {
        switch($type) {
            case 'json':
                header('Content-type: application/json; charset=utf-8');
                break;
            case 'xml':
                header('Content-type: text/xml; charset=utf-8');
                break;
            default:
                header('Content-type: text/html; charset=utf-8');
                break;
        }
	    
    }
    
    protected abstract function run();
    
    public function beforeRun() {}
    
    public function afterRun() {}
}
?>