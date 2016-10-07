<?php
namespace MVC\Forsiden\Nyheter;

class View implements \MVC\Interfaces\IView
{
    private $viewModel;
    
    public function __construct(\MVC\Interfaces\IViewModel $model) 
    {
        $this->viewModel = $model;
    }
    
    public function render()
    {
        echo "<h4>Viewet i Forsiden/Nyheter-pathen sier</h4><p>".$this->viewModel->getViewData()."</p>";
    }

}