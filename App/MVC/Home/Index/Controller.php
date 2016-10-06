<?php
namespace MVC\Home\Index;

class Controller implements \MVC\Interfaces\IFilterable
{
    private $viewModel;
    
    public function __construct(\MVC\Home\Index\ViewModel $model) 
    {
        $this->viewModel = $model;
    }
    
    public function filter($id)
    {
        $this->viewModel->filter($id);
    }
    
}