<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        $kind = 'shop';
        $tmpname = [];
        $tmppath = [];
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
                dd($request->$check_delete, $request->$filepath_org);
                Common::delFile($request->$filepath_org);
                $tmpname[$i] = null;
                $tmppath[$i] = null;
                $content['filename' . $i] = null;
                $content['filepath' . $i] = null;
            } elseif ($i !== 0 && $request->$check_delete === 'no') {
                dd($request->$check_delete, $request->$filepath_org);
                if ($request->file('file') != null && array_key_exists($i, $request->file('file'))) {
                    $savedfile = Common::saveFile($request, $i, $kind);
                    $tmpname[$i] = $savedfile[0];
                    $tmppath[$i] = $savedfile[1];
                    $content['filename' . $i] = $savedfile[0];
                    $content['filepath' . $i] = $savedfile[1];
                } else {
                    $tmpname[$i] = $filename_org;
                    $tmppath[$i] = $filepath_org;
                    $content['filename' . $i] = $filename_org;
                    $content['filepath' . $i] = $filepath_org;
                }
            }
        }

        // CMSに保存する
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

        $shop = Shop::find($id);

        $kind = 'shop';
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

        return redirect()
            ->route('shops.index')
            ->with(['message' => '作成しました。', 'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
