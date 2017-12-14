<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/hi', function(){
    echo 'ว่าไง';
});

$app->get('/user/register',function() {echo '/user/register';});
$app->get('/user/login',function() {echo '/user/login';});
$app->get('/user/post',function() {echo '/user/post';});
$app->get('/user/search',function() {echo '/user/search';});
$app->get('/user/listproduct',function() {echo '/user/listproduct';});
$app->get('/user/listproduct1',function() {echo '/user/listproduct1';});
$app->get('/user/detail',function() {echo '/user/detail';});
$app->get('/user/picture',function() {echo '/user/picture';});
$app->get('/user/call',function() {echo '/user/call';});


$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->run();
