<?php
namespace Router\Triad;

class TriadName implements \Router\Contracts\ITriadName
{
    private $controllerName;
    private $viewName;
    private $viewModelName;
    private $pattern;
    
    public function initiateFrom(\AppRequest $request)
    {
        $this->pattern = $request->getShortPathFirst() . '/' . $request->getShortPathSecond();
        
        $basePath = '\\MVC\\' . $request->getShortPathFirst() . '\\' . $request->getShortPathSecond();
        $this->viewName = $basePath . "\\View";
        $this->controllerName = $basePath . "\\Controller";
        $this->viewModelName = $basePath . "\\ViewModel";
    }
    
    public function applyConfiguration(\Router\Contracts\ITriadConfiguration $config)
    {
        $rules = $this->getRules($config);
        if(isset($rules[$this->pattern]))
            $this->applyRules($rules[$this->pattern]);
    }
    
    private function getRules(\Router\Contracts\ITriadConfiguration $config)
    {
        $rules = $config->getConfigArray();
        if(!is_array($rules))
            throw new \UnexpectedValueException("Array was expected.");
        return $rules;
    }
    
    private function applyRules($ruleset)
    {
        $this->viewName = "\\MVC\\".$ruleset[0]."\\View";
        $this->viewModelName = isset($ruleset[1]) ? "\\MVC\\".$ruleset[1]."\\ViewModel" : null;
        $this->controllerName = isset($ruleset[2]) ? "\\MVC\\".$ruleset[2]."\\Controller" : null;
    }
    
    public function getControllerName()
    {
        return $this->controllerName;
    }
    public function getViewModelName()
    {
        return $this->viewModelName;
    }
    public function getViewName()
    {
        return $this->viewName;
    }
    public function getPattern()
    {
        return $this->pattern;
    }
    
    public function setControllerName($name)
    {
        $this->controllerName = $name;
    }
    public function setViewModelName($name)
    {
        $this->viewModelName = $name;
    }
    public function setViewName($name)
    {
        $this->viewName = $name;
    }
    public function setPattern($name)
    {
        $this->pattern = $name;
    }
}