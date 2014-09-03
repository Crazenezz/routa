<?php

namespace app\test;
use app\lib\Route;

class RouteTest extends \PHPUnit_Framework_TestCase {
    
    public function __construct() {
        include '../../config.php';
    }
    
    public function testBaseHref() {
        $route = new Route();
        $this->assertNull($route->_base_href);
    }
}
?>
