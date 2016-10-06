<?php
class NbgfRequest
{
	public function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}
	
	public function isPost()
	{
		return $_SERVER['REQUEST_METHOD']==="POST";
	}
	
	public function isGet()
	{
		return $_SERVER['REQUEST_METHOD']==="GET";
	}
	
	public function get($key, $default="")
	{
		if (isset($_GET[$key]))
			return $_GET[$key];
		else return $default;
	}
	
	public function post($key, $default="")
	{
		if (isset($_POST[$key]))
			return $_POST[$key];
		else return $default;
	}
    
    public function request($key, $default="")
	{
		if (isset($_REQUEST[$key]))
			return $_REQUEST[$key];
		else return $default;
	}
	
	public function getIsSet($key)
	{
		return isset($_GET[$key]) && count($_GET[$key])>0;
	}
	
	public function postIsSet($key)
	{
		return isset($_POST[$key]) && count($_POST[$key])>0;
	}
    
    public function requestIsSet($key)
	{
		return isset($_REQUEST[$key]) && count($_REQUEST[$key])>0;
	}
    
    public function getShortPathFirst()
    {
        return ucfirst($this->get("p1"));
    }
    
    public function getShortPathSecond()
    {
        return ucfirst($this->get("p2"));
    }
    
    public function getAction()
    {
        return $this->get("a",null);
    }
	
}