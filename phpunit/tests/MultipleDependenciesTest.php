<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MultipleDependenciesTest
 *
 * @author hienbv
 */
class MultipleDependenciesTest extends PHPUnit_Framework_TestCase {

    public function testProducerFirst() {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond() {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer() {
        $this->assertEquals(
                array('first', 'second'), func_get_args()
        );
        var_dump(func_get_args());
    }

}
