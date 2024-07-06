<?php

namespace core;

class Twig{
    
    private $twig;

    public function loadTwig()
    {
        $this->twig = new \Twig\Environment($this->loadViews(),[
            'debugger'      => true,
            'auto_reload'   => true
        ]);       
        
        return $this->twig;
    }

    private function loadViews()
    {
        return new \Twig\Loader\FilesystemLoader(__DIR__.'/../app/views');
    }

}