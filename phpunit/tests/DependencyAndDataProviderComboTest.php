<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DependencyAndDataProviderComboTest
 *
 * @author hienbv
 */
class DependencyAndDataProviderComboTest extends PHPUnit_Framework_TestCase {

    //put your code here
    public function provider() {
        return array(array('provider1'), array('provider2'), array('provider3'));
    }

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
     * @dataProvider provider
     */
    public function testConsumer() {
        $this->assertEquals(
                array('provider1', 'first', 'second'), func_get_args()
        );
    }

}
