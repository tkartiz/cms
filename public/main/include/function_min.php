<?php
function read_Json($kind)
{
    // ファイル読込先 ********************************************
    $JsonName = $kind.'.json';
    $JsonFile = '../storage/'.$kind.'/'.$JsonName;
    // ファイル読込先 ********************************************

    $Json = file_get_contents($JsonFile);
    $Json = mb_convert_encoding($Json, 'UTF8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
    $Json = json_decode($Json, true);
    return $Json;
}
?>