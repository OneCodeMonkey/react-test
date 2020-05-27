<?php

$http = new Swoole\Http\Server("0.0.0.0", 9501);

$http->on('request', function ($request, $response) {
    $username = $request->get["username"];
    $videoId = $request->get["video_id"];
    $algo = $request->get["algo"];

    $debug = ["username" => $username, "video_id" => $videoId, "algo" => $algo];

    $fout = fopen("log.txt", "a+");
    fwrite($fout, date("Y-m-d H:i:s") . " -- " . json_encode($debug));
    var_dump($debug);

    $response->header("Content-Type", "application/json; charset=utf-8");
    $response->end($debug);
});

$http->start();
