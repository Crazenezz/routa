<?php

    ini_set('display_errors', 1); 
	ini_set('log_errors', 1);
	error_reporting(E_ALL);
    
    define('PATH_APP', realpath(dirname(__FILE__)).'/app/');
    define('PATH_CONTROLLER', PATH_APP.'controller/');
    define('PATH_LIB', PATH_APP.'lib/');
    define('PATH_VIEW', PATH_APP.'view/');
    
    include PATH_APP.'autoload.php';
    
    $route = new Route();
    $route->detect();
?>
