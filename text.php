<?php
    $url="https://aip.baidubce.com/oauth/2.0/token?grant_type=client_credentials&client_id=h6YGnbD74LrQCShZMzm3hwBB&client_secret=dF62t6EizOTT1q4LfGxDduRQ3ciaIQdW";

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //执行命令
    $data = curl_exec($ch);
    //关闭URL请求
    curl_close($ch);
    //显示获得的数据
    print_r($data);
?>