<?php

namespace app\test;
use app\lib\Route;

class RouteTest extends \PHPUnit_Framework_TestCase {
    
    public function __construct() {
        include 'config.php';
        include 'app/autoload.php';
    }
    
    public function testBaseHref() {
        $route = new Route();
        $this->assertEquals($route->_base_href, 'http://cli:0');
    }
}
?>

