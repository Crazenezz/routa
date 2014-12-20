<?php

namespace app\lib;
use app\lib\Util;

class Route {

    private $_uri;
    private $_base_href;
    private $_util;

    public function __get($var) {
        return $this->$var;
    }

    public function __construct() {
        $this->baseHref();
        $this->_util = new Util();
    }

    public function detect($uri = null) {
        if (empty($uri)) {
            $this->_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        } else {
            $this->_uri = $uri;
        }
        
        $url = explode('/', $this->_uri);
        unset($url[0]);
        
        $classPath = null;
        foreach ($url as $key => $path) {
            if (empty($path)) {
                $classPath = (!empty($classPath)) ? 
                    $classPath.'/index' : 'index';
                break;
            }
            
            $classPath = (!empty($classPath)) ? 
                $classPath.'/'.$path : $path;

            unset($url[$key]);
            if (!is_dir(PATH_CONTROLLER.$classPath) &&
                !file_exists(PATH_CONTROLLER
                    .$this->_util->ucname($classPath).'.php')) {
                $classPath = null;
                continue;
            }
            
            if (file_exists(
                PATH_CONTROLLER.
                $this->_util->ucname($classPath).'.php')) break;
        }
        
        if (is_dir(PATH_CONTROLLER . $classPath) && 
                !file_exists($classPath)) {
            $classPath = $classPath.'/index';
        }
        
        $classPath = preg_replace('/-/', '_', $classPath);
        $classPath = preg_replace('/\//', '\\', $classPath);
        $classPath = 'app\controller\\' . $classPath;
        $controller = new $classPath;

        $controller->beforeRun();
        $controller->run($url);
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

            die;
        }

        header("Location: " . $redirect_url);
        die;
    }

    public function baseHref() {
        $http_post = filter_input(INPUT_SERVER, 'HTTP_HOST');
        $server_port = filter_input(INPUT_SERVER, 'SERVER_PORT');

        $domain = isset($http_post) ? $http_post : 'cli';
        $port = isset($server_port) ? $server_port : '0';

        $href = ($port == 443) ? 'https://' : 'http://';

        if ($port == 80 || $port == 443)
            $this->_base_href = $href . $domain . $this->_uri;
        else
            $this->_base_href = $href . $domain . ':' . $port . $this->_uri;
    }

}
