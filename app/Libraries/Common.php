<?php

namespace app\Libraries;

use Illuminate\Support\Facades\Storage;


class Common
{
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

        return ($);
    }

    public static function delFile($request, $kind)
    {
        // $kind: announce
        $dir_pub_path = 'public/' . $kind . '/';

        $deletefile = $dir_pub_path . $request->application_id . '/' . $request->old_file;
        Storage::delete($deletefile);
    }

}
