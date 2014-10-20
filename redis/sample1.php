<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$clients = array(
    'id' => 1,
    'name' => 'hienbv',
    'alias' => 'Bui Van Hien',
    'birth' => '1989-05-20',
    'email' => 'hienbv.it@gmail.com',
    'role' => 'user',
    'status' => 3,
    'token' => base64_encode(sha1('hienbv')),
    'address' => array(
        'location1' => 'Address A',
        'location2' => 'Address B',
        'location3' => 'Address C',
        'location4' => 'Address D',
        'location5' => 'Address E',
        'location6' => 'Address F',
    )
);
$data = array();
for ($i=0; $i<=15000;$i++) {
    $data[$i] = $clients;
}

//$time = microtime(TRUE);
//
//$content = serialize($data);
//unserialize($content);
//
//$time2 = microtime(TRUE);
////var_dump($rs);
//echo 'Array: '.($time2-$time) . '<br>';

//$time = microtime(TRUE);
//$memcache_obj = memcache_connect('127.0.0.1', 11211);
//memcache_set($memcache_obj, 'user', $data);
//$rs = memcache_get($memcache_obj, 'user');
////var_dump($rs);
//$time2 = microtime(TRUE);
//
//echo 'Memcached: ' . ($time2-$time) . '<br>';

$time = microtime(TRUE);
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
//$redis->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_PHP);
//$redis->set('user', $data);
//$rs = $redis->get('user');
//
//$redis->hMset('user:1', $data);
//$rs = $redis->hMget('user:1', array_keys($data));
//
$redis->set('user', json_encode($data));
$rs = $redis->get('user');
$rs = json_decode($rs, true);

$time2 = microtime(TRUE);
//var_dump($rs);
echo 'Redis: '.($time2-$time) . '<br>';

//$time = microtime(TRUE);
//
//file_put_contents(__DIR__ . '/redis.txt', serialize($data));
//$content = file_get_contents(__DIR__ . '/redis.txt');
//unserialize($content);
//
//$time2 = microtime(TRUE);
////var_dump($rs);
//echo 'File: '.($time2-$time) . '<br>';
