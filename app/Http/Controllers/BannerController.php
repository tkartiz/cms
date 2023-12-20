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
        $k = 0;

        $request->validate([
            'release' => 'required|string',
        ]);

        if ($request->file('file')) {
            $savedfile = Common::saveFile($request, $k, $kind); // ファイルの保存
            Banner::create([ 
                'stamp' => $request->stamp,
                'release' =>  $request->release,
                'filename' =>  $savedfile[0],
                'filepath' =>  $savedfile[1],
            ]);
        }

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
        //
    }
}
