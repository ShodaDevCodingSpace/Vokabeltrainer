<?php

require_once BASE_PATH . 'app/routing/Router.php';
require_once BASE_PATH . 'app/routing/Request.php';

$router = require_once __DIR__ . '/app.php';

$request = Request::createFromGlobal();

try{
    echo $router->handle($request);
}catch (RouteNotFoundException $exception){
    echo $exception->getMessage();
}
