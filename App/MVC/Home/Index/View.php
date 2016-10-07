<?php
namespace MVC\Home\Index;

class View implements \MVC\Interfaces\IView
{
    private $viewModel;
    
    public function __construct(\MVC\Home\Index\ViewModel $model) 
    {
        $this->viewModel = $model;
    }
    
    public function render()
    {
        echo "<h4>Viewet sier</h4><p>".$this->viewModel->getViewData()."</p>";
        echo "<p>Merk at dette viet er fra Home/Index-pathen:</p>";
        var_dump($this);
    }

}