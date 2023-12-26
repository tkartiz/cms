<?php

namespace app\Libraries;

use Illuminate\Support\Facades\Storage;
use App\Models\Announce;

class Common
{
    // *****　お知らせの入力評価関数　*************************************************************
    public static function announceValidation($request)
    {
        $request->validate([
            'item' => 'required|string',
            'release' => 'required|string',
            'date' => 'nullable|date',
            'title' => 'required|string|max:50',
            'content' => 'nullable|string',
            'content2' => 'nullable|string',
            'content3' => 'nullable|string',
            'content4' => 'nullable|string',
            'content5' => 'nullable|string',
            'content6' => 'nullable|string',
            'content1Img1Cap' => 'nullable|string',
            'content1Img2Cap' => 'nullable|string',
            'content1Img3Cap' => 'nullable|string',
            'content2Img1Cap' => 'nullable|string',
            'content2Img2Cap' => 'nullable|string',
            'content2Img3Cap' => 'nullable|string',
            'content3Img1Cap' => 'nullable|string',
            'content3Img2Cap' => 'nullable|string',
            'content3Img3Cap' => 'nullable|string',
            'content4Img1Cap' => 'nullable|string',
            'content4Img2Cap' => 'nullable|string',
            'content4Img3Cap' => 'nullable|string',
            'content5Img1Cap' => 'nullable|string',
            'content5Img2Cap' => 'nullable|string',
            'content5Img3Cap' => 'nullable|string',
            'content6Img1Cap' => 'nullable|string',
            'content6Img2Cap' => 'nullable|string',
            'content6Img3Cap' => 'nullable|string',
        ]);
    }
    // *****　お知らせの入力評価関数　*************************************************************



    // *****　お知らせ入力項目のまとめ　***********************************************************
    public static function announceContent($request)
    {
        // ========= お知らせ欄と画像数の設定 ==========
        $colNum = 6;
        $colImgNum = 3;
        $kind = 'announce';
        // ========= お知らせ欄と画像数の設定 ==========

        $content = array(
            "item" => $request->item,
            "release" => $request->release,
            "stamp" => $request->stamp,
            "date" => $request->date,
            "title" => $request->title,
        );

        for ($i = 1; $i < ($colNum + 1); $i++) {
            $tmpContent = 'content' . $i;
            $content[$tmpContent] = $request->$tmpContent;

            for ($j = 1; $j < ($colImgNum + 1); $j++) {
                $tmpImg = 'col' . $i . 'Img' . $j;

                $requestImg = 'content' . $i . 'Img' . $j;
                $requestImgDelete = $requestImg . 'Delete';
                $requestImgorg = $requestImg . '_org';
                $requestImgPathorg = $requestImg . 'Path_org';
                $requestImgLocation = $requestImg . 'Location';
                $requestImgWidth = $requestImg . 'Width';
                $requestImgHeight = $requestImg . 'Height';
                $requestImgCap = $requestImg . 'Cap';

                // ファイル選択時
                $k = 3 * ($i - 1) + ($j - 1);
                if ($request->file('file') != null && array_key_exists($k, $request->file('file'))) {
                    $savedfile = Common::saveFile($request, $k, $kind); // ファイルの保存
                    $content[$tmpImg] = $savedfile[0];
                    $content[$tmpImg . 'Path'] = $savedfile[1];

                    $content[$tmpImg . 'Location'] = $request->$requestImgLocation;

                    $content[$tmpImg . 'Width'] = $request->$requestImgWidth;

                    $content[$tmpImg . 'Height'] = $request->$requestImgHeight;
                    $content[$tmpImg . 'Cap'] = $request->$requestImgCap;
                } else {
                    $content[$tmpImg] = $request->$requestImgorg;
                    $content[$tmpImg . 'Path'] = $request->$requestImgPathorg;
                    $content[$tmpImg . 'Location'] = $request->$requestImgLocation;
                    $content[$tmpImg . 'Width'] = $request->$requestImgWidth;
                    $content[$tmpImg . 'Height'] = $request->$requestImgHeight;
                    $content[$tmpImg . 'Cap'] = $request->$requestImgCap;
                }

                // ファイル削除時
                if ($request->$requestImgDelete == "yes") {
                    Common::delFile($request->$requestImgPathorg); // ファイルの削除

                    $content[$tmpImg] = null;
                    $content[$tmpImg . 'Path'] = null;
                    $content[$tmpImg . 'Location'] = null;
                    $content[$tmpImg . 'Width'] = null;
                    $content[$tmpImg . 'Height'] = null;
                    $content[$tmpImg . 'Cap'] = null;
                }
            }
        }

        // ========== 象Jsonに書き出し、非対称Jsonからは削除する ==========================
        Common::update_Json($content, $kind);
        // ========== 象Jsonに書き出し、非対称Jsonからは削除する ==========================

        return $content;
    }
    // *****　お知らせ入力項目のまとめ　***********************************************************



