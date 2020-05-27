<?php

$path = "/www/wwwroot/react-test/video_tag/records/";

$fileLists = scandir($path);
foreach ($fileLists as $file) {
    $filePath = $path.'/'.$file;

    echo "file--" . $filePath . "<br/>";
}
