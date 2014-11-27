<?php

namespace app\test;
use app\lib\Util;

class UtilTest extends \PHPUnit_Framework_TestCase {
    
    public function __construct() {
        //include 'config.php';
        //include 'app/autoload.php'  ;
    }
    
    public function testUpperCase() {
        $url = 'hello.php';
        $util = new Util();
        $new_url = $util->ucname($url);
        $this->assertEquals('Hello.php', $new_url);
    }
}