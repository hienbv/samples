<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Money
 *
 * @author hienbv
 */
class Money {

    private $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function negate() {
        return new Money(-1 * $this->amount);
    }

}
