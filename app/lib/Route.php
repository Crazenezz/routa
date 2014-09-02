<?php

namespace app\lib;

class Route {

    public function detect() {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        
        unset($url[0]);
        unset($url[1]);
        
        $classPath = null;
        foreach($url as $path) {
            if (empty($path))
                $path = 'index';
            
            $classPath = (!empty($classPath)) ? $classPath.'\\'.$path : $path;
        }
        
        $classPath = preg_replace('/-/', '_', $classPath);
        $classPath = 'app\controller\\'.$classPath;
        $controller = new $classPath;
        
        $controller->beforeRun();
        $controller->run();
        $controller->afterRun();
    }
}

?>
