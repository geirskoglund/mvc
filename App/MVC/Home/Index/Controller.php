<?php
namespace MVC\Home\Index;

class Controller
{
    private $viewModel;
    
    public function __construct(\MVC\Home\Index\ViewModel $model) 
    {
        $this->viewModel = $model;
    }
    
    public function Vis($id)
    {
        $this->viewModel->filter($id);
    }
    
}