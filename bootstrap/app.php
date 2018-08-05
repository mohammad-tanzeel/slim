<?php

session_start();
ini_set('display_errors',1);
require __DIR__.'/../vendor/autoload.php';
//die(__DIR__.'/../vendor/autoload.php');

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver'=>'mysql',
            'host'=>'127.0.0.1',
            'database'=>'test',
            'username'=>'root',
            'password'=>'admin',
            'charset'=>'utf8',
            'collation'=>'utf8_unicode_ci',
            'prefix'=>''
        ]
    ]
]);

$container = $app->getContainer();

/*
 * @param Illuminate\Database\Capsule\Manager $capsule
 */
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] =  function($container) use ($capsule){
    return $capsule;
};

// Register Twig View helper
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(__DIR__.'/../resource/view', [
        'cache' => false,
    ]);
    
    // Instantiate and add Slim specific extension
    $router = $c->router;
    //$uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $uri = $c->request->getUri();
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

$container['TestController'] = function($container){
    
    /*
     * @param \App\Controllers\TestController $view
     */
//    $view = \App\Controllers\TestController($container->view);
//    var_dump($view);
    return new \App\Controllers\TestController($container);
};

//$container['TestController'] = function($container){
//return new \App\Controllers\TestController;
//};

require __DIR__.'/../app/routes.php';

