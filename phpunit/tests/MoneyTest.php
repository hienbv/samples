<?php

/**
 * Description of MoneyTest
 *
 * @author hienbv
 */
include 'src/math.php';
class MoneyTest extends PHPUnit_Framework_TestCase {

    public function testAdd() {
        $this->assertEquals(4, add(2,2));
        $this->assertEquals(-4, add(-2,-2));
        $this->assertEquals(0, add(2,-2));
        $this->assertEquals(0, add(-2,2));
        $this->assertEquals(2, add(0,2));
        $this->assertEquals(-2, add(0,-2));
    }

    public function testSub() {
        $this->assertEquals(0, sub(2,2));
        $this->assertEquals(0, sub(-2,-2));
        $this->assertEquals(4, sub(2,-2));
        $this->assertEquals(-4, sub(-2,2));
        $this->assertEquals(-2, sub(0,2));
        $this->assertEquals(-2, sub(0,-2));
    }
}