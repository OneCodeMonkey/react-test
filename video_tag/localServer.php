<?php

$http = new Swoole\Http\Server("0.0.0.0", 9501);

$http->on('request', function ($request, $response) {
    $username = $request->get["username"];
    $videoId = $request->get["video_id"];
    $algo = $request->get["algo"];

    $debug = ["username" => $username, "video_id" => $videoId, "algo" => $algo];

    var_dump($debug);

    $response->header("Content-Type", "application/json; charset=utf-8");
    $response->end($debug);
});

$http->start();
