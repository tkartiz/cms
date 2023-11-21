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
        Common::announceValidation($request); // 入力値検証

        $content = Common::announceContent($request); // お知らせ内容を配列にまとめる

        Announce::create([ //　id取得のために一旦保存する
            'stamp' => $request->stamp,
            'release' =>  $request->release,
            'date' =>  $request->date,
            'title' =>  $request->title,
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
        Common::announceValidation($request); // 入力値検証

        $content = Common::announceContent($request); // お知らせ内容を配列にまとめる

        $announce = Announce::find($id);
        $announce->release = $request->release;
        $announce->date = $request->date;
        $announce->title = $request->title;
        $announce->content = $content;
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
