<?php

interface Product {}

abstract class Creator {
    public function anOperation () {
        return __METHOD__;
    }
    
    protected abstract function factoryMethod ();
}

class ConcreteProduct implements Product {
    
}

class ConcreteCreator extends Creator {
    protected function factoryMethod() {
        return new ConcreteProduct();
    }
}

//class Client {
//    
//}