<?php

class Singleton {
    public static $instance = null;
    
    public static function getInstance () {
        if (empty(static::$instance)) {
            static::$instance = new Singleton();
        }
        
        return static::$instance;
    }
    
    public function getName () {
        return __METHOD__;
    }
}

