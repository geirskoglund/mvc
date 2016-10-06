<?php 
namespace Router\Triad;

class ErrorTriad implements \Router\Interfaces\ITriad
{
    private $view;

    public function __construct($statusCode) 
    {
        $selectedView = "\\MVC\\Error\\Error".$statusCode."View";
        if(class_exists($selectedView))
            $this->view = new $selectedView();
        else
            $this->view = new \MVC\Error\Error500View();
    }

    public function getView() 
    {
        return $this->view;
    }

    public function getController() 
    {
        return null;
    }
    
}