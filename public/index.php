<?php

//  Session démarrée une seule fois
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Buki\Router\Router;

// Autoload Controllers & Models
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../app/Controllers/' . $class . '.php',
        __DIR__ . '/../app/Models/' . $class . '.php',
    ];
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

// Init router
$router = new Router([
    'paths' => [
        'controllers' => __DIR__ . '/../app/Controllers',
    ],
    'base_folder' => '',
    'debug' => true
]);

/* ========= ROUTES ========= */

// Accueil
$router->get('/', ['TrajetController', 'index']);

// Auth
$router->get('/login', ['AuthController', 'loginForm']);
$router->post('/login', ['AuthController', 'login']);
$router->get('/logout', ['AuthController', 'logout']);

// Trajets
$router->get('/trajet/create', ['TrajetController', 'createForm']);
$router->post('/trajet/create', ['TrajetController', 'create']);

$router->get('/trajet/:id/edit', ['TrajetController', 'editForm']);
$router->post('/trajet/:id/update', ['TrajetController', 'update']);
$router->get('/trajet/:id/delete', ['TrajetController', 'delete']);

/* ========= RUN ========= */
$router->run();