    // *****　対象Jsonに書き出し、非対称Jsonからは削除する関数　************************************
    public static function update_Json($content, $kind)
    {
        // ========== 対象Jsonファイルに書き出し =========================================
        $Json = Common::read_Json($kind, $content['release']); // 対象Jsonファイルの読込み

        // 既に対象Jsonファイルに存在すれば一旦削除する
        if (!is_null($Json)) {
            $nameArray = array_column($Json, 'stamp');
            $keyIndex = array_search($content['stamp'], $nameArray, true);
            if ($keyIndex !== False) {
                unset($Json[$keyIndex]);
                Common::write_Json($kind, $content['release'], $Json);
            }
        }

        // 対象Jsonファイルに追加書き出しする
        $reJson = Common::read_Json($kind, $content['release']); // 対象Jsonファイルの再読込み
        $reJson[] = $content;
        Common::write_Json($kind, $content['release'], $reJson);
        // ========== 対象Jsonファイルに書き出し =========================================

        // ========== 対象外Jsonファイルから削除 =========================================
        if ($content['release'] === 'release') {
            $target_release = 'draft';
        } else {
            $target_release = 'release';
        }
        $del_stamp = $content['stamp'];
        $Json = Common::read_Json($kind, $target_release);
        Common::del_Json($kind, $target_release, $del_stamp);
        // ========== 対象外Jsonファイルから削除 =========================================
    }
    // *****　対象Jsonに書き出し、非対称Jsonからは削除する関数　*************************************



