<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Announce;

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
        return view('announces.index',[
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
        ]);

        Announce::create([
            'show' => $request->show,
            'date' => $request->date,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()
        ->route('announces.index')
        ->with(['message'=>'作成しました。', 'status'=>'info']);
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
        return view('announces.edit',[
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
            'content' => 'nullable|string',
        ]);

        $announce = Announce::find($id);
        $announce->show = $request->show;
        $announce->date = $request->date;
        $announce->title = $request->title;
        $announce->content = $request->content;
        $announce->save();

        return redirect()
        ->route('announces.index')
        ->with(['message'=>'更新しました。', 'status'=>'info']);
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
                ->with(['message' => '記事番号【 '.$id.' 】を削除しました。', 'status' => 'alert']);
    }
}
