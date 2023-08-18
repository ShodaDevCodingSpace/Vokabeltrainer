<?php

require_once BASE_PATH . 'Controllers/BaseController.php';
$router = new Router();

$router->register('/', new BaseController('index'), 'GET');

$router->register('/test', new BaseController('test'), 'GET');

$router->register('/test/test', new BaseController('test/test'), 'GET');


return $router;