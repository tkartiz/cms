<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Shop;
use Illuminate\Http\Request;

use App\Libraries\Common;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderBy('location', 'asc')
            ->orderBy('turn', 'asc')
            ->orderBy('id','asc')
            ->get();

        return view('banners.index', [
            'banners' => $banners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shops = Shop::select('stamp', 'name')->get();
        return view('banners.create',[
            'shops' => $shops,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 種類を宣言
        $kind = 'banner';

        // 入力を評価
        $request->validate([
            'release' => 'required|string',
            'turn' => 'integer|nullable',
            'period_start' => 'date|nullable',
            'period_end' => 'date|nullable',
            'url' => 'string|nullable',
        ]);

        // ファイル処理
        for ($k = 0; $k < 2; $k++) {
            if ($request->file('file')) {
                $savedfile = Common::saveFile($request, $k, $kind); // ファイルの保存
                if ($k === 0) {
                    $name_pc = $savedfile[0];
                    $path_pc = $savedfile[1];
                } else {
                    $name_sp = $savedfile[0];
                    $path_sp = $savedfile[1];
                }
            }
        }

        // LP用情報をまとまる
        $content = array(
            'stamp' => $request->stamp,
            'release' =>  $request->release,
            'location' =>  $request->location,
            'turn' => $request->turn,
            'period_start' => $request->period_start,
            'period_end' => $request->period_end,
            'filename_pc' =>  $name_pc,
            'filepath_pc' =>  $path_pc,
            'filename_sp' =>  $name_sp,
            'filepath_sp' =>  $path_sp,
            'url' => $request->url,
        );

        // CMS DBに保存する
        Banner::create([
            'stamp' => $request->stamp,
            'release' =>  $request->release,
            'location' =>  $request->location,
            'turn' => $request->turn,
            'period_start' => $request->period_start,
            'period_end' => $request->period_end,
            'filename_pc' =>  $name_pc,
            'filepath_pc' =>  $path_pc,
            'filename_sp' =>  $name_sp,
            'filepath_sp' =>  $path_sp,
            'url' => $request->url,
            'content' => $content,
        ]);

        // Jsonに保存する
        Common::update_Json($content, $kind);

        return redirect()
            ->route('banners.index')
            ->with(['message' => 'バナー掲載に成功しました。', 'status' => 'info']);
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
        $banner = Banner::find($id);
        $shops = Shop::select('stamp', 'name')->get();
        return view('banners.edit', [
            'banner' => $banner,
            'shops' => $shops,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 種類を宣言
        $kind = 'banner';

        // 入力を評価
        $request->validate([
            'release' => 'required|string',
            'turn' => 'integer|nullable',
            'period_start' => 'date|nullable',
            'period_end' => 'date|nullable',
            'url' => 'string|nullable',
        ]);

        // ファイル処理
        for ($k = 0; $k < 2; $k++) {
            if ($request->file('file')) {
                $savedfile = Common::saveFile($request, $k, $kind); // ファイルの保存
                if ($k === 0) {
                    $name_pc = $savedfile[0];
                    $path_pc = $savedfile[1];
                } else {
                    $name_sp = $savedfile[0];
                    $path_sp = $savedfile[1];
                }
            } else {
                if ($k === 0) {
                    $name_pc = $request->filename_pc_org;
                    $path_pc = $request->filepath_pc_org;
                } else {
                    $name_sp = $request->filename_sp_org;
                    $path_sp = $request->filepath_sp_org;
                }
            }
        }

        // LP用情報をまとまる
        $content = array(
            'stamp' => $request->stamp,
            'release' =>  $request->release,
            'location' =>  $request->location,
            'turn' => $request->turn,
            'period_start' => $request->period_start,
            'period_end' => $request->period_end,
            'filename_pc' =>  $name_pc,
            'filepath_pc' =>  $path_pc,
            'filename_sp' =>  $name_sp,
            'filepath_sp' =>  $path_sp,
            'url' => $request->url,
        );

        // 対象データの呼び出し
        $banner = Banner::find($id);

        // CMSに保存する
        $banner->stamp = $request->stamp;
        $banner->release = $request->release;
        $banner->location = $request->location;
        $banner->turn = $request->turn;
        $banner->period_start = $request->period_start;
        $banner->period_end = $request->period_end;
        $banner->filename_pc = $name_pc;
        $banner->filepath_pc = $path_pc;
        $banner->filename_sp =  $name_sp;
        $banner->filepath_sp =  $path_sp;
        $banner->content = $content;
        $banner->url = $request->url;
        $banner->save();

        // Jsonに保存する
        Common::update_Json($content, $kind);

        return redirect()
            ->route('banners.index')
            ->with(['message' => '更新しました。', 'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 種類を宣言
        $kind = 'banner';

        // 対象データを呼び出し
        $banner = Banner::findOrFail($id);

        // LP内ファイル&CMS内ファイルの完全削除
        Common::delFile($banner->filepath_pc);
        Common::delFile($banner->filepath_sp);

        // CMSトレージディレクトリを完全削除する
        if (!is_null($banner->filepath_pc)) {
            Common::delDir_CMS($banner->filepath_pc);
        } elseif (!is_null($banner->filepath_sp)) {
            Common::delDir_CMS($banner->filepath_sp);
        }

        // LP内フォルダの完全削除
        Common::delDir_LP($kind, $banner->stamp);

        // DBからの完全削除
        Banner::findOrFail($id)->forcedelete();

        // Jsonからの削除
        Common::del_Json($kind, $banner->release, $banner->stamp);

        return redirect()
            ->route('banners.index')
            ->with(['message' => 'ファイル番号【 ' . $id . ' 】を削除しました。', 'status' => 'alert']);
    }
}
