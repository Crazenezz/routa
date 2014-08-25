<?php

class Route {

    public function detect() {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        
        unset($url[0]);
        unset($url[1]);
        
        $classPath = 'index';
        if (!empty($url[2])) {
            foreach($url as $path) {
                $classPath = $path;
            }
        }
        
        $classPath = preg_replace('/-/', '_', $classPath);
        
        $controller = new $classPath;
        
        $controller->beforeRun();
        $controller->run();
        $controller->afterRun();
    }
}

?>
