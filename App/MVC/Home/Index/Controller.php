<?php
namespace MVC\Home\Index;

class Controller
{
    private $viewModel;
    
    public function __construct(\MVC\Interfaces\IFilterable $model) 
    {
        $this->viewModel = $model;
    }
    
    public function Vis($id)
    {
        $this->viewModel->filter($id);
    }
    
}