<?php

require 'config.php';
//require UTILS.'auth.php';
//require UTILS.'validator.php';
//require UTILS.'mobile.php';

// Also spl_autoload_register (Take a look at it if you like)
spl_autoload_register ('myautoload');
function myautoload($class) {
    $path = LIBS . $class .".php";
    if(file_exists($path))
    require LIBS . $class .".php";
    else
    require UTILS . $class .".php";
}

$bootstrap = new bootstrap();
//$bootstrap->setErrorFile('error.php');
//$bootstrap->setControllerPath('/controllers');
//$bootstrap->setModelPath('/models');
//$bootstrap->setDefaultFile('index.php');
//$bootstrap->setDefaultModelFile('index_model.php');
$bootstrap->init();