<?php

    $file_name='./compile/'.date('Y-m-d').'.html';
    $time=time();
    if(file_exists($file_name) && $time-stat($file_name)['mtime']<1800){
        $arr_name=file_get_contents($file_name);
        echo "有缓存";print_r($arr_name);die;
    }else{
        if(file_exists($file_name)){
            unlink($file_name);
        }
        $link = new PDO('mysql:host=192.168.137.1;dbname=character', 'root', 'root');
        $sql="select * from cha";
        $res=$link->query($sql);
        $arr=$res->fetchAll(PDO::FETCH_ASSOC);
        $str="";
        foreach($arr as $v){
            $str.="<h3>".$v['name']."</h3><p style=\"width:380px;\">".$v['text']."</p>";
        }
        echo $str;
        $data=ob_get_contents();//把存入缓存
//        ob_end_flush();//输出缓冲区内容并关闭缓冲
        file_put_contents($file_name,$data);
    }











