<?php

require_once BASE_PATH . 'Controllers/BaseController.php';
$router = new Router();

//GET /
$router->register('/', new BaseController('index'), 'GET');
//POST /
$router->register('/', new BaseController('index'), 'POST');


//GET /learnVocabs
$router->register('/learnVocabs', new BaseController('learnVocabs'), 'GET');
//POST /learnVocabs
$router->register('/learnVocabs', new BaseController('learnVocabs'), 'POST');

return $router;