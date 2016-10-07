<?php
namespace MVC\Forsiden\Nyheter;

class ViewModel implements \MVC\Interfaces\IFilterable, \MVC\Interfaces\IViewModel 
{
    private $someData;
    
    public function __construct() 
    {
        $this->someData = "Dette er ufiltrerte data";
    }
    
    public function filter($id)
    {
        $this->someData = "Disse datene er filtrert på id ".$id;
    }
    
    public function getViewData()
    {
        return $this->someData;
    }
}