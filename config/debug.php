<?php

/**
 *  DEBUG configuration
 */
$environment = DEVELOPMENT;
$debug = ($environment == DEVELOPMENT || $environment == STAGING) ? 1 : 0;

error_reporting(E_ALL);
ini_set('display_errors', $debug);

$http_post = filter_input(INPUT_SERVER, 'HTTP_HOST');
if (!empty($http_post)) {
    ini_set('html_errors', $debug);
    ini_set('log_errors', $debug);
}
