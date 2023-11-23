<?php

namespace app\Libraries;

use Illuminate\Support\Facades\Storage;

use App\Models\Announce;

class Common
{
    public static function announceValidation($request)
    {
        $request->validate([
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

    public static function announceContent($request)
    {
        // ========= お知らせ欄と画像数の設定 ==========
        $colNum = 6;
        $colImgNum = 3;
        $kind = 'announce';
        // ========= お知らせ欄と画像数の設定 ==========

        $content = array(
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
                } else {
                    $content[$tmpImg] = $request->$requestImgorg;
                    $content[$tmpImg . 'Path'] = $request->$requestImgPathorg;
                }
                $content[$tmpImg . 'Location'] = $request->$requestImgLocation;
                $content[$tmpImg . 'Width'] = $request->$requestImgWidth;
                $content[$tmpImg . 'Height'] = $request->$requestImgHeight;
                $content[$tmpImg . 'Cap'] = $request->$requestImgCap;

                // ファイル削除時
                if ($request->$requestImgDelete == "yes") { // ソフトデリートのためファイルの完全削除はしない
                    $content[$tmpImg] = null;
                    $content[$tmpImg . 'Path'] = null;
                    $content[$tmpImg . 'Location'] = null;
                    $content[$tmpImg . 'Width'] = null;
                    $content[$tmpImg . 'Height'] = null;
                    $content[$tmpImg . 'Cap'] = null;
                }
            }
        }

        // ========== 対象Jsonファイルに書き出し =========================================
        $Json = Common::read_Json($kind, $request->release); // 対象Jsonファイルの読込み

        // 既に対象Jsonファイルに存在すれば削除する
        if (!is_null($Json)) {
            $nameArray = array_column($Json, 'stamp');
            $keyIndex = array_search($request->stamp, $nameArray, true);
            if ($keyIndex !== False) {
                unset($Json[$keyIndex]);
                Common::write_Json($kind, $request->release, $Json);
            }
            // dd($nameArray, $keyIndex, $request->stamp, $Json);
        }

        // 対象Jsonファイルに追加する
        $reJson = Common::read_Json($kind, $request->release); // 対象Jsonファイルの再読込み
        $reJson[] = $content;
        Common::write_Json($kind, $request->release, $reJson);
        // ========== 対象Jsonファイルに書き出し =========================================

        // ========== 対象外Jsonファイルから削除 =========================================
        if ($request->release === 'release') {
            $target_release = 'draft';
        } else {
            $target_release = 'release';
        }
        $del_stamp = $content['stamp'];
        $Json = Common::read_Json($kind, $target_release);
        Common::del_Json($kind, $target_release, $del_stamp);
        // ========== 対象外Jsonファイルから削除 =========================================

        return $content;
    }

    // *****　ファイルアップロード関数　***************************************************
    public static function saveFile($request, $k, $kind)
    {
        // ========== ディレクトリ作成（なければ） ================
        $dir_pub_path = 'public/' . $kind . '/';
        $directory = $dir_pub_path . $request->stamp;
        Storage::makeDirectory($directory);
        // ========== ディレクトリ作成（なければ） ================

        // ========== ファイル保存先 ================
        // サーバーの場合
        // $file_path = 'https://ff-server.site/m-shonanchigasaki/'; 
        // $dir_storage_path = $file_path.'storage/' . $kind . '/';

        // ローカルの場合
        $file_path = 'http://127.0.0.1:8000/'; // ローカルの場合
        $dir_storage_path =  $file_path . 'storage/' . $kind . '/';
        // ========== ファイル保存先 ================


        // ファイル保存（外部からも呼び出せるようにpublicフォルダへ保存）
        $savedfile[0] = $request->file('file')[$k]->getClientOriginalName();
        $request->file('file')[$k]->storeAs($directory, $savedfile[0]);

        // ファイル読込み用のパスを生成（サーバーではドメインからのパスがないと表示できないため）
        $savedfile[1] = $dir_storage_path . $request->stamp . '/' . $savedfile[0];

        return $savedfile;
    }

    // *****　アップロードファイル削除関数　***************************************************
    public static function delFile($request, $kind)
    {
        // ========== ファイル保存先 ================
        $dir_pub_path = 'public/' . $kind . '/';
        // ========== ファイル保存先 ================

        $deletefile = $dir_pub_path . $request->application_id . '/' . $request->old_file;
        Storage::delete($deletefile);
    }

    // *****　Jsonファイル書き込み関数　***************************************************
    public static function write_Json($kind, $release, $array)
    {
        // ========== ディレクトリ作成（なければ） ================
        $dir_pub_path = 'public/' . $kind . '/';
        $directory = $dir_pub_path;
        Storage::makeDirectory($directory);
        // ========== ディレクトリ作成（なければ） ================

        // ========== ファイル保存先 ================
        // ローカルの場合(サーバーも同様)
        $dir_storage_path =  'storage/' . $kind . '/';
        // ========== ファイル保存先 ================

        // ========== ファイル名 ================
        if ($release === 'release') {
            $JsonName = $kind . '.json';
        } else {
            $JsonName = 'draft_' . $kind . '.json';
        }
        $JsonFile = $dir_storage_path . $JsonName;
        // ========== ファイル名 ================

        $array = array_values($array);
        $array = json_encode($array, JSON_UNESCAPED_UNICODE);
        file_put_contents($JsonFile, $array);

        Common::refine_Json($kind); // ソフトデリートデータも削除する
    }

    // *****　Jsonファイル読込み関数　***************************************************
    public static function read_Json($kind, $release)
    {
        // ========== ファイル読込み先 ================
        // ローカルの場合(サーバーも同様)
        $dir_storage_path = 'storage/' . $kind . '/';
        // ========== ファイル読込み先 ================

        // ========== ファイル名 ================
        if ($release === 'release') {
            $JsonName = $kind . '.json';
        } else {
            $JsonName = 'draft_' . $kind . '.json';
        }
        $JsonFile = $dir_storage_path . $JsonName;
        // ========== ファイル名 ================

        $array = file_get_contents($JsonFile);
        $array = mb_convert_encoding($array, 'UTF8', 'ASCII, JIS, UTF-8, EUC-JP, SJIS-WIN');
        $array = json_decode($array, true);

        return $array;
    }

    // *****　Jsonファイル配列削除関数　***************************************************
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

        Common::refine_Json($kind); // ソフトデリートデータも削除する
    }

    public static function refine_Json($kind)
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
}
