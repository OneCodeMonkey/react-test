<?php

$path = "/www/wwwroot/react-test/video_tag/records/";
$alternativeList = ["original", "mobilenet", "nasnet", "resnet", "technical_score"];
$fixLength = 64;

$fileLists = scandir($path);

function fixLength($str, $length) {
    if (strlen($str) >= $length) {
        return $str;
    } else {
        $str .= str_repeact(" ", $length - strlen($str));
    }
    return str;
}

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

            if (isset($algoStats[$algo])) {
                $algoStats[$algo] = intval($algoStats[$algo]) + 1;
            } else {
                $algoStats[$algo] = 1;
            }
        }
    }
}

echo fixLength("<h3 style='color: blue;'>divide by algo:</h3>", $fixLength);
foreach ($algoStats as $k => $v) {
    echo "<h4>".$k." -- ".$v."</h4>";
}

echo "<br>";

echo "<h3 style='color: blue;'>divide by algo:</h3>";
foreach ($videoStats as $videoId => $algoDetail) {
    echo fixLength("<h4>".$videoId." >>> ", $fixLength);
    $temp = "";
    foreach ($alternativeList as $item) {
        if (isset($algoDetail[$item])) {
            $temp .= $item." -- ".$algoDetail[$item]." | ";
            $temp = fixLength($temp, $fixLength);
        }
    }
    $temp = rtrim($temp, "| ");
    echo $temp."</h4>";
}
