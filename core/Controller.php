<?php

namespace core;

use core\Uri;
use \Exception;

class Controller{
    
    private $uri;
    private $controller;
    private $namespace;
    private $folder = "\app\controllers";

    public function __construct()
    {
        $this->uri = Uri::getUri();
    }

    public function load()
    {
        if($this->uri == "/")
        {
            return $this->home();
        }

        return $this->getController();
    }

    private function home()
    {
        if(!$this->controllerExist('HomeController'))
        {
            throw new Exception("Controller not found");
        }

        return $this->instantiateController();
    }

    private function getController()
    {
        if(substr_count($this->uri,'/') >= 1)
        {
            [$controller] = array_values(array_filter(explode('/',$this->uri)));

            if(!$this->controllerExist(ucfirst($controller)."Controller"))
            {
                throw new Exception("O controller {$controller} não foi encontrado");
            }

            return $this->instantiateController();
        }
    }

    private function controllerExist($controller)
    {
        $controllerExist = false;

        if(class_exists($this->folder.'\\'.$controller))
        {
            $controllerExist = true;

            $this->namespace = $this->folder;
            $this->controller = $controller;
        }

        return $controllerExist;
    }

    private function instantiateController()
    {
        $controller = $this->namespace.'\\'.$this->controller;
        return new $controller;
    }

}