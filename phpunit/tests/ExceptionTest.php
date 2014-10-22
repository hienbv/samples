<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExceptionTest
 *
 * @author hienbv
 */
class ExceptionTest extends PHPUnit_Framework_TestCase {
    //put your code here
    /**
     * @expectedException Exception
     */
    public function testException () {
        throw new Exception;
    }
}
