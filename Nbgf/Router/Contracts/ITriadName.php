<?php
namespace Router\Contracts;

interface ITriadName {

    public function getControllerName();
    public function getViewModelName();
    public function getViewName();
    public function getPattern();
    public function setControllerName($name);
    public function setViewModelName($name);
    public function setViewName($name);
    public function setPattern($name);
    
    public function applyConfiguration(ITriadConfiguration $config);
}