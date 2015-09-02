<?php

/**
 *  Configuration
 */
include 'config/app.php';

/**
 *  Function autoload
 */
include 'app/autoload.php';

if(!@include 'vendor/autoload.php')
    die("Do \"composer update\" first");

/**
 *  Routing setup
 */
use app\lib\Route;

$route = new Route();
$route->detect();
