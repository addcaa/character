<?php

$host="192.168.137.1";
$user="character";
$password="root";
$dbName="root";
    $link=new mysqli($host,$user,$password,$dbName);
    if($link->connect_error){
        die("连接失败：".$link->connect_error);
    }
    $sql="select * from cha";
    $result =mysqli_query($link,$sql);
    while($arr=mysqli_fetch_assoc($result)){
        $data[]=$arr;
    };
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<input type="text">
<input type="button" value="点击搜索" id="sub"><br><p></p>
    <?php foreach($data as $v){ ?>
        <b><?php echo $v['name']?></b>
        <p style="width:380px;"><?php echo $v['text']?></p>
    <?php }  ?>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(function(){
        $("#sub").click(function(){
            var text=$(this).prev("input").val();
            $.get(
                'http://character.com/search.php?text='+text,
                function (res) {
                    console.log(res);
                }
            );
        })
    })
</script>