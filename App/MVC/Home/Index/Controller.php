<?php
namespace MVC\Home\Index;

class Controller implements \MVC\IFilterable
{
    private $viewModel;
    
    public function __construct(\MVC\Home\Index\ViewModel $model) 
    {
        $this->viewModel = $model;
    }
    
    public function filter($id)
    {
        echo "<p>Controlleren filterer på " . $id."</p>";
    }
    
}