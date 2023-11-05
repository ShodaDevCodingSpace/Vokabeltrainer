<?php

require_once BASE_PATH . 'Controllers/BaseController.php';
$router = new Router();

//GET /
$router->register('/', new BaseController('index'), 'GET');
//POST /
$router->register('/', new BaseController('index'), 'POST');


//GET /learnVocabsDE
$router->register('/learnVocabsDE', new BaseController('learnVocabsDE'), 'GET');
//POST /learnVocabsDE
$router->register('/learnVocabsDE', new BaseController('learnVocabsDE'), 'POST');

//GET /learnVocabsEN
$router->register('/learnVocabsEN', new BaseController('learnVocabsEN'), 'GET');
//POST /learnVocabsEN
$router->register('/learnVocabsEN', new BaseController('learnVocabsEN'), 'POST');


//GET /learnVocabsResultDE
$router->register('/learnVocabsResultDE', new BaseController('learnVocabsResultDE'), 'GET');
//POST /learnVocabsResultDE
$router->register('/learnVocabsResultDE', new BaseController('learnVocabsResultDE'), 'POST');

//GET /learnVocabsResultEN
$router->register('/learnVocabsResultEN', new BaseController('learnVocabsResultEN'), 'GET');
//POST /learnVocabsResultEN
$router->register('/learnVocabsResultEN', new BaseController('learnVocabsResultEN'), 'POST');

return $router;