<?php
namespace app\classes;

use core\Twig;

class Views{

    private function twig()
    {
        $twig = new Twig();

        return $twig->loadTwig();
    }

    public function view(array $data,string $view)
    {
        $template = $this->twig()->load(str_replace('/','.',"{$view}.html"));

        return $template->display($data);
    }

}