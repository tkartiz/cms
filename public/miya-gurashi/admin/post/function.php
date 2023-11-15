<?php
// *****　このログイン認証確認コードは、管理用phpに全適しているので消さないでください　***************
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
// *****　このログイン認証確認コードは、管理用phpに全適しているので消さないでください　***************

// ==================================================================================
// 共通関数
// ==================================================================================
// *****　Jsonファイル読込み関数　***************
function read_Json($JsonFile)
{
    $array = file_get_contents($JsonFile);
    $array = mb_convert_encoding($array, 'UTF8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
    $array = json_decode($array, true);
    return $array;
}

// *****　Jsonファイル書き込み関数　***************
function write_Json($JsonFile, $array)
{
    $array = array_values($array);
    $array = json_encode($array, JSON_UNESCAPED_UNICODE);
    file_put_contents($JsonFile, $array);
}

// *****　画像登録関数　***************
function make_filename($pre, $stamp, $image_folder_path, $elem_org, $elem, $elem_tmp)
{
    if (!empty($elem) && !empty($elem_tmp)) {
        $to_file =  $stamp . $pre . $elem;
        $file_path = $image_folder_path . $to_file;
        move_uploaded_file($elem_tmp, $file_path);
    } else if (!empty($elem_org) && empty($elem)) {
        $to_file =  $stamp . $pre . explode('_', $elem_org)[2];
        $from_path =  $image_folder_path . $elem_org;
        $to_path = $image_folder_path . $to_file;
        copy($from_path, $to_path);
    } else {
        $to_file = "";
    }
    return $to_file;
}

// ==================================================================================
// お知らせ
// ==================================================================================
// *****　お知らせ記事新規作成関数　***************
function add_announce($createTime, $release, $stamp, $date, $mark, $title, $content_array)
{
    // ========== ファイル保存先 ================
    $JsonName = "draft_announce.json";
    $JsonFile = './asset/post/json/' . $JsonName;
    $image_folder_path = './asset/post/images/announce/';
    // ========== ファイル保存先 ================

    // ========= お知らせ欄と画像数の設定 ==========
    $colNum = 6;
    $colImgNum = 3;
    // ========= お知らせ欄と画像数の設定 ==========



    // ========== 入力値取得 =========================================
    $AddJson = array(
        "createTime" => $createTime,
        "release" => $release,
        "stamp" => $stamp,
        "date" => $date,
        "mark" => $mark,
        "title" => $title,
    );

    $itemNum = 1 + 8 * $colImgNum;
    for ($i = 0; $i < $colNum; $i++) {
        $AddJson['content' . ($i + 1)] = $content_array[$i][$i * $itemNum];
        for ($j = 0; $j < $colImgNum; $j++) {
            $pre = '_a-' . ($i + 1) . ($j + 1) . '_';
            $image_org = $content_array[$i][$i * $itemNum + 8 * $j + 2];
            if ($content_array[$i][$i * $itemNum + 8 * $j + 1] == "no") {
                $image_name = $content_array[$i][$i * $itemNum + 8 * $j + 3];
                $image_tmp = $content_array[$i][$i * $itemNum + 8 * $j + 4];
            } else {
                $image_name = "";
                $image_tmp = "";
            }
            $to_colImg[$i][$j] = make_filename($pre, $stamp, $image_folder_path, $image_org, $image_name, $image_tmp);

            $AddJson['col' . ($i + 1) . 'Img' . ($j + 1)] = $to_colImg[$i][$j];
            $AddJson['col' . ($i + 1) . 'Img' . ($j + 1) . 'Cap'] = $content_array[$i][$i * $itemNum + 8 * $j + 5];
            $AddJson['col' . ($i + 1) . 'Img' . ($j + 1) . 'Location'] = $content_array[$i][$i * $itemNum + 8 * $j + 6];
            $AddJson['col' . ($i + 1) . 'Img' . ($j + 1) . 'Width'] = $content_array[$i][$i * $itemNum + 8 * $j + 7];
            $AddJson['col' . ($i + 1) . 'Img' . ($j + 1) . 'Height'] = $content_array[$i][$i * $itemNum + 8 * $j + 8];
        }
    }

    $announces = read_Json($JsonFile);
    $announces[] = $AddJson;

    // ========== Jsonファイルに書き込み =========================================
    write_Json($JsonFile, $announces);
}

// *****　お知らせ記事編集関数　***************
function update_announce($createTime, $release, $update_stamp, $date, $mark, $title, $content_array)
{
    // ========== ファイル保存先 ================
    $JsonName = "draft_announce.json";
    $JsonFile = './asset/post/json/' . $JsonName;
    $image_folder_path = './asset/post/images/announce/';
    // ========== ファイル保存先 ================

    // ========= お知らせ欄と画像数の設定 ==========
    $colNum = 6;
    $colImgNum = 3;
    // ========= お知らせ欄と画像数の設定 ==========


    // ========== 入力値取得 =========================================
    $update_Json = array(
        "createTime" => $createTime,
        "release" => $release,
        "stamp" => $update_stamp,
        "date" => $date,
        "mark" => $mark[1],
        "title" => $title,
    );

    $search_stamp = "";
    $itemNum = 1 + 8 * $colImgNum;
    for ($i = 0; $i < $colNum; $i++) {
        $update_Json['content' . ($i + 1)] = $content_array[$i][$i * $itemNum];
        for ($j = 0; $j < $colImgNum; $j++) {
            $pre = '_a-' . ($i + 1) . ($j + 1) . '_';
            // このパラメータは変更しないでください。
            $image_org = $content_array[$i][$i * $itemNum + 8 * $j + 2];
            if ($content_array[$i][$i * $itemNum + 8 * $j + 2] !== "") {
                $search_stamp = explode('_', $content_array[$i][$i * $itemNum + 8 * $j + 2])[0];
            } else {
                $search_stamp = explode('_', $mark[0])[0];
            }
            // このパラメータは変更しないでください。

            $image_name = $content_array[$i][$i * $itemNum + 8 * $j + 3];
            $image_tmp = $content_array[$i][$i * $itemNum + 8 * $j + 4];

            if ($content_array[$i][$i * $itemNum + 8 * $j + 1] === "no") {
                $update_Json['col' . ($i + 1) . 'Img' . ($j + 1) . 'Cap'] = $content_array[$i][$i * $itemNum + 8 * $j + 5];
                $update_Json['col' . ($i + 1) . 'Img' . ($j + 1) . 'Location'] = $content_array[$i][$i * $itemNum + 8 * $j + 6];
                $update_Json['col' . ($i + 1) . 'Img' . ($j + 1) . 'Width'] = $content_array[$i][$i * $itemNum + 8 * $j + 7];
                $update_Json['col' . ($i + 1) . 'Img' . ($j + 1) . 'Height'] = $content_array[$i][$i * $itemNum + 8 * $j + 8];
            } else if ($content_array[$i][$i * $itemNum + 8 * $j + 1] === "yes") {
                $image_org_path = $image_folder_path . $image_org;

                unlink($image_org_path);
                $image_org = "";

                $update_Json['col' . ($i + 1) . 'Img' . ($j + 1) . 'Cap'] = "";
                $update_Json['col' . ($i + 1) . 'Img' . ($j + 1) . 'Location'] = "";
                $update_Json['col' . ($i + 1) . 'Img' . ($j + 1) . 'Width'] = "";
                $update_Json['col' . ($i + 1) . 'Img' . ($j + 1) . 'Height'] = "";
            }

            $to_colImg[$i][$j] = make_filename($pre, $update_stamp, $image_folder_path, $image_org, $image_name, $image_tmp);
            $update_Json['col' . ($i + 1) . 'Img' . ($j + 1)] = $to_colImg[$i][$j];
        }
    }

    $announces = read_Json($JsonFile);
    $announces[] = $update_Json;

    // ========== Jsonファイルに書き込み =========================================
    write_Json($JsonFile, $announces);

    // ========== 古い配列をJsonファイルから削除 ==================================
    delete_announce($search_stamp, $createTime);
}

// *****　お知らせ記事消去関数　***************
function delete_announce($del_stamp, $del_createTime)
{
    // ========== ファイル保存先 ================
    $JsonName = "draft_announce.json";
    $JsonFile = './asset/post/json/' . $JsonName;

    $JsonName_open = "announce.json";
    $JsonFile_open = './asset/post/json/' . $JsonName_open;

    $image_folder_path = './asset/post/images/announce/';
    // ========== ファイル保存先 ================

    // ========= お知らせ欄と画像数の設定 ==========
    $colNum = 6;
    $colImgNum = 3;
    // ========= お知らせ欄と画像数の設定 ==========

    // ========== Jsonファイルの読込み ==================================
    $tmp_announces = read_Json($JsonFile);
    $open_announce = read_Json($JsonFile_open);

    // ========== プレビュー用配列から削除配列の検索 ========================================
    if ($del_stamp !== "") {
        $nameArray = array_column($tmp_announces, 'stamp');
        $keyIndex = array_search((int)$del_stamp, $nameArray, true);
    } else {
        $nameArray = array_column($tmp_announces, 'createTime');
        $keyIndex = array_search((int)$del_createTime, $nameArray, true);
    }

    // ========== 本番用配列から削除配列の検索 ========================================
    if ($del_stamp !== "") {
        $nameArray_open = array_column($open_announce, 'stamp');
        $keyIndex_open = array_search((int)$del_stamp, $nameArray_open, true);
    } else {
        $nameArray_open = array_column($open_announce, 'createTime');
        $keyIndex_open = array_search((int)$del_createTime, $nameArray_open, true);
    }

    // ========== 削除対象有無の動作設定 =================================
    if ($keyIndex !== False && $keyIndex_open === False) { // 本番で使用していない画像のみ消去する
        for ($i = 0; $i < $colNum; $i++) {
            for ($j = 0; $j < $colImgNum; $j++) {
                if (!empty($tmp_announces[$keyIndex]['col' . ($i + 1) . 'Img' . ($j + 1)])) {
                    $del_image = $image_folder_path . $tmp_announces[$keyIndex]['col' . ($i + 1) . 'Img' . ($j + 1)];
                    unlink($del_image);
                }
            }
        }
    } else if ($keyIndex_open !== False) {
        echo ("<script type='text/javascript'>alert('本番で画像使用中なので削除できません。');</script>");
    } else {
        echo ("<script type='text/javascript'>alert('一致するデータは見つかりませんでした。');</script>");
    }

    unset($tmp_announces[$keyIndex]); // Jsonファイルから該当配列を削除する
    write_Json($JsonFile, $tmp_announces);
}

// ==================================================================================
// コース
// ==================================================================================
// *****　コース新規作成関数　***************
function add_course($num, $release, $stamp, $title1_array, $title2_array, $title3_array, $photo_array, $tourTable_array, $reqbutton_array)
{
    // ========== ファイル保存先 ================
    $JsonName = "draft_course.json";
    $JsonFile = './asset/post/json/' . $JsonName;
    $image_folder_path = './asset/post/images/course/';
    // ========== ファイル保存先 ================

    // ========== 説明画像数 ================
    $photoNum = 4;
    // ========== 説明画像数 ================

    // ========== ツアー工程テーブル数・項目数 ================
    $tableNum = "3";
    $itemNum = "15";
    // ========== ツアー工程テーブル数・項目数 ================



    // ========== 入力値取得 =========================================
    $pre = '_' . $num . '-t1_';
    $to_title1 = make_filename($pre, $stamp, $image_folder_path, "", $title1_array[0], $title1_array[1]);

    $pre = '_' . $num . '-i1_';
    $to_img1 = make_filename($pre, $stamp, $image_folder_path, "", $title1_array[3], $title1_array[4]);

    $pre = '_' . $num . '-t2_';
    $to_title2 = make_filename($pre, $stamp, $image_folder_path, "", $title2_array[0], $title2_array[1]);

    $pre = '_' . $num . '-t3_';
    $to_title3 = make_filename($pre, $stamp, $image_folder_path, "", $title3_array[0], $title3_array[1]);

    $to_photo = [];
    for ($j = 0; $j < $photoNum; $j++) {
        $pre = '_' . $num . '-p' . ($j + 1) . '_';
        $to_photo[$j] = make_filename($pre, $stamp, $image_folder_path, "", $photo_array[$j][0], $photo_array[$j][1]);
    }

    $pre = '_' . $num . '-req_';
    $to_reqbutton = make_filename($pre, $stamp, $image_folder_path, "", $reqbutton_array[0], $reqbutton_array[1]);

    $AddJson = array(
        "course" => $num,
        "release" => $release,
        "stamp" => $stamp,
        "title1" => $to_title1,
        "img1" => $to_img1,
        "content1" => $title1_array[2],
        "title2" => $to_title2,
        "content2" => $title2_array[2],
        "title3" => $to_title3,
        "content3" => $title3_array[2],
        "reqbutton" => $to_reqbutton,
        "link" => $reqbutton_array[2]
    );

    for ($i = 0; $i < $photoNum; $i++) {
        $AddJson["photo" . ($i + 1)] = $to_photo[$i];
        $AddJson["photo" . ($i + 1) . 'Cap'] = $photo_array[$i][2];
        $AddJson["photo" . ($i + 1) . 'text'] = $photo_array[$i][3];
        $AddJson["photo" . ($i + 1) . 'Type'] = $photo_array[$i][4];
    }

    for ($j = 0; $j < $tableNum; $j++) {
        for ($i = 0; $i < $itemNum; $i++) {
            $AddJson['tourTable' . $j . '-title'] = $tourTable_array[$j][0][0];
            $AddJson['tourTable' . $j . '-time' . $i] = $tourTable_array[$j][$i][1];
            $AddJson['tourTable' . $j . '-item' . $i] = $tourTable_array[$j][$i][2];
        }
    }

    $courses = read_Json($JsonFile);
    $courses[] = $AddJson;

    // ========== Jsonファイルに書き込み =========================================
    write_Json($JsonFile, $courses);
}

// *****　コース編集関数　***************
function update_course($num, $release, $update_stamp, $title1_array, $title2_array, $title3_array, $photo_array, $tourTable_array, $reqbutton_array)
{
    // ========== ファイル保存先 ================
    $JsonName = "draft_course.json";
    $JsonFile = './asset/post/json/' . $JsonName;
    $image_folder_path = './asset/post/images/course/';
    // ========== ファイル保存先 ================

    // ========== 説明画像数 ================
    $photoNum = 4;
    // ========== 説明画像数 ================

    // ========== ツアー工程テーブル数・項目数 ================
    $tableNum = "3";
    $itemNum = "15";
    // ========== ツアー工程テーブル数・項目数 ================



    // ========== 入力値取得 =========================================
    $pre = '_' . $num;

    $pre = '_' . $num . '-t1_';
    $to_title1 = make_filename($pre, $update_stamp, $image_folder_path, $title1_array[0], $title1_array[1], $title1_array[2]);

    $pre = '_' . $num . '-i1_';
    $to_img1 = make_filename($pre, $update_stamp, $image_folder_path, $title1_array[4], $title1_array[5], $title1_array[6]);

    // このパラメータは変更しないでください。
    // $edit_stampでは配列検索できずに他の配列が削除されてしまいます（原因不明）。
    $search_stamp = explode('_', $title1_array[4])[0]; //トップ画像名の最初のstamp番号を取得
    // このパラメータは変更しないでください。

    $pre = '_' . $num . '-t2_';
    $to_title2 = make_filename($pre, $update_stamp, $image_folder_path, $title2_array[0], $title2_array[1], $title2_array[2]);

    $pre = '_' . $num . '-t3_';
    $to_title3 = make_filename($pre, $update_stamp, $image_folder_path, $title3_array[0], $title3_array[1], $title3_array[2]);

    $pre = '_' . $num . '-req_';
    $to_reqbutton = make_filename($pre, $update_stamp, $image_folder_path,  $reqbutton_array[0], $reqbutton_array[1], $reqbutton_array[2]);

    $update_Json = array(
        "course" => $num,
        "release" => $release,
        "stamp" => $update_stamp,
        "title1" => $to_title1,
        "img1" => $to_img1,
        "content1" => $title1_array[3],
        "title2" => $to_title2,
        "content2" => $title2_array[3],
        "title3" => $to_title3,
        "content3" => $title3_array[3],
        "reqbutton" => $to_reqbutton,
        "link" => $reqbutton_array[3]
    );

    $to_photo = [];
    for ($i = 0; $i < $photoNum; $i++) {
        $pre = '_' . $num . '-p' . ($i + 1) . '_';
        if ($photo_array[$i][6] === "yes") {
            $image_org_path = $image_folder_path . $photo_array[$i][0];
            unlink($image_org_path);
            $photo_array[$i][0] = "";
            $photo_array[$i][3] = "";
            $photo_array[$i][4] = "";
            $photo_array[$i][5] = "";
        }
        $to_photo[$i] = make_filename($pre, $update_stamp, $image_folder_path, $photo_array[$i][0], $photo_array[$i][1], $photo_array[$i][2]);

        $update_Json["photo" . ($i + 1)] = $to_photo[$i];
        $update_Json["photo" . ($i + 1) . 'Cap'] = $photo_array[$i][3];
        $update_Json["photo" . ($i + 1) . 'text'] = $photo_array[$i][4];
        $update_Json["photo" . ($i + 1) . 'Type'] = $photo_array[$i][5];
    }

    for ($j = 0; $j < $tableNum; $j++) {
        for ($i = 0; $i < $itemNum; $i++) {
            $update_Json['tourTable' . $j . '-title'] = $tourTable_array[$j][0][0];
            $update_Json['tourTable' . $j . '-time' . $i] = $tourTable_array[$j][$i][1];
            $update_Json['tourTable' . $j . '-item' . $i] = $tourTable_array[$j][$i][2];
        }
    }

    $courses = read_Json($JsonFile);
    $courses[] = $update_Json;

    // ========== Jsonファイルに書き込み =========================================
    write_Json($JsonFile, $courses);

    // ========== 古い配列をJsonファイルから削除 ==================================
    delete_course($search_stamp);
}

// *****　コース消去関数　***************
function delete_course($del_stamp)
{
    // ========== ファイル保存先 ================
    $JsonName = "draft_course.json";
    $JsonFile = './asset/post/json/' . $JsonName;
    $image_folder_path = './asset/post/images/course/';
    // ========== ファイル保存先 ================

    // ========== 画像ファイル ==================
    $ImageFiles = array(
        "title1", "img1", "title2", "title3", "photo1",
        "photo2", "photo3", "photo4", "reqbutton"
    );
    // ========== 画像ファイル ==================

    // ========== Jsonファイルの読込み ==================================
    $tmp_courses = read_Json($JsonFile);

    // ========== 削除配列の検索 ========================================
    $nameArray = array_column($tmp_courses, 'stamp');
    $keyIndex = array_search((int)$del_stamp, $nameArray, true);

    // ========== 削除対象有無の動作設定 =================================
    if ($keyIndex !== False) {
        foreach ($ImageFiles as $ImageFile) :
            if (!empty($tmp_courses[$keyIndex][$ImageFile])) {
                $del_image = $image_folder_path . $tmp_courses[$keyIndex][$ImageFile];
                unlink($del_image);
            }
        endforeach;
        unset($tmp_courses[$keyIndex]);
        write_Json($JsonFile, $tmp_courses);
    } else {
        echo "<script type='text/javascript'>alert('一致するデータは見つかりませんでした');</script>";
    }
}

// ==================================================================================
// オプション
// ==================================================================================
// *****　オプション新規作成関数　***************
function add_option($num, $release, $stamp, $image_array, $title_array, $schedule_array, $transpo_array)
{
    // ========== ファイル保存先 ================
    $JsonName = "draft_option.json";
    $JsonFile = './asset/post/json/' . $JsonName;
    $image_folder_path = './asset/post/images/option/';
    // ========== ファイル保存先 ================

    // ========= オプション画像数の設定 ==========
    $opimgNum = 1;
    // ========= オプション画像数の設定 ==========

    // ========== 入力値取得 =========================================
    $AddJson = array(
        "option" => $num,
        "release" => $release,
        "stamp" => $stamp,
        "title1" => $title_array[0],
        "title2" => $title_array[1],

        "day" => $schedule_array[0],
        "fee" => $schedule_array[2],

        "transpo1" => $transpo_array[0],
        "transpo1Content" => $transpo_array[1],
        "transpo2" => $transpo_array[2],
        "transpo2Content" => $transpo_array[3],
        "transpo3" => $transpo_array[4],
        "transpo3Content" => $transpo_array[5],
    );

    $to_image = [];
    for ($i = 0; $i < $opimgNum; $i++) {
        $pre = '_' . $num . '-o' . ($i + 1) . '_';
        $to_image[$i] = make_filename($pre, $stamp, $image_folder_path, "", $image_array[$i][0], $image_array[$i][1]);

        $AddJson["image" . ($i + 1)] = $to_image[$i];
    };

    $options = read_Json($JsonFile);
    $options[] = $AddJson;

    // ========== Jsonファイルに書き込み =========================================
    write_Json($JsonFile, $options);
}

// *****　オプション編集関数　***************
function update_option($num, $release, $update_stamp, $image_array, $title_array, $schedule_array, $transpo_array)
{
    // ========== ファイル保存先 ================
    $JsonName = "draft_option.json";
    $JsonFile = './asset/post/json/' . $JsonName;
    $image_folder_path = './asset/post/images/option/';
    // ========== ファイル保存先 ================

    // ========== イメージ画像数 ================
    $opimgNum = 1;
    // ========== イメージ画像数 ================



    // ========== 入力値取得 =========================================
    $update_Json = array(
        "option" => $num,
        "release" => $release,
        "stamp" => $update_stamp,
        "title1" => $title_array[0],
        "title2" => $title_array[1],

        "day" => $schedule_array[0],
        "fee" => $schedule_array[1],

        "transpo1" => $transpo_array[0],
        "transpo1Content" => $transpo_array[1],
        "transpo2" => $transpo_array[2],
        "transpo2Content" => $transpo_array[3],
        "transpo3" => $transpo_array[4],
        "transpo3Content" => $transpo_array[5],
    );

    $to_image = [];
    for ($i = 0; $i < $opimgNum; $i++) {
        $pre = '_' . $num . '-o' . $i . '_';
        $image_org = $image_array[$i][0];

        // このパラメータは変更しないでください。
        // $edit_stampでは配列検索できずに他の配列が削除されてしまいます（原因不明）。
        $search_stamp = explode('_', $image_org)[0]; //画像１名の最初のstamp番号を取得
        // このパラメータは変更しないでください。

        $to_image[$i] = make_filename($pre, $update_stamp, $image_folder_path, $image_array[$i][0], $image_array[$i][1], $image_array[$i][2]);

        $update_Json["image" . ($i + 1)] = $to_image[$i];
    };

    $options = read_Json($JsonFile);
    $options[] = $update_Json;

    // ========== Jsonファイルに書き込み =========================================
    write_Json($JsonFile, $options);

    // ========== 古い配列をJsonファイルから削除 ==================================
    delete_option($search_stamp);
}

// *****　オプション消去関数　***************
function delete_option($del_stamp)
{
    // ========== ファイル保存先 ================
    $JsonName = "draft_option.json";
    $JsonFile = './asset/post/json/' . $JsonName;
    $image_folder_path = './asset/post/images/option/';
    // ========== ファイル保存先 ================

    // ========== イメージ画像数 ================
    $opimgNum = 1;
    // ========== イメージ画像数 ================



    // ========== Jsonファイルの読込み ==================================
    $tmp_options = read_Json($JsonFile);

    // ========== 削除配列の検索 ========================================
    $nameArray = array_column($tmp_options, 'stamp');
    $keyIndex = array_search((int)$del_stamp, $nameArray, true);

    // ========== 削除対象有無の動作設定 =================================
    if ($keyIndex !== False) {
        for ($i = 0; $i < $opimgNum; $i++) {
            if (!empty($tmp_options[$keyIndex]["image" . ($i + 1)])) {
                $del_image = $image_folder_path . $tmp_options[$keyIndex]["image" . ($i + 1)];
                unlink($del_image);
            }
        }
        unset($tmp_options[$keyIndex]);
        write_Json($JsonFile, $tmp_options);
    } else {
        echo "<script type='text/javascript'>alert('一致するデータは見つかりませんでした');</script>";
    }
}

// ==================================================================================
// 本番サイト反映
// ==================================================================================
// *****　プレビューと本番サイト内容比較関数　***************
function compare_test_to_performance($elem)
{
    // ========== ファイル保存先 ================
    $from_elem_JsonFile = './asset/post/json/draft_' . $elem . '.json';
    $to_elem_JsonFile = './asset/post/json/' . $elem . '.json';
    // ========== ファイル保存先 ================

    $from_elems = read_Json($from_elem_JsonFile);
    $to_elems = read_Json($to_elem_JsonFile);

    if ($elem == "announce") {
        $array_elem = "title";
        $order_elem = "stamp";
    } else {
        $array_elem = $elem;
        $order_elem = $elem;
    }

    $tmp_from_elems = [];
    foreach ($from_elems as $from_elem) {
        if ($from_elem['release'] == "release") {
            $tmp_from_elems[] = array(
                $array_elem => $from_elem[$array_elem],
                "stamp" => $from_elem['stamp'],
            );
        }
    }

    $ids = array_column($tmp_from_elems, $order_elem);
    array_multisort($ids, SORT_ASC, $tmp_from_elems);

    $tmp_to_elems = [];
    foreach ($to_elems as $to_elem) {
        if ($to_elem['release'] == "release") {
            $tmp_to_elems[] = array(
                $array_elem => $to_elem[$array_elem],
                "stamp" => $to_elem['stamp'],
            );
        }
    }
    $ids = array_column($tmp_to_elems, $order_elem);
    array_multisort($ids, SORT_ASC, $tmp_to_elems);

    if ($tmp_from_elems === $tmp_to_elems) {
        $consistency = True;
        $msg_elem = '<span class="fs-5 fw-bold text-primary">反映済み</span>';
    } else {
        $consistency = false;
        $msg_elem = '<span class="fs-5 fw-bold text-danger">未反映</span>';
    }

    $common_elems = [];
    foreach ($tmp_from_elems as $tmp_from_elem) :
        foreach ($tmp_to_elems as $tmp_to_elem) :
            if ($tmp_from_elem[$array_elem] == $tmp_to_elem[$array_elem] && $tmp_from_elem['stamp'] == $tmp_to_elem['stamp']) {
                $common_elems[] = array(
                    $array_elem => $tmp_from_elem[$array_elem],
                    "stamp" => $tmp_from_elem['stamp'],
                );
            }
        endforeach;
    endforeach;

    $keyIndexs = [];
    foreach ($common_elems as $common_elem) :
        $keyIndex = array_search($common_elem['stamp'], array_column($tmp_from_elems, 'stamp'));
        if ($keyIndex != false) {
            $keyIndexs[] = $keyIndex;
        };
    endforeach;
    $result_from_elems = $tmp_from_elems;
    foreach ($keyIndexs as $keyIndex) :
        unset($result_from_elems[$keyIndex]);
    endforeach;

    $keyIndexs = [];
    foreach ($common_elems as $common_elem) :
        $keyIndex = array_search($common_elem['stamp'], array_column($tmp_to_elems, 'stamp'));
        if ($keyIndex != false) {
            $keyIndexs[] = $keyIndex;
        };
    endforeach;
    $result_to_elems = $tmp_to_elems;
    foreach ($keyIndexs as $keyIndex) :
        unset($result_to_elems[$keyIndex]);
    endforeach;

    return array($result_from_elems, $result_to_elems, $consistency, $msg_elem, $tmp_from_elems, $tmp_to_elems);
}


// ========== 反映ボタン動作関数 ========================================
function release_json($elem)
{
    // ========== ファイル保存先 ================
    $json_folder_path = './asset/post/json/';
    // ========== ファイル保存先 ================
    $from_JsonName = $json_folder_path . "draft_" . $elem . ".json";
    $to_JsonName = $json_folder_path . $elem . ".json";
    $backup_stamp = time();
    $backup_JsonName = $json_folder_path . "bu_" . $backup_stamp . "_" . $elem . ".json";
    rename($to_JsonName, $backup_JsonName);
    copy($from_JsonName, $to_JsonName);

    // 余分なバックアップファイル（jsonのみ）を消す
    delete_older_bu_json($elem);

    header('Location: index.php');
}

// ========== 古いJsonファイル・画像ファイル消去関数 ==================================
function delete_older_bu_json($elem)
{
    // ========== ファイル保存先 ================
    $json_folder_path = './asset/post/json/';
    $image_folder_path = './asset/post/images/' . $elem . '/';
    // ========== ファイル保存先 ================
    $files = glob($json_folder_path . "bu_*.json");
    arsort($files);
    $delete_files = [];
    foreach ($files as $file) :
        $filename = basename($file);
        echo '<br>';
        if (explode('_', $filename)[2] == $elem . ".json") {
            $delete_files[] = $filename;
        };
    endforeach;
    arsort($delete_files);

    // バックアップに使用されていた画像で本番に使用されていない画像を消去する
    delete_unusedImg($elem);

    // バックアップファイル（json）は２つ前まで
    if (count($delete_files) > 2) {
        for ($i = 2; $i < count($delete_files); $i++) {
            unlink($json_folder_path . $delete_files[$i]);
        };
    }
}

function delete_unusedImg($elem)
{
    // ========== ファイル保存先 ================
    $json_folder_path = './asset/post/json/';
    $image_folder_path = './asset/post/images/' . $elem . '/';
    // ========== ファイル保存先 ================
    // バックアップに使用されていた画像で本番に使用されていない画像を消去する
    $use_stamps = [];
    $open_arrays = read_Json($json_folder_path . $elem . '.json');
    $draft_arrays = read_Json($json_folder_path . 'draft_' . $elem . '.json');
    foreach ($open_arrays as $open_array) :
        if ($open_array['release'] === "release") {
            $use_stamps[] = $open_array['stamp'];
        };
    endforeach;
    foreach ($draft_arrays as $draft_array) :
        $use_stamps[] = $draft_array['stamp'];
    endforeach;
    $use_stamps = array_unique($use_stamps);
    $use_stamps = array_merge($use_stamps);

    $images = glob($image_folder_path . "*.*");
    foreach($images as $image):
        $image_name = basename($image);
        $image_stamp = explode('_', $image_name)[0];
        if(in_array($image_stamp, $use_stamps) == false){
            unlink($image);
        };
    endforeach;
}