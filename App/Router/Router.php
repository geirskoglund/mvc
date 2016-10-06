<?php
namespace Router;

class Router implements \Router\Contracts\IRouter
{
    private $dice;

    public function __construct(\Dice\Dice $dice) 
    {
        $this->dice = $dice;
    }
    
    
    public function instantiate(\Router\Contracts\ITriadName $names) 
    {
        //TODO: Consider skipping Dice for this. Is easily handled through simple initiation.
        //Convert $names into a Route object as defined below
        $viewName = $names->getViewName();

        if (!class_exists($viewName)) 
            throw new \Exception("View does not exist");

        $triad = "\\Router\\Triad\\Triad";

        $controllerName = $names->getControllerName();
        $modelName = $names->getViewModelName();
        
        $rule = 
        [
            "constructParams" => 
            [
                $this->dice->create($viewName),
                ($controllerName != null && class_exists($controllerName)) ? $this->dice->create($controllerName) : null,
            ]            
        ];
        $this->dice->addRule($triad, $rule);
        
        //The model doesn't need to exist, in its purest form, an MVC triad could just be a view
        //This tells Dice that the same instance of the model should be passed to both the view and the controller, if it exists
        if ($modelName != null && class_exists($modelName))  
        {
            $modelRule = ["shareInstances" => [$modelName]]; 
            $this->dice->addRule($triad, $modelRule);
        }
        // }

        //Have Dice construct the Route object with the correct controller and view set.
        //Dice will automatically pass the model into the View nad Controller if they ask for it in their constructors
        return $this->dice->create($triad);

    }
    
}
