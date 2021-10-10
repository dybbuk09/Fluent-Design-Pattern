<?php

namespace FluentAPI;

class Fluent
{
    /**
     * Dynamically create non-static method
     */
    public function __call($method, $args)
    {
        return $this->call($method, $args);
    }

    /**
     * Dynamically create static method
     */
    public function __callStatic($method, $args)
    {
        //Load alias configuration file
        $alias = require_once dirname(__DIR__) . '/config/alias.php';
        
        //Get the name of service class from alias
        $instance = new $alias[get_called_class()];

        //return new instanse of the call
        return (new static)->call($instance, $method, $args);
    }

    /**
     * Call the actual method of the class
     */
    private function call($instance, $method, $args)
    {
        if (! method_exists($instance , $method)) {
            throw new Exception('Call undefined method ' . $method);
        }
        return $instance->{$method}(...$args);
    }
}