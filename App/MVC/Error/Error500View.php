<?php
namespace MVC\Error;

class Error500View implements \MVC\Interfaces\IView
{
    
    public function render()
    {
        header($_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error"); 
        echo "<p>Dette er 500-siden!</p>";
    }

}