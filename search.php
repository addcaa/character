<?php
    if(empty($_GET['text'])){
        echo "on";
    }else{
        echo $_GET['text'];
        header("Content-Type: text/html;charset=utf-8");
        $host='192.168.137.1';
        $user='root';
        $password='root';
        $dbName='character';
        $link=new mysqli($host,$user,$password,$dbName);
        if($link->connect_error){
            die("连接失败：".$link->connect_error);
        }
        $sql="select * from cha";
        $result =mysqli_query($link,$sql);
        while($arr=mysqli_fetch_assoc($result)){
            $data[]=$arr;
        };
        $url="https://aip.baidubce.com/rpc/2.0/nlp/v1/lexer?charset=UTF-8&access_token=24.26616db12c8ffc5fd59cb3428041a8d8.2592000.1562316679.282335-16439458";
        foreach($data as $v){
            $acc=json_encode(['text'=>$v['name']],JSON_UNESCAPED_UNICODE);
            $ch=curl_init();
            //指定URL
            curl_setopt($ch,CURLOPT_URL,$url);
            //设定请求后返回结果
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            //声明使用POST方式来进行发送
            curl_setopt($ch,CURLOPT_POST,1);
            //发送什么数据呢
            curl_setopt($ch,CURLOPT_POSTFIELDS,$acc);
            $js = curl_exec($ch);//运行curl
            echo curl_errno($ch);
            curl_close($ch);
            $post=json_decode($js,true);
            print_r($post['items']['0']['item']);
        }
    }