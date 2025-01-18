<?php
use FastRoute\RouteCollector;
use Spatie\Ignition\Ignition;
use Src\Controllers\Client\AuthController;
use Src\Controllers\Client\HomeController;
use Src\Controllers\Client\ProductController;
use Src\Models\Database;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE);
ini_set('error_log', './logs/php.log');

require_once './vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once './config.php';

Ignition::make()->register()->theme('dark');
















$dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $r) {
    $r->get('/', [HomeController::class, 'loadHome']);
    $r->get('/home', [HomeController::class, 'loadHome']);
    $r->get('/gioi-thieu', [HomeController::class, 'loadAbout']);
    $r->get('/lien-he', [HomeController::class, 'loadContact']);
    $r->get('/dang-nhap', [AuthController::class, 'loadLogin']);
    $r->get('/dang-ky', [AuthController::class, 'loadRegister']);
    $r->get('/san-pham', [ProductController::class, 'loadProducts']);
    $r->get('/chi-tiet', [ProductController::class, 'loadDetail']);

});



$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $method = $handler[1];
        
        $controller = new $handler[0];
        $controller->$method($vars);
        break;
}