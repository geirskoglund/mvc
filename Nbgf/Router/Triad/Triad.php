<?php 
namespace Router\Triad;

class Triad implements \Router\Contracts\ITriad
{
    private $view;
    private $controller;

    public function __construct($view, $controller = null) 
    {
        $this->view = $view;
        $this->controller = $controller;
    }

    public function getView() 
    {
        return $this->view;
    }

    public function getController() 
    {
        return $this->controller;
    }
    
}