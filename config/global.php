<?php

/**
 *  GLOBAL configuration
 */
 
// ENVIRONMENT
define('DEVELOPMENT', 'development');
define('STAGING', 'staging');
define('PRODUCTION', 'production');

// PATH
define('PATH_BASE', realpath(dirname(__FILE__)).'/../');
define('PATH_APP', PATH_BASE.'app/');
define('PATH_VIEW', PATH_APP.'view/');
define('PATH_CONTROLLER', PATH_APP.'controller/');
