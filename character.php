<?php
    function text($url,$data){
        //初使化init方法
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
        return ($data);
    }
$url="https://nlp.cn-shanghai.aliyuncs.com/nlp/api/wordsegment/{Domain}";
$data=json_encode([
    'lang'=>'ZH',
    'text'=>'Iphone专用数据线'
],JSON_UNESCAPED_UNICODE);
var_dump(text($url,$data));