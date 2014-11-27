<?php

namespace app\lib;

class API_Controller extends Controller {

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
}
