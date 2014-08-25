<?php

abstract class Controller {

    protected function __constructor() {}
    
    protected abstract function run();
    
    public function beforeRun() {}
    
    public function afterRun() {}
}
?>
