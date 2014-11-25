<?php

/**
 *  Configuration
 */
include 'config.php';

/**
 *  Function autoload
 */
include 'app/autoload.php';
include 'vendor/autoload.php';

/**
 *  Routing setup
 */
use app\lib\Route;

$route = new Route();
$route->detect();