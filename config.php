<?php

/**
 *  Debug configuration
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

$http_post = filter_input(INPUT_SERVER, 'HTTP_HOST');
if (!empty($http_post)) {
    ini_set('html_errors', 1);
    ini_set('log_errors', 1);
}

/**
 *  Define global path
 */
define('PATH_BASE', realpath(dirname(__FILE__)).'/');

define('PATH_APP', PATH_BASE.'/app/');
define('PATH_VIEW', PATH_APP.'/view/');
define('PATH_CONTROLLER', PATH_APP.'/controller/');