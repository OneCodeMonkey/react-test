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

$algoStats = [];
$videoStats = [];
foreach ($result as $item) {
    foreach ($item as $videoId => $algo) {
        if (!empty($algo)) {
            if (isset($videoStats[$videoId][$algo])) {
                $videoStats[$videoId][$algo] = intval($videoStats[$videoId][$algo]) + 1;
            } else {
                $videoStats[$videoId][$algo] = 1;
            }

            if (isset($algoStats[$algo]) {
                $algoStats[$algo] = intval($algoStats[$algo]) + 1;
            } else {
                $algoStats[$algo] = 1;
            }
        }
    }
}

var_dump($algoStats);
echo "<br>";
echo "<br>";
var_dump($videoStats);
