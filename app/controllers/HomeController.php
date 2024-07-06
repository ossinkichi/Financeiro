<?php
namespace app\controllers;

use app\controllers\Container;
use app\controllers\ControllerInterface;

class HomeController extends Container implements ControllerInterface{

    public function index()
    {
        $this->view([
            "title" => 'Cobranças Ossin'
        ],'home');
    }

}