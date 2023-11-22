<?php
function read_Json($kind, $siteview)
{
    // ファイル読込先 ********************************************
    if($siteview === 'release'){
        $JsonName = $kind . '.json';
    } else {
        $JsonName = 'draft_'.$kind . '.json';
    }
    $JsonFile = '../storage/'.$kind.'/'.$JsonName;
    // ファイル読込先 ********************************************

    $Json = file_get_contents($JsonFile);
    $Json = mb_convert_encoding($Json, 'UTF8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
    $Json = json_decode($Json, true);

    return $Json;
}
?>