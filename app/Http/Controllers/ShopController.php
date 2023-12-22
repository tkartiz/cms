<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Shop;
use App\Libraries\Common;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();

        return view('shops.index', [
            'shops' => $shops,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 種類を宣言
        $kind = 'shop';

        // 入力値検証
        $request->validate([
            'release' => 'required|string',
            'category' => 'required|string',
            'name' => 'required|string|max:50',
            'concept' => 'nullable|string',
            'business_hours' => 'nullable|string',
            'closing_days' => 'nullable|string',
            'tel' => 'nullable|string',
            'floor_index' => 'nullable|string',
            'url' => 'nullable|string',
            'shop_infos' => 'nullable|string',
        ]);

        // LP用情報をまとまる
        $content = array(
            'stamp' => $request->stamp,
            'release' => $request->release,
            'category' => $request->category,
            'name' => $request->name,
            'concept' => $request->concept,
            'business_hours' => $request->business_hours,
            'closing_days' => $request->closing_days,
            'tel' => $request->tel,
            'floor_index' => $request->floor_index,
            'url' => $request->url,
            'shop_infos' => $request->shop_infos,
        );

        // ファイル処理
        $tmpname = [];
        $tmppath = [];
        for ($i = 0; $i < 5; $i++) {
            $check_delete = 'file' . $i . '_delete';
            $filename_org = 'filename' . $i . '_org';
            $filepath_org = 'filepath' . $i . '_org';

            if ($request->file('file') != null && array_key_exists($i, $request->file('file'))) {
                $savedfile = Common::saveFile($request, $i, $kind);
                $tmpname[$i] = $savedfile[0];
                $tmppath[$i] = $savedfile[1];
                if ($i === 0) {
                    $content['logo'] = $savedfile[0];
                    $content['logopath'] = $savedfile[1];
                } else {
                    $content['filename' . $i] = $savedfile[0];
                    $content['filepath' . $i] = $savedfile[1];
                }
            } else {
                $tmpname[$i] = null;
                $tmppath[$i] = null;
                if ($i === 0) {
                    $content['logo'] = null;
                    $content['logopath'] = null;
                } else {
                    $content['filename' . $i] = null;
                    $content['filepath' . $i] = null;
                }
            }
        }

        // CMS DBに保存する
        Shop::create([
            'stamp' => $request->stamp,
            'release' => $request->release,
            'category' => $request->category,
            'name' => $request->name,
            'concept' => $request->concept,
            'logo' => $tmpname[0],
            'logopath' => $tmppath[0],
            'filename1' => $tmpname[1],
            'filepath1' => $tmppath[1],
            'filename2' => $tmpname[2],
            'filepath2' => $tmppath[2],
            'filename3' => $tmpname[3],
            'filepath3' => $tmppath[3],
            'filename4' => $tmpname[4],
            'filepath4' => $tmppath[4],
            'content' => $content,
        ]);

        // Jsonに保存する
        Common::update_Json($content, $kind);

        return redirect()
            ->route('shops.index')
            ->with(['message' => '作成しました。', 'status' => 'info']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shop = Shop::find($id);
        return view('shops.edit', [
            'shop' => $shop,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 種類を宣言
        $kind = 'shop';

        // 入力値検証
        $request->validate([
            'release' => 'required|string',
            'category' => 'required|string',
            'name' => 'required|string|max:50',
            'concept' => 'nullable|string',
            'business_hours' => 'nullable|string',
            'closing_days' => 'nullable|string',
            'tel' => 'nullable|string',
            'floor_index' => 'nullable|string',
            'url' => 'nullable|string',
            'shop_infos' => 'nullable|string',
        ]);

        // LP用情報をまとまる
        $content = array(
            'stamp' => $request->stamp,
            'release' => $request->release,
            'category' => $request->category,
            'name' => $request->name,
            'concept' => $request->concept,
            'business_hours' => $request->business_hours,
            'closing_days' => $request->closing_days,
            'tel' => $request->tel,
            'floor_index' => $request->floor_index,
            'url' => $request->url,
            'shop_infos' => $request->shop_infos,
        );

        // 対象データの呼び出し
        $shop = Shop::find($id);

        // ファイル処理
        for ($i = 0; $i < 5; $i++) {
            $check_delete = 'file' . $i . '_delete';
            $filename_org = 'filename' . $i . '_org';
            $filepath_org = 'filepath' . $i . '_org';

            if ($i === 0 && $request->logo_delete === 'yes') {
                Common::delFile($request->logopath_org);
                $tmpname[$i] = null;
                $tmppath[$i] = null;
                $content['logo'] = null;
                $content['logopath'] = null;
            } elseif ($i === 0 && $request->logo_delete === 'no') {
                if ($request->file('file') != null && array_key_exists($i, $request->file('file'))) {
                    $savedfile = Common::saveFile($request, $i, $kind);
                    $tmpname[$i] = $savedfile[0];
                    $tmppath[$i] = $savedfile[1];
                    $content['logo'] = $savedfile[0];
                    $content['logopath'] = $savedfile[1];
                } else {
                    $tmpname[$i] = $request->logoname_org;
                    $tmppath[$i] = $request->logopath_org;
                    $content['logo'] = $request->logoname_org;
                    $content['logopath'] = $request->logopath_org;
                }
            } elseif ($i !== 0 && $request->$check_delete === 'yes') {
                Common::delFile($request->$filepath_org);
                $tmpname[$i] = null;
                $tmppath[$i] = null;
                $content['filename' . $i] = null;
                $content['filepath' . $i] = null;
            } elseif ($i !== 0 && $request->$check_delete === 'no') {
                if ($request->file('file') != null && array_key_exists($i, $request->file('file'))) {
                    $savedfile = Common::saveFile($request, $i, $kind);
                    $tmpname[$i] = $savedfile[0];
                    $tmppath[$i] = $savedfile[1];
                    $content['filename' . $i] = $savedfile[0];
                    $content['filepath' . $i] = $savedfile[1];
                } else {
                    $tmpname[$i] = $request->$filename_org;
                    $tmppath[$i] = $request->$filepath_org;
                    $content['filename' . $i] = $request->$filename_org;
                    $content['filepath' . $i] = $request->$filepath_org;
                }
            }
        }

        // CMSに保存する
        $shop->stamp = $request->stamp;
        $shop->release = $request->release;
        $shop->category = $request->category;
        $shop->name = $request->name;
        $shop->concept = $request->concept;
        $shop->logo = $tmpname[0];
        $shop->logopath = $tmppath[0];
        $shop->filename1 = $tmpname[1];
        $shop->filepath1 = $tmppath[1];
        $shop->filename2 = $tmpname[2];
        $shop->filepath2 = $tmppath[2];
        $shop->filename3 = $tmpname[3];
        $shop->filepath3 = $tmppath[3];
        $shop->filename4 = $tmpname[4];
        $shop->filepath4 = $tmppath[4];
        $shop->content = $content;
        $shop->save();

        // Jsonに保存する
        Common::update_Json($content, $kind);

        return redirect()
            ->route('shops.index')
            ->with(['message' => '更新しました。', 'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 種類を宣言
        $kind = 'shop';

        // 対象データを呼び出し
        $shop = Shop::findOrFail($id);

        // LP内ファイル&CMS内ファイルの完全削除
        $del_dirpath = null;
        if (!is_null($shop->logopath)) {
            Common::delFile($shop->logopath);
            $del_dirpath = $shop->logopath;
        }
        for ($i = 1; $i < 5; $i++) {
            $del_filepath = 'filepath' . $i;
            if (!is_null($shop->$del_filepath)) {
                Common::delFile($shop->$del_filepath);
                $del_dirpath = $shop->$del_filepath;
            }
        }

        // CMSトレージディレクトリを完全削除する
        $del_dirpath = '/storage/' . $kind . '/' . $shop->stamp;
        if (Storage::exists($del_dirpath)) {
            Common::delDir_CMS($del_dirpath);
        }

        // LP内フォルダの完全削除
        Common::delDir_LP($kind, $shop->stamp);

        // DBからの完全削除
        Shop::findOrFail($id)->forcedelete();

        // Jsonからの削除
        Common::del_Json($kind, $shop->release, $shop->stamp);

        return redirect()
            ->route('shops.index')
            ->with(['message' => 'ファイル番号【 ' . $id . ' 】を削除しました。', 'status' => 'alert']);
    }
}
