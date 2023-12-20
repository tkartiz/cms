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
        $kind = 'document';
        $k = 0;

        $request->validate([
            'release' => 'required|string',
        ]);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);
        $stamp = $document->stamp;
        $kind = 'document';

        Common::delFile($document->filepath); // LP内ファイル&CMSフォルダの完全削除
        Common::delDir_LP($kind, $stamp); // LP内フォルダの完全削除
        Document::findOrFail($id)->forcedelete();  // DBからの完全削除

        return redirect()
            ->route('documents.index')
            ->with(['message' => 'ファイル番号【 ' . $id . ' 】を削除しました。', 'status' => 'alert']);
    }
}
