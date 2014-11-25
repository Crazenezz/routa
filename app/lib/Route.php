<?php

namespace app\lib;

class Route {

    private $_uri;
    private $_base_href;
    
    public function __get($var) {
        return $this->$var;
    }
    
    public function __construct() {
        $this->baseHref();
    }
    
    public function detect($uri = null) {
        if (empty($uri)) {
            $this->_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
            
            $url = explode('/', $this->_uri);
        
            unset($url[0]);
            unset($url[1]);
        } else {
            $this->_uri = $uri;
            
            $url = explode('/', $this->_uri);
            
            unset($url[0]);
        }
        
        $classPath = null;
        foreach($url as $path) {
            if (empty($path)) {
                $path = 'index';
                
                $classPath = (!empty($classPath)) ? $classPath.'\\'.$path : $path;
                break;
            }
            
            $classPath = (!empty($classPath)) ? $classPath.'\\'.$path : $path;
        }
        
        if (is_dir(PATH_CONTROLLER.$classPath) && !file_exists($classPath)) {
            $classPath = $classPath.'\index';
        }
        
        $classPath = preg_replace('/-/', '_', $classPath);
        $classPath = 'app\controller\\'.$classPath;
        $controller = new $classPath;
        
        $controller->beforeRun();
        $controller->run();
        $controller->afterRun();
    }
    
    public function redirect($url) {
        
        $redirect_url = null;
        
        foreach (array('http', 'https') as $href) {
            if (strpos($url, $href) !== false) {
                $redirect_url = $url;
                break;
            }
        }
        
        if (empty($redirect_url)) {
            $this->detect($url);
            
            die();
        }
        
        header("Location: ".$redirect_url);
        die();
    }
    
    public function baseHref() {
        $http_post = filter_input(INPUT_SERVER, 'HTTP_HOST');
        $server_port = filter_input(INPUT_SERVER, 'SERVER_PORT');
        
        $domain = isset($http_post) ? $http_post : 'cli';
        $port = isset($server_port) ? $server_port : '0';
        
        $href = ($port == 443) ? 'https://' : 'http://';
        
        if ($port == 80 || $port == 443) {
            $this->_base_href = $href.$domain.$this->_uri;
        } else {
            $this->_base_href = $href.$domain.':'.$port.$this->_uri;
        }
    }
}