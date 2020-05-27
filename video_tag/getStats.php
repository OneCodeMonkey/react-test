<?php

$path = "/www/wwwroot/react-test/video_tag/records/";

$fileLists = scandir($path);

$result = [];
foreach ($fileLists as $file) {
    $filePath = $path.'/'.$file;
    if ($file == '.' || $file == '..') {
        continue;
    }

    $finTemp = fopen($filePath, "r");
    $content = trim(fgets($finTemp), "\n");
    $data = json_decode($content, true);
    $result[] = $data;
}
var_dump($result);
