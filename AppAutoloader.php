<?php

spl_autoload_register('AppAutoloader::loader');

class AppAutoloader
{
    
    public static function loader($className)
    {
        $fileName = 'App/' . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        
        
        if (!file_exists($fileName))
        {
            if(!PRODUCTION_VERSION) //trap casing errors in dev
                 return false;
                
            $fileName = self::getRealFilePath($fileName);
            
            if(!isset($fileName) || !file_exists($fileName))
                return false;
        }
        
        require_once $fileName;
        return true;
    }
        
    private static function getRealFilePath($candidate)
    {
        $candidate = strtolower($candidate);
        $it = new RecursiveDirectoryIterator("App");
        foreach(new RecursiveIteratorIterator($it) as $file) 
        {
            $name = $file->getPath().DIRECTORY_SEPARATOR.$file->getFileName();
            if(strtolower($name)==$candidate) 
                return $name;
        }
        return null;
    }
    
}