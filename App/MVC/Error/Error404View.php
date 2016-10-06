<?php
namespace MVC\Error;

class Error404View implements \MVC\IView
{
    
    public function render()
    {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); 
        echo "<p>Dette er 404-siden!</p>";
    }

}