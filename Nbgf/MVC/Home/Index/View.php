<?php
namespace MVC\Home\Index;

class View implements \MVC\IView
{
    private $viewModel;
    
    public function __construct(\MVC\Home\Index\ViewModel $model) 
    {
        $this->viewModel = $model;
    }
    
    public function render()
    {
        echo "<p>Hallo fra viewet.</p>";
    }

}