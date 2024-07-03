<?php

namespace core;

use core\Uri;
use Exception;

class Method{

    private $uri;

    public function __construct()
    {
        $this->uri = Uri::getUri();
    }

    public function load($controller)
    {
        $method = $this->getMethod();

        if(!method_exists($controller,$method))
        {
            throw new Exception("O metodo {$method} não foi encontrado");
        }

        return $method;
    }

    private function getMethod() 
    {
        if(substr_count($this->uri, '/') > 1)
        {
            [$controller,$method] = array_values(array_filter(explode('/',$this->uri)));

            if($method != '')
            {
                return $method;
            }
        }

        return 'index';
    }


}