<?php
function read_Json($kind, $siteview, $level)
{
    // ファイル読込先 ********************************************
    if ($siteview === 'release') {
        $JsonName = $kind . '.json';
    } else {
        $JsonName = 'draft_' . $kind . '.json';
    }
    if ($level === 3) {
        $JsonFile = '../../asset/storage/' . $kind . '/' . $JsonName;
    } else if ($level === 2) {
        $JsonFile = '../asset/storage/' . $kind . '/' . $JsonName;
    } else {
        $JsonFile = './asset/storage/' . $kind . '/' . $JsonName;
    }

    // ファイル読込先 ********************************************

    $Json = file_get_contents($JsonFile);
    $Json = mb_convert_encoding($Json, 'UTF8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
    $Json = json_decode($Json, true);
    return $Json;
}

function read_layer($level)
{
    // パス階層調整
    if ($level === 3) {
        $pre = '../../';
        $linkfile = $pre;
    } else if ($level === 2) {
        $pre = '../';
        $linkfile = $pre;
    } else {
        $pre = '';
        $linkfile = '';
    }
    // パス階層調整
    return $linkfile;
}
