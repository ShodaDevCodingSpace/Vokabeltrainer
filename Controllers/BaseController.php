<?php

class BaseController
{
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }
    public function __invoke(Request $request){
        '<!DOCTYPE html>'
        require_once BASE_PATH . 'resources/' . $this->file . '.php';
    }
}