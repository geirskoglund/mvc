<?php
namespace MVC;

class FrontController
{
    private $triad;
    
    public function __construct(\Router\Interfaces\ITriad $triad)
    {
        $this->triad = $triad;
    }
    
    public function performActionBasedOn(\AppRequest $request)
    {
        if($this->triad->getController()==null || $request->getAction()==null)
            return false;
        
        $controller = $this->triad->getController();
        $action = $request->getAction();
        
        //if action does not exist, don't call it
        if(!method_exists($controller, $action))
            throw new \BadMethodCallException("The action '".$action."' does not exist.");
        
        // This will create an object that is the definition of our object
        $f = new \ReflectionMethod($controller, $action);
        $args = array();
        // Loop trough params
        foreach ($f->getParameters() as $param) 
        {
            // Check if parameters is sent through the request and if it is optional or not
            if (!$request->requestIsSet($param->name) && !$param->isOptional()) 
            {     
                throw new \BadMethodCallException("Required argument ".$param->name." is missing");
            }
            if ($request->requestIsSet($param->name)) 
            {
                $args[] = $request->request($param->name);
            }
            if ($param->name == 'args') 
            {
                $args[] = $_REQUEST;
            }
        }
        $result = call_user_func_array(array($controller, $action), $args);
    }
    
}