    // *****　Jsonファイル読込み関数　*************************************************************
    public static function read_Json($kind, $release)
    {
        // ========== ファイル読込み先 ================
        // ローカルの場合(サーバーも同様)
        $directory =  'storage/' . $kind . '/';
        // ========== ファイル読込み先 ================

        // ========== ファイル名 ================
        if ($release === 'release') {
            $JsonName = $kind . '.json';
        } else {
            $JsonName = 'draft_' . $kind . '.json';
        }
        $JsonFile = $directory . $JsonName;
        // ========== ファイル名 ================

        $array = file_get_contents($JsonFile);
        $array = mb_convert_encoding($array, 'UTF8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
        $array = json_decode($array, true);

        return $array;
    }
    // *****　Jsonファイル読込み関数　*************************************************************



    // *****　Jsonファイル書き込み関数　***********************************************************
    public static function write_Json($kind, $release, $array)
    {
        // ========== ディレクトリ作成（なければ） ================
        // $storage_directory = 'public/' . $kind . '/';
        // Storage::makeDirectory($storage_directory);
        // ========== ディレクトリ作成（なければ） ================

        // ========== ファイル保存先 ================
        // ローカルの場合(サーバーも同様)
        $directory =  'storage/' . $kind . '/';
        // ========== ファイル保存先 ================

        // ========== ファイル名 ================
        if ($release === 'release') {
            $JsonName = $kind . '.json';
        } else {
            $JsonName = 'draft_' . $kind . '.json';
        }
        $JsonFile = $directory . $JsonName;
        // ========== ファイル名 ================

        $array = array_values($array);
        $array = json_encode($array, JSON_UNESCAPED_UNICODE);
        file_put_contents($JsonFile, $array);

        Common::softdelete_arrangement_Json($kind); // ソフトデリートデータも削除する
    }
    // *****　Jsonファイル書き込み関数　***********************************************************



    // *****　Jsonファイル配列削除関数　***********************************************************
    public static function del_Json($kind, $release, $del_stamp)
    {
        // ========== Jsonファイルを読み込む ========== 
        $Json = Common::read_Json($kind, $release);

        if (!is_null($Json)) {
            // ========== Jsonファイルから該当配列を検索する ==========
            $nameArray = array_column($Json, 'stamp');
            $keyIndex = array_search($del_stamp, $nameArray, true);

            if ($keyIndex !== False) {
                // ========== Jsonファイルから該当配列を削除する ==========
                unset($Json[$keyIndex]);
                // ========== Jsonファイルを上書きする ========== 
                Common::write_Json($kind, $release, $Json);
            }
        }

        Common::softdelete_arrangement_Json($kind); // ソフトデリートデータも削除する
    }
    // *****　Jsonファイル配列削除関数　***********************************************************



    // *****　ソフトデリートしたデータをJsonファイル配列から削除する関数　****************************
    public static function softdelete_arrangement_Json($kind)
    {
        $soft_delete_announces = Announce::onlyTrashed()->get();
        foreach ($soft_delete_announces as $soft_delete_announce) {
            if ($soft_delete_announce->release === 'release') {
                $Json = Common::read_Json($kind, 'release');
                $nameArray = array_column($Json, 'stamp');
                if (!is_null($Json)) {
                    // ========== Jsonファイルから該当配列を検索する ==========
                    $keyIndex = array_search($soft_delete_announce->stamp, $nameArray, true);
                    if ($keyIndex !== False) {
                        unset($Json[$keyIndex]); // Jsonファイルから該当配列を削除する
                        Common::write_Json($kind, 'release', $Json); // Jsonファイルを上書きする
                    }
                }
            } else {
                $Json = Common::read_Json($kind, 'draft');
                $nameArray = array_column($Json, 'stamp');
                if (!is_null($Json)) {
                    // ========== Jsonファイルから該当配列を検索する ==========
                    $keyIndex = array_search($soft_delete_announce->stamp, $nameArray, true);
                    if ($keyIndex !== False) {
                        unset($Json[$keyIndex]); // Jsonファイルから該当配列を削除する
                        Common::write_Json($kind, 'draft', $Json); // Jsonファイルを上書きする
                    }
                }
            }
        }
    }
    // *****　ソフトデリートしたデータをJsonファイル配列から削除する関数　****************************






    // *****　ファイルアップロード関数　************************************************************
    public static function saveFile($request, $k, $kind)
    {
        // ========== ディレクトリ作成（なければ） ================
        $storage_directory = 'public/' . $kind . '/' . $request->stamp; // CMSストレージ先（操作用）
        Storage::makeDirectory($storage_directory);
        // ========== ディレクトリ作成（なければ） ================

        // ========== ファイル保存先 ================
        // CMSストレージ先（表示用）
        $directory = '/storage/' . $kind . '/' . $request->stamp . '/';

        // LP用コピー先
        $LP_storage_path[0] = '../public/main/asset/storage/' . $kind . '/' . $request->stamp . '/';
        $LP_storage_path[1] = '../public/preview/asset/storage/' . $kind . '/' . $request->stamp . '/';
        // ========== ファイル保存先 ================

        // ファイル保存（/storage/app/publicフォルダへ保存）
        $savedfile[0] = $request->file('file')[$k]->getClientOriginalName();
        $request->file('file')[$k]->storeAs($storage_directory, $savedfile[0]);

        // if ($kind != 'banner') {                                                       // バナー以外
        //     $request->file('file')[$k]->storeAs($storage_directory, $savedfile[0]);
        // } else {                                                                       // バナー
        //     if($k === 0){                                                              // 300x250サイズ
        //         $banner_pc = Image::make($request->file('file')[$k])->fit(300, 250);
        //         $banner_pc->storeAs($storage_directory, $savedfile[0]);
        //     } else {                                                                   // 320x 50サイズ
        //         $banner_sp = Image::make($request->file('file')[$k])->fit(320, 50);
        //         $banner_sp->storeAs($storage_directory, $savedfile[0]);
        //     }
        // }

        // ファイル読込み用のパスを生成（サーバーではドメインからのパスがないと表示できないため）
        $savedfile[1] = $directory . $savedfile[0];

        // LPのフォルダへファイル保存（※LPからlaravelの/public/storageから画像を読めないため）
        Common::makeDir_LP($kind, $request->stamp, $request, $k);

        return $savedfile;
    }
    // *****　ファイルアップロード関数　************************************************************



    // *****　LPのアップロードディレクトリ＆ファイル生成関数　***************************************
    public static function makeDir_LP($kind, $stamp, $request, $k)
    {
        // ========== ファイル保存先 ================
        // LP用保存先
        $LP_storage_path[0] = '../public/main/asset/storage/' . $kind . '/' . $stamp . '/';
        $LP_storage_path[1] = '../public/preview/asset/storage/' . $kind . '/' . $stamp . '/';
        // ========== ファイル保存先 ================

        $savedfile[0] = $request->file('file')[$k]->getClientOriginalName();

        for ($i = 0; $i < 2; $i++) {
            if (!file_exists($LP_storage_path[$i])) {
                mkdir($LP_storage_path[$i], 0755, true);
                chmod($LP_storage_path[$i], 0755);
            }
            copy($request->file('file')[$k], $LP_storage_path[$i]  . $savedfile[0]);
            chmod($LP_storage_path[$i]  . $savedfile[0], 0644);
        }
    }
    // *****　LPのアップロードディレクトリ＆ファイル生成関数　***************************************



    // *****　LPのアップロードディレクトリ＆ファイルレストア関数　***********************************
    public static function restoreDir_LP($kind, $stamp)
    {
        // ========== ファイル保存先 ================
        // CMSストレージ先（操作用）
        $directory = 'public/' . $kind . '/' . $stamp . '/';

        // LP用保存先
        $LP_storage_path[0] = '../public/main/asset/storage/' . $kind . '/' . $stamp . '/';
        $LP_storage_path[1] = '../public/preview/asset/storage/' . $kind . '/' . $stamp . '/';
        // ========== ファイル保存先 ================       

        for ($i = 0; $i < 2; $i++) {
            if (!file_exists($LP_storage_path[$i])) {
                mkdir($LP_storage_path[$i], 0755, true);
                chmod($LP_storage_path[$i], 0755);
            }
        }


        $restore_files = Storage::allFiles($directory);

        foreach ($restore_files as $restore_file) {
            $restore_files_name = explode('/', $restore_file)[3];
            $org_file = 'storage/' . explode('/', $restore_file)[1] . '/' . explode('/', $restore_file)[2] . '/' . explode('/', $restore_file)[3];
            for ($i = 0; $i < 2; $i++) {
                copy($org_file, $LP_storage_path[$i] . $restore_files_name);
                chmod($LP_storage_path[$i]  . $restore_files_name, 0644);
            }
        }
    }
    // *****　LPのアップロードディレクトリ＆ファイルレストア関数　***********************************


    // *****　アップロードファイル削除関数　********************************************************
    public static function delFile($filePath)
    {
        // CMS用削除（完全デリート）
        $CMS_deletefile = explode('/', $filePath)[2] . '/' . explode('/', $filePath)[3] . '/' . explode('/', $filePath)[4];
        Storage::disk('public')->delete($CMS_deletefile);

        // LP用削除（完全デリート）
        $LP_deletefile[0] = '../public/main/asset' . $filePath;
        $LP_deletefile[1] = '../public/preview/asset' . $filePath;

        for ($i = 0; $i < 2; $i++) {
            if (file_exists($LP_deletefile[$i])) {
                unlink($LP_deletefile[$i]);
            }
        }
    }
    // *****　アップロードファイル削除関数　********************************************************



    // *****　CMSのアップロードディレクトリ削除関数　************************************************
    public static function delDir_CMS($filePath)
    {
        // CMS用削除（中のファイルごと完全デリート）
        $CMS_deleteDir = 'public/' . explode('/', $filePath)[2] . '/' . explode('/', $filePath)[3];
        Storage::deleteDirectory($CMS_deleteDir);
    }
    // *****　CMSのアップロードディレクトリ削除関数　************************************************



    // *****　LPのアップロードディレクトリ＆ファイル削除関数　****************************************
    public static function delDir_LP($kind, $stamp)
    {
        // ========== ファイル保存先 ================
        // LP用保存先
        $LP_storage_path[0] = '../public/main/asset/storage/' . $kind . '/' . $stamp . '/';
        $LP_storage_path[1] = '../public/preview/asset/storage/' . $kind . '/' . $stamp . '/';
        // ========== ファイル保存先 ================

        for ($i = 0; $i < 2; $i++) {
            // 親ディレクトリ、削除するディレクトリが書き込み可能か確認
            if (is_writable($LP_storage_path[$i])) {

                // ディレクトリ内のファイルを取得
                $files = scandir($LP_storage_path[$i]);

                // ディレクトリ内のファイルを全て削除する
                foreach ($files as $file_name) {

                    if (!preg_match('/^\.(.*)/', $file_name)) {
                        unlink($LP_storage_path[$i] . $file_name);
                    }
                }

                // ディレクトリを削除
                rmdir($LP_storage_path[$i]);
            }
        }
    }
    // *****　LPのアップロードディレクトリ＆ファイル削除関数　****************************************




    // *****　バナー番号降り直し関数　**************************************************************
    function banner_renumber($elms, $release, $number)
    {
        $ids = array_column($elms, 'number');
        array_multisort($ids, SORT_ASC, $elms);

        if ($number != 0) {
            $draft_number = 0;
            $release_number = 0;
            for ($i = 0; $i < count($elms); $i++) {
                if ($elms[$i]['release'] === $release && $elms[$i]['release'] === "draft") {
                    if ($elms[$i]['number'] == $number) {
                        $elms[$i]['number'] = $number + 1;
                        $draft_number += 1;
                    } else {
                        $elms[$i]['number'] = $elms[$i]['number'] + $draft_number;
                    }
                }

                if ($elms[$i]['release'] === $release && $elms[$i]['release'] === "release") {
                    if ($elms[$i]['number'] == $number) {
                        $elms[$i]['number'] = $number + 1;
                        $release_number += 1;
                    } else {
                        $elms[$i]['number'] = $elms[$i]['number'] + $release_number;
                    }
                }
            }
        } else {
            $draft_number = 0;
            $release_number = 0;
            for ($i = 0; $i < count($elms); $i++) {
                if ($elms[$i]['release'] === "draft") {
                    $elms[$i]['number'] = $draft_number + 1;
                    $draft_number += 1;
                }

                if ($elms[$i]['release'] === "release") {
                    $elms[$i]['number'] = $release_number + 1;
                    $release_number += 1;
                }
            }
        }

        return $elms;
    }
    // *****　バナー番号降り直し関数　**************************************************************

}
