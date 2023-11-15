<?php
function read_Json($JsonFile)
{
    $BannerJson = file_get_contents($JsonFile);
    $BannerJson = mb_convert_encoding($BannerJson, 'UTF8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
    $BannerJson = json_decode($BannerJson, true);
    return $BannerJson;
}
?>