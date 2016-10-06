<?php

define('PRODUCTION_VERSION', false);

require_once 'AppAutoloader.php';


$dice = new \Dice\Dice;
$router = new \Router\Router($dice);
$request = new AppRequest;
$triadNames = new \Router\Triad\TriadName();
$config = new \Router\Triad\TriadConfiguration();
$triad = null;

try
{
    $triadNames->initiateFrom($request);
    $triadNames->applyConfiguration($config);
    $triad = $router->instantiate($triadNames);
}
catch(Exception $e)
{
    $error = new \Router\Triad\ErrorTriad("404");
    $error->getView()->render();
    die;
}

try
{
    $frontController = new \MVC\FrontController($triad);
    $frontController->performActionBasedOn($request);    
    $triad->getView()->render();    
}
catch(Exception $e)
{
    $error = new \Router\Triad\ErrorTriad("500");
    $error->getView()->render();
    die;
}
