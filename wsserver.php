<?php
/**
 * Created by PhpStorm.
 * User: 崔芳芳
 * Date: 2019/6/12
 * Time: 8:55
 */

//创建websocket服务器对象，监听0.0.0.0:9502端口
$ws = new swoole_websocket_server("0.0.0.0", 9502);

//监听WebSocket连接打开事件
$ws->on('open', function ($ws, $request) {
    echo "{$request->fd}\n";
});

//监听WebSocket消息事件
$ws->on('message', function ($ws, $frame) {
//    echo '<pre>';print_r($frame);echo '</pre>';
//    $ws->push($frame->fd,json_encode("hello, welcome"));
    //检测当前有多少链接
    foreach($ws->connections as $fds){
            //判断是否与websocket链接，是否有可能会push失败
            if($ws->isEstablished($fds)){
                echo '<pre>';print_r($frame->data);echo '</pre>';
                $ws->push($fds,$frame->data);
            }
    }
});

//监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});

$ws->start();