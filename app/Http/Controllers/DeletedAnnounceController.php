<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Announce;
use App\Libraries\Common;

class DeletedAnnounceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deleted_announces = Announce::onlyTrashed()->whereNotNull('id')->get();

        return view('deleted_announces.index', [
            'deleted_announces' => $deleted_announces,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Announce::onlyTrashed()->where('id', '=', $id)->restore();  // 復活させる

        return redirect()
            ->route('deleted_announces.index')
            ->with(['message' => '記事番号【 ' . $id . ' 】を復活させました。', 'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Announce::onlyTrashed()->where('id', '=', $id)->forceDelete();  // 完全削除する

        return redirect()
            ->route('deleted_announces.index')
            ->with(['message' => '記事番号【 ' . $id . ' 】を完全削除しました。', 'status' => 'alert']);
    }
}
