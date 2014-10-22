<?php
require 'RedisEngine.php';

class RedisArr implements \ArrayAccess, \Countable, \Serializable {
    protected $container = null;
    
    public function __construct($key) {
        $this->container = RedisEngine::getKeys($key);
    }
    
    public function count($mode = 'COUNT_NORMAL') {
        return count($this->container);
    }

    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function serialize() {
        return serialize($this->container);
    }

    public function unserialize($serialized) {
        $this->container = unserialize($serialized);
    }

//put your code here
}
