<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StackTest
 *
 * @author hienbv
 */
class StackTest extends PHPUnit_Framework_TestCase {
    //put your code here
//    public function testPushAndPop () {
//        $stack = array();
//        $this->assertEquals(0, count($stack));
//        
//        array_push($stack, 'foo');
//        $this->assertEquals('foo', $stack[count($stack)-1]);
//        $this->assertEquals(1, count($stack));
//        
//        $this->assertEquals('foo', array_pop($stack));
//        $this->assertEquals(0, count($stack));
//    }
    
    public function testEmpty () {
        $stack = array();
        $this->assertEquals(0, count($stack));
        
        return $stack;
    }
    
    /**
     * @depends testEmpty
     */
    public function testPush (array $stack) {
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));
        
        return $stack;
    }
    
    /**
     * @depends testPush
     */
    public function testPop (array $stack) {
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
        
        return $stack;
    }
}
