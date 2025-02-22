<?php

use FastRoute\RouteCollector;
use Spatie\Ignition\Ignition;
use Src\Controllers\Admin\AttributeController;
use Src\Controllers\Admin\BrandController;
use Src\Controllers\Admin\CategoryController;
use Src\Controllers\Admin\HomeController as AdminHomeController;
use Src\Controllers\Admin\OrderController;
use Src\Controllers\Admin\ProductController as AdminProductController;
use Src\Controllers\Admin\UserController;
use Src\Controllers\Client\AuthController;
use Src\Controllers\Client\CartController;
use Src\Controllers\Client\CheckoutController;
use Src\Controllers\Client\HomeController;
use Src\Controllers\Client\ProductController;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE);
ini_set('error_log', './logs/php.log');

require_once './vendor/autoload.php';
ob_start();
session_start();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once './config.php';

Ignition::make()->register()->theme('dark');
















$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->get('/', [HomeController::class, 'loadHome']);
    $r->get('/home', [HomeController::class, 'loadHome']);
    $r->get('/gioi-thieu', [HomeController::class, 'loadAbout']);
    $r->get('/lien-he', [HomeController::class, 'loadContact']);
    $r->get('/dang-nhap', [AuthController::class, 'loadLogin']);
    $r->get('/dang-ky', [AuthController::class, 'loadRegister']);
    $r->get('/san-pham', [ProductController::class, 'loadProducts']);
    $r->get('/chi-tiet', [ProductController::class, 'loadDetail']);
    $r->get('/gio-hang', [CartController::class, 'loadCart']);
    $r->get('/thanh-toan', [CheckoutController::class, 'checkoutPage']);
    $r->get('/tai-khoan', [AuthController::class, 'loadProfile']);




    $r->addGroup('/admin', function (RouteCollector $r) {

        $r->get('/', [AdminHomeController::class, 'index']);
        $r->get('', [AdminHomeController::class, 'index']);
        $r->get('/dashboard', [AdminHomeController::class, 'index']);

        $r->get('/users', [UserController::class, 'index']);
        $r->get('/create-user', [UserController::class, 'addPage']);
        $r->get('/edit-user/{id}', [UserController::class, 'editPage']);
        $r->get('/delete-user/{id}', [UserController::class, 'delete']);

        $r->get('/products', [AdminProductController::class, 'index']);
        $r->get('/product/add', [AdminProductController::class, 'addPage']);

        $r->get('/allAttribute', [AttributeController::class, 'attributeList']);
        $r->get('/attribute', [AttributeController::class, 'attributeAdd']);
        $r->get('/attribute-edit/{id}', [AttributeController::class, 'attributeEdit']);
        $r->get('/delete-attribute/{id}', [AttributeController::class, 'delete']);


        $r->get('/categories', [CategoryController::class, 'index']);
        $r->get('/category/add', [CategoryController::class, 'categoryAdd']);
        $r->get('/category-edit/{id}', [CategoryController::class, 'categoryEdit']);
        $r->get('/delete-category/{id}', [CategoryController::class, 'delete']);


        $r->get('/brands', [BrandController::class, 'index']);
        $r->get('/brand/add', [BrandController::class, 'addPage']);
        $r->get('/delete-brand/{id}', [BrandController::class, 'delete']);

        $r->get('/edit-brand/{id}', [BrandController::class, 'editPage']);

        $r->get('/orders', [OrderController::class, 'index']);

        $r->post('/add-user', [UserController::class, 'insertUser']);
        $r->post('/edit-user/{id}', [UserController::class, 'updateUser']);

        $r->post('/attribute-add', [AttributeController::class, 'insertAttribute']);
        $r->post('/attribute-update/{id}', [AttributeController::class, 'updateAttribute']);

        $r->post('/category/store', [CategoryController::class, 'insertCategory']);
        $r->post('/category/update/{id}', [CategoryController::class, 'updateCategory']);

        $r->post('/add-brand', [BrandController::class, 'insertBrand']);
        $r->post('/update-brand/{id}', [BrandController::class, 'updateBrand']);


    });
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
        if (is_array($handler) && count($handler) === 2) {
            list($class, $method) = $handler;
        } else {
            die("Error: Invalid route handler!");
        }

        call_user_func_array([new $class, $method], $vars);
        break;
}
