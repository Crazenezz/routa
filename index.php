<?php

    ini_set('display_errors', 1); 
	ini_set('log_errors', 1);
	error_reporting(E_ALL);
    
    define('PATH_BASE', realpath(dirname(__FILE__)).'/');
    define('PATH_APP', PATH_BASE.'/app/');
    define('PATH_VIEW', PATH_APP.'/view/');
    
    include PATH_APP.'autoload.php';
    use App\Lib\Route;
        
    $route = new Route();
    $route->detect();
?>
