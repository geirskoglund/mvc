<?php
namespace Router;

class Router implements \Router\Interfaces\IRouter
{
    
    public function instantiate(\Router\Interfaces\ITriadName $names) 
    {
        //The view must exist
        $viewName = $names->getViewName();
        if (!isset($viewName) || !class_exists($viewName)) 
            throw new \DomainException("View does not exist");
        
        //Create a model instance if one is specified
        $modelName = $names->getViewModelName();
        $model = null;
        if(isset($modelName) && class_exists($modelName))
            $model = new $modelName();
        
        //Create a controller instance if one is specified. Inject the model instance if it exists.
        $controllerName = $names->getControllerName();
        $controller = null;
        if(isset($controllerName) && class_exists($controllerName))
            $controller = isset($model) ? new $controllerName($model) : new $controllerName();
        
        //Create a view instance. Inject the model instance if it exists.
        $view = isset($model) ? new $viewName($model) : new $viewName();
        
        return new \Router\Triad\Triad($view, $controller);       

    }
    
}
