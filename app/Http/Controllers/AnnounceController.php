<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Announce;
use App\Libraries\Common;

class AnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announces = Announce::all();
        return view('announces.index', [
            'announces' => $announces,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'show' => 'required|boolean',
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

        // ========= お知らせ欄と画像数の設定 ==========
        $colNum = 6;
        $colImgNum = 3;

        // $file_path = 'https://ff-server.site/bm_tool/'; // サーバーの場合
        $file_path = 'http://127.0.0.1:8000/'; // ローカルの場合
        $dir_storage_path = $file_path . 'storage/announce/';
        // ========= お知らせ欄と画像数の設定 ==========

        $content = [];
        for ($i = 1; $i < ($colNum + 1); $i++) {
            $tmpContent = 'content' . $i;
            $content[$tmpContent] = $request->$tmpContent;

            for ($j = 1; $j < ($colImgNum + 1); $j++) {
                $tmpImg = 'c' . $i . 'Img' . $j;

                $requestImg = 'content' . $i . 'Img' . $j;
                $requestImgLocation = $requestImg . 'Location';
                $requestImgWidth = $requestImg . 'Width';
                $requestImgHeight = $requestImg . 'Height';
                $requestImgCap = $requestImg . 'Cap';

                $k = 3 * ($i - 1) + ($j - 1);
                if ($request->file('file') != null && array_key_exists($k, $request->file('file'))) {
                    $content[$tmpImg] = $request->file('file')[$k]->getClientOriginalName();
                    $file_path = $dir_storage_path . $request->id . '/' . $content[$tmpImg];
                    $content[$tmpImg . 'Path'] = $file_path;
                } else {
                    $content[$tmpImg] = null;
                    $content[$tmpImg . 'Path'] = null;
                }

                $content[$tmpImg . 'Loc'] = $request->$requestImgLocation;
                $content[$tmpImg . 'W'] = $request->$requestImgWidth;
                $content[$tmpImg . 'H'] = $request->$requestImgHeight;
                $content[$tmpImg . 'Cap'] = $request->$requestImgCap;
            }
        }

        Announce::create([
            'show' => $request->show,
            'date' => $request->date,
            'title' => $request->title,
            'content' => $content,
        ]);

        return redirect()
            ->route('announces.index')
            ->with(['message' => '作成しました。', 'status' => 'info']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announce = Announce::find($id);
        return view('announces.edit', [
            'announce' => $announce,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'show' => 'required|boolean',
            'date' => 'nullable|date',
            'title' => 'required|string|max:50',
            'content1' => 'nullable|string',
            'content2' => 'nullable|string',
            'content3' => 'nullable|string',
            'content4' => 'nullable|string',
            'content5' => 'nullable|string',
            'content6' => 'nullable|string',
        ]);

        $announce = Announce::find($id);
        $announce->show = $request->show;
        $announce->date = $request->date;
        $announce->title = $request->title;
        $announce->content1 = $request->content1;
        $announce->content2 = $request->content2;
        $announce->content3 = $request->content3;
        $announce->content4 = $request->content4;
        $announce->content5 = $request->content5;
        $announce->content6 = $request->content6;
        $announce->save();

        return redirect()
            ->route('announces.index')
            ->with(['message' => '更新しました。', 'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Announce::findOrFail($id)->delete();  // ソフトデリート

        return redirect()
            ->route('announces.index')
            ->with(['message' => '記事番号【 ' . $id . ' 】を削除しました。', 'status' => 'alert']);
    }
}
