<?php

$http = new Swoole\Http\Server("0.0.0.0", 9501);

$http->on('request', function ($request, $response) {
    $username = $request->get["username"];
    $videoId = $request->get["video_id"];
    $algo = $request->get["algo"];

    $debug = ["username" => $username, "video_id" => $videoId, "algo" => $algo];

    $fout = fopen("log.txt", "a+");
    fwrite($fout, date("Y-m-d H:i:s") . " -- " . json_encode($debug));

    $path = "/www/wwwroot/react-test/video_tag/records/";
    if (!file_exists($path.$username)) {
        $fout2 = fopen($path.$username, "w");
        fwrite($fout2, json_encode([$videoId => $algo]));
        fclose($fout2);
    } else {
        $fin = fopen($path.$username, "r+");
        $data = json_decode(trim(fgets($fin), "\r\n"), true);
        // 重复标记，覆盖之前的结果
        $data[$videoId] = $algo;
        fwrite($fin, json_encode($data));
        fclose($fin);
    }

    $response->header("Content-Type", "application/json; charset=utf-8");
    $response->end($debug);
});

$http->start();
