<?php

namespace app\Libraries;

use Illuminate\Support\Facades\Storage;


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

        // $file_path = 'https://ff-server.site/bm_tool/'; // サーバーの場合
        $file_path = 'http://127.0.0.1:8000/'; // ローカルの場合
        $dir_storage_path = $file_path . 'storage/announce/';
        // ========= お知らせ欄と画像数の設定 ==========

        $content = [];
        $content['release'] =  $request->release;
        $content['date'] =  $request->date;
        $content['title'] =  $request->title;
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
                    $content[$tmpImg] = $request->file('file')[$k]->getClientOriginalName();
                    $file_path = $dir_storage_path . $request->id . '/' . $content[$tmpImg];
                    $content[$tmpImg . 'Path'] = $file_path;
                } elseif ($request->file('file') != null && !array_key_exists($k, $request->file('file'))) {
                    $content[$tmpImg] = $request->$requestImgorg;
                    $content[$tmpImg . 'Path'] = $request->$requestImgPathorg;
                }
                $content[$tmpImg . 'Location'] = $request->$requestImgLocation;
                $content[$tmpImg . 'Width'] = $request->$requestImgWidth;
                $content[$tmpImg . 'Height'] = $request->$requestImgHeight;
                $content[$tmpImg . 'Cap'] = $request->$requestImgCap;

                // ファイル削除時
                if ($request->$requestImgDelete == "yes") {
                    $content[$tmpImg] = null;
                    $content[$tmpImg . 'Path'] = null;
                    $content[$tmpImg . 'Location'] = null;
                    $content[$tmpImg . 'Width'] = null;
                    $content[$tmpImg . 'Height'] = null;
                    $content[$tmpImg . 'Cap'] = null;
                }
            }
        }

        return $content;
    }

    public static function saveFile($request, $kind)
    {
        // $kind: announce
        // $file_path = 'https://ff-server.site/bm_tool/'; // サーバーの場合
        $file_path = 'http://127.0.0.1:8000/'; // ローカルの場合

        $dir_pub_path = 'public/' . $kind . '/';
        $dir_storage_path = $file_path . 'storage/' . $kind . '/';

        $directory = $dir_pub_path . $request->id;
        Storage::makeDirectory($directory);
        $file_name = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs($directory, $file_name);

        if ($kind == 'application') {
            $request->file = $file_name;
            $request->filepath = $dir_storage_path . $request->application_id . '/' . $file_name;
        }
    }

    public static function delFile($request, $kind)
    {
        // $kind: announce
        $dir_pub_path = 'public/' . $kind . '/';

        $deletefile = $dir_pub_path . $request->application_id . '/' . $request->old_file;
        Storage::delete($deletefile);
    }
}
