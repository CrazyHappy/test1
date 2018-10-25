<?php

require __DIR__ . '/vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();
// Define routes
$router->setNamespace('\App\Controller');

require __DIR__ . '/web.php';

// Run it!
$router->run();