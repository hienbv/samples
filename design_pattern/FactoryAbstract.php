<?php

abstract class AbstractProductA {
    public abstract function operationA ();
    public abstract function operationB ();
}

class ProductA extends AbstractProductA {
    public function operationA() {
        return __METHOD__;
    }

    public function operationB() {
        return __METHOD__;
    }

}

class ProductA2 extends AbstractProductA {
    public function operationA() {
        return __METHOD__;
    }

    public function operationB() {
        return __METHOD__;
    }

}

abstract class AbstractProductB {
    public abstract function operationA1();
}
class ProductB extends AbstractProductB {
    public function operationA1() {
        return __METHOD__;
    }

}

abstract  class AbstractFactory {
    public abstract function createProductA();
    public abstract function createProductB();
}

class ConcreteFatory1 extends AbstractFactory {
    public function createProductA() {
        return new ProductA();
    }

    public function createProductB() {
        return new ProductB();
    }

}