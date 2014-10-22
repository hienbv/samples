<?php

class RedisEngine {

    private static $_redis = null;

    public static function getRedis() {
        if (self::$_redis) {
            return self::$_redis;
        }

        try {
            $options = array(
                'host' => '127.0.0.1',
                'port' => 63791
            );
            self::$_redis = $a = new Redis();
            
            if (!self::$_redis->connect($options['host'], $options['port'])) {
                throw new RedisException('Couldn\'t connect Redis server', 10);
            };
        } catch (RedisException $e) {
            var_dump($e);
        }
        return self::$_redis;
    }

    public static function setKeys($key, $value) {
        self::getRedis();
        $value = serialize($value);
        self::$_redis->set($key, $value);
    }

    public static function getKeys($key) {
        self::getRedis();
        return unserialize(self::$_redis->get($key));
    }

}
