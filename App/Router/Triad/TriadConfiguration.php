<?php
namespace Router\Triad;

class TriadConfiguration implements \Router\Interfaces\ITriadConfiguration
{   
    //Pattern => 0 = ViewPath, 1 = ViewModelPath , 2 = ControllerPath
    function getConfigArray()
    {
        return [
            "/" => ["Home\\Index", "Home\\Index", "Home\\Index"],
            "Forum/Thread" => ["Home\\Index", "Home\\Index", "Home\\Index"]
         
        ];
    }
}