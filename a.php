<?php
/**
 * Created by PhpStorm.
 * User: 崔芳芳
 * Date: 2019/6/11
 * Time: 20:45
 */
$arr = array("测试1","测试2","测试3");//数组

$sarr = unserialize($arr);//产生一个可存储的值(用于存储)
var_dump($sarr);
//echo $sarr;
