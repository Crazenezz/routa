<?php

namespace app\lib;

abstract class Controller {

    public function __construct() {}
    
    protected abstract function run();
    
    public function beforeRun() {}
    
    public function afterRun() {}
}
?>
