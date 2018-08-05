<?php

//$app->get('/home', function($req, $res){
//return 'hello';
//    
//});

$app->get('/home', function($req, $res){

$this->view->render($res, 'home.twig');    
});

$app->get('/test','TestController:index');
