<?php

use app\lib\Route;
use app\lib\View;

/**
 * Will be trigger, if call 'new class_name'
 *
 * @param string className
**/
function loader($className) {
    //$util = new Util();
    
    if ($className != 'JsonSerializable') {
        $className = ucname($className);

        $className = preg_replace('/_/', '-', $className);

        $fileName = PATH_BASE.str_replace('\\', 
            DIRECTORY_SEPARATOR, $className) . '.php';
        
        if (!empty($fileName)) {
            if (file_exists($fileName)) {
                include_once $fileName;
            } else {
                $route = new Route();
                $route->redirect('/not-found');
            }
        }
    }
}

function ucname($string) {

    foreach (array('_', '\\', '/', '-') as $delimiter) {
        if (strpos($string, $delimiter) !== false) {

            $directory = explode($delimiter, $string);
            $file = ucfirst($directory[count($directory) - 1]);

            $path = explode($delimiter, $string);
            $path[count($path) - 1] = $file;

            $string = implode($delimiter, $path);
        }
    }

    return $string;
}

spl_autoload_register('loader');
