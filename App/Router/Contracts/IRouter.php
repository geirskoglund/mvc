<?php
namespace Router\Contracts;

interface IRouter
{
    public function instantiate(ITriadName $names); 
}
