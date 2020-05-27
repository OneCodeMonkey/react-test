<?php

$http = new Swoole\Http\Server("0.0.0.0", 9501);

$http->on('request', function ($request, $response) {
    $username = $request->post["username"];
    $videoId = $request->post["video_id"];
    $algo = $request->post["algo"];
    $response->header("Content-Type", "application/json; charset=utf-8");
    $response->end(["username" => $username, "video_id" => $video_id, "algo" => $algo]);
});

$http->start();
