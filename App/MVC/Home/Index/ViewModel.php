<?php
namespace MVC\Home\Index;

class ViewModel implements \MVC\Interfaces\IFilterable, \MVC\Interfaces\IViewModel 
{
    private $someData;
    
    public function __construct() 
    {
        $this->someData = "Dette er ufiltrerte data fra Home/Index-pathen";
    }
    
    public function filter($id)
    {
        $this->someData = "Disse datene er filtrert på id ".$id. ", fra Home/Index-pathen";
    }
    
    public function getViewData()
    {
        return $this->someData;
    }
}