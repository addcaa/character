<?php
/**
 * Created by PhpStorm.
 * User: 崔芳芳
 * Date: 2019/6/11
 * Time: 14:47
 */

$http = new swoole_http_server("0.0.0.0", 9501);

$http->on("start", function ($server) {
    echo "Swoole http server is started at http://1.0.0.0:9501\n";
});

$http->on("request", function ($request, $response) {
    $response->header("Content-Type", "text/plain");
    $response->end("Hello World\n");
});

$http->start();