<?php 

namespace core;

use core\Uri;

class Paramether{

    private $uri;

    public function __construct()
    {
        $this->uri = Uri::getUri();
    }

    public function load()
    {
        return $this->getParams();
    }

    private function getParams()
    {
        if(substr_count($this->uri,'/') > 2)
        {
            $param = array_values(array_filter(explode('/',$this->uri)));

            return (object)[
                'param'     => htmlspecialchars($param[2]),
                'nextParam' => htmlspecialchars($param[3])
            ];
        }
    }

}