<?php

// require_once 'config/App.php';
// require_once 'config/Controller.php';

require_once 'config/Config.php';
// require_once 'config/Database.php';

spl_autoload_register(function($class){
    $class = explode("\\", $class);
    $class = end($class);

    require_once __DIR__ . '/config/' . $class . '.php';
});