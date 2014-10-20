<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$time = microtime(TRUE);
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_PHP);
//$redis->multi(Redis::PIPELINE);
for ($i=0; $i<1; $i++) {
    $redis->set('a'.$i, array('c' => $i));
}

$time2 = microtime(TRUE);

echo ($time2-$time);