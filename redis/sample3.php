<?php
require 'RedisArr.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$time = microtime(TRUE);
//$redis = new Redis();
//$redis->connect('127.0.0.1', 6379);
//$redis->setOption(Redis::OPT_SERIALIZER, Redis::SERIALIZER_PHP);
////$redis->multi(Redis::PIPELINE);
//for ($i=0; $i<1; $i++) {
//    $redis->set('a'.$i, array('c' => $i));
//}
//
//$time2 = microtime(TRUE);
//
//echo ($time2-$time);

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
RedisEngine::setKeys('hienbv', $clients);
$rs = new RedisArr('hienbv');
var_dump($rs['id']);