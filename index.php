<?php

use App\Linklist\LinkedList;
use App\Linklist\Node;

require_once 'vendor/autoload.php';


$linkList = new LinkedList();
$linkList->initList();
$linkList->listInsert(1, new Node(['name' => '孙尚香']));
$linkList->listInsert(2, new Node(['name' => '后羿']));
$linkList->listInsert(3, new Node(['name' => '猴子']));
$linkList->listInsert(3, new Node(['name' => '蔡文姬']));
$linkList->listInsert(3, new Node(['name' => '李元芳']));
$linkList->listInsert(3, new Node(['name' => '猪八戒']));
$linkList->listInsert(3, new Node(['name' => '妲己']));


$history = new LinkedList();
$history->initList();
$history->listInsert(1, new Node(['name' => '秦朝']));
$history->listInsert(2, new Node(['name' => '汉朝']));
$history->listInsert(3, new Node(['name' => '唐朝']));


$linkList->union($history);


var_dump($linkList);