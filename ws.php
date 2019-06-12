<?php
/**
 * Created by PhpStorm.
 * User: 崔芳芳
 * Date: 2019/6/11
 * Time: 14:50
 */

//创建websocket服务器对象，监听0.0.0.0:9502端口
$server = new swoole_websocket_server("0.0.0.0", 9502);

//监听WebSocket连接打开事件
$server->on('open', function($server, $req) {
    echo "connection open: {$req->fd}\n";
});

//监听WebSocket消息事件
$server->on('message', function($server, $frame) {
    echo "received message: {$frame->data}\n";
    $server->push($frame->fd, json_encode(["hello", "cuifang"]));
});

//监听WebSocket连接关闭事件
$server->on('close', function($server, $fd) {
    echo "connection close: {$fd}\n";
});

$server->start();