<?php

namespace app\lib;

abstract class Controller {

    protected function __construct() {}
    
    protected abstract function run();
    
    public function beforeRun() {}
    
    public function afterRun() {}
}
?>
