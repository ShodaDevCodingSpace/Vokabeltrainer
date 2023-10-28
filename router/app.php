<?php

require_once BASE_PATH . 'Controllers/BaseController.php';
$router = new Router();

$router->register('/', new BaseController('index'), 'GET');


return $router;