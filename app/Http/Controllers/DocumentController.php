<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

use App\Libraries\Common;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();

        return view('documents.index', [
            'documents' => $documents,
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
        // 種類を宣言
        $kind = 'document';

        // ファイル数を設定(１つの場合、0)
        $k = 0;

        // 入力評価
        $request->validate([
            'release' => 'required|string',
        ]);

        // ファイル処理
        if ($request->file('file')) {
            $savedfile = Common::saveFile($request, $k, $kind); // ファイルの保存
            Document::create([
                'stamp' => $request->stamp,
                'release' =>  $request->release,
                'filename' =>  $savedfile[0],
                'filepath' =>  $savedfile[1],
            ]);
        }

        return redirect()
            ->route('documents.index')
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
        // 公開状態反転処理
        $document = Document::findOrFail($id);
        if ($request->release === 'release') {
            $document->release = 'draft';
            $msg_before = '公開';
            $msg_after = '非公開';
        } else {
            $document->release = 'release';
            $msg_before = '非公開';
            $msg_after = '公開';
        }
        $document->save();

        return redirect()
            ->route('documents.index')
            ->with(['message' => '番号 ' . $id . ' を ' . $msg_before . ' から ' . $msg_after . ' に変更しました。', 'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 種類を宣言
        $kind = 'document';

        // 対象データを呼び出し
        $document = Document::findOrFail($id);


        $stamp = $document->stamp;

        // LP内ファイル&CMS内ファイルの完全削除
        Common::delFile($document->filepath);

        // CMSトレージディレクトリを完全削除する
        Common::delDir_CMS($document->filepath);

        // LP内フォルダの完全削除
        Common::delDir_LP($kind, $stamp);

        // DBからの完全削除
        Document::findOrFail($id)->forcedelete();

        return redirect()
            ->route('documents.index')
            ->with(['message' => 'ファイル番号【 ' . $id . ' 】を削除しました。', 'status' => 'alert']);
    }
}
