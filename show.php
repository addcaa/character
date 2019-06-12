<?php
$url="https://aip.baidubce.com/rpc/2.0/nlp/v1/lexer?charset=UTF-8&access_token=24.26616db12c8ffc5fd59cb3428041a8d8.2592000.1562316679.282335-16439458";
$data=json_encode(['text'=>"北京大学"],JSON_UNESCAPED_UNICODE);
$ch=curl_init();
//指定URL
curl_setopt($ch,CURLOPT_URL,$url);
//设定请求后返回结果
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//声明使用POST方式来进行发送
curl_setopt($ch,CURLOPT_POST,1);
//发送什么数据呢
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$data = curl_exec($ch);//运行curl
echo curl_errno($ch);
curl_close($ch);
$arr=json_decode($data,true);

print_r($arr);