<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataTest
 *
 * @author hienbv
 */
class DataTest extends PHPUnit_Framework_TestCase {

    //put your code here
    /**
     * @dataProvider dataProvider
     */
    public function testAdd($a, $b, $expected) {
        $this->assertEquals($expected, $a + $b);
    }

    public function dataProvider() {
        return array(
            array(0, 0, 0),
            array(0, 1, 1),
            array(1, 0, 1),
            array(1, 1, 3),
            array(1, 1, 3),
            array(-1, 6, 5),
        );
    }

}
