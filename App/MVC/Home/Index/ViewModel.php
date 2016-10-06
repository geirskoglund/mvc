<?php
namespace MVC\Home\Index;

class ViewModel implements \MVC\Interfaces\IFilterable, \MVC\Interfaces\IViewModel 
{
    private $someData = "Dette er ufiltrerte data";
    
    public function filter($id)
    {
        echo "<p>ViewModel mottar id = '" . $id."' og kaller DomainModels for å hente filtrerte data.</p>";
        $this->someData = "Disse datene er filrert på id ".$id;
    }
    
    public function getViewData()
    {
        return $this->someData;
    }
}