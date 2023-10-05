<?php

use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Router.php';
require_once __DIR__ . '/../src/utils/DBconnect.php';
require_once __DIR__ . '/../config/Config.php';

session_start();


try {
    Router::route();
}
catch (ReflectionException $e) {
    echo "Une erreur est survenu avec le rooter";
}