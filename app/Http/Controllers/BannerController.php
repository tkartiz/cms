<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

use App\Libraries\Common;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();

        return view('banners.index', [
            'banners' => $banners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kind = 'banner';

        $request->validate([
            'release' => 'required|string',
        ]);
        
        for ($k = 0; $k < 2; $k++) {
            if ($request->file('file')) {
                $savedfile = Common::saveFile($request, $k, $kind); // ファイルの保存
                if($k===0){
                    $name_pc = $savedfile[0];
                    $path_pc = $savedfile[1];
                } else {
                    $name_sp = $savedfile[0];
                    $path_sp = $savedfile[1];
                }
            }
        }

        Banner::create([
            'stamp' => $request->stamp,
            'release' =>  $request->release,
            'filename_pc' =>  $name_pc,
            'filepath_pc' =>  $path_pc,
            'filename_sp' =>  $name_sp,
            'filepath_sp' =>  $path_sp,
        ]);

        return redirect()
            ->route('banners.index')
            ->with(['message' => 'アップロード成功しました。', 'status' => 'info']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        $stamp = $banner->stamp;
        $kind = 'banner';

        Common::delFile($banner->filepath_pc); // LP内ファイル&CMSフォルダの完全削除
        Common::delFile($banner->filepath_sp);
        Common::delDir_LP($kind, $stamp); // LP内フォルダの完全削除
        Banner::findOrFail($id)->forcedelete();  // DBからの完全削除

        return redirect()
            ->route('banners.index')
            ->with(['message' => 'ファイル番号【 ' . $id . ' 】を削除しました。', 'status' => 'alert']);
    }
}
