<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../app/functions/helpers.php";

use core\Controller;
use core\Method;
use core\Paramether;

try
{

    $controller = new Controller;
    $controller = $controller->load();

    $method = new Method;
    $method = $method->load($controller);

    $params = new Paramether;
    $params = $params->load();
    
    $controller->$method($params);

}catch(Exception $e)
{
    echo $e->getMessage();
}