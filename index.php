<?php

define('PRODUCTION_VERSION', false);

require_once 'AppAutoloader.php';

$router = new \Router\Router();
$request = new AppRequest;
$triadNames = new \Router\Triad\TriadName();
$config = new \Router\Triad\TriadConfiguration();
$triad = null;

try
{
    $triadNames->initiateFrom($request);
    $triadNames->applyConfiguration($config);
    $triad = $router->instantiate($triadNames);
    $frontController = new \MVC\FrontController($triad);
    $frontController->performActionBasedOn($request);    
    $triad->getView()->render();  
}
catch(Exception $e)
{
    $code= "500";
    if($e instanceof \BadMethodCallException || $e instanceof \DomainException)
        $code = "404";
    
    $error = new \Router\Triad\ErrorTriad($code); 
    $error->getView()->render();
    die;
}

