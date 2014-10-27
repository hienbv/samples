<?php
include './Singleton.php';
include './FactoryMethod.php';

//echo Singleton::getInstance()->getName();

$creator = new ConcreteCreator();
echo $creator->anOperation();