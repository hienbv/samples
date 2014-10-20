<?php

class ABC implements \ArrayAccess, \Countable, \Serializable {
    
    public function count($mode = 'COUNT_NORMAL') {
        
    }

    public function offsetExists($offset) {
        
    }

    public function offsetGet($offset) {
        
    }

    public function offsetSet($offset, $value) {
        
    }

    public function offsetUnset($offset) {
        
    }

    public function serialize() {
        
    }

    public function unserialize($serialized) {
        
    }
}

$a = new ABC(array('a', 'a'));
$a->unserialize($serialized);
var_dump($a[0]);