<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ショップ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full ms-auto flex px-5 mt-4">
                    <button onclick="ListAll()" class="w-24 me-2 btn px-2 py-1 text-center text-sm text-white bg-indigo-500 border-0 focus:outline-none hover:bg-indigo-600 rounded-lg">すべて表示</button>
                    <button onclick="ListRelease()" class="w-24 flex me-2 btn px-2 py-1 text-center text-sm text-white bg-indigo-500 border-0 focus:outline-none hover:bg-indigo-600 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill me-2" viewBox="0 0 16 16" style="color:white;">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                        </svg>
                        <p class="self-center text-start">公開</p>
                    </button>
                    <button onclick="ListDraft()" class="w-24 flex me-2 btn px-2 py-1 text-center text-sm text-white bg-indigo-500 border-0 focus:outline-none hover:bg-indigo-600 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-slash me-2" viewBox="0 0 16 16" style="color:white;">
                            <path d="M5.164 14H15c-.299-.199-.557-.553-.78-1-.9-1.8-1.22-5.12-1.22-6 0-.264-.02-.523-.06-.776l-.938.938c.02.708.157 2.154.457 3.58.161.767.377 1.566.663 2.258H6.164l-1 1zm5.581-9.91a3.986 3.986 0 0 0-1.948-1.01L8 2.917l-.797.161A4.002 4.002 0 0 0 4 7c0 .628-.134 2.197-.459 3.742-.05.238-.105.479-.166.718l-1.653 1.653c.02-.037.04-.074.059-.113C2.679 11.2 3 7.88 3 7c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0c.942.19 1.788.645 2.457 1.284l-.707.707zM10 15a2 2 0 1 1-4 0h4zm-9.375.625a.53.53 0 0 0 .75.75l14.75-14.75a.53.53 0 0 0-.75-.75L.625 15.625z" />
                        </svg>
                        <p class="self-center">非公開</p>
                    </button>
                    <a href="{{ route('shops.create') }}" class="w-24 ms-auto btn px-2 py-1 text-center text-white bg-indigo-500 border-0 focus:outline-none hover:bg-indigo-600 rounded-lg">
                        新規作成</a>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 pt-3 pb-8 mx-auto">
                            <x-flash-message status="session('status')" />
                            <div class="w-full mx-auto overflow-auto">
                                <table class="w-full table-fixed border-separate border border-slate-400 text-center whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="w-12 px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                番号</th>
                                            <th rowspan="2" class="w-12 px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                公開</th>
                                            <th rowspan="2" class="w-12 px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                削除</th>
                                            <th rowspan="2" class="w-12 px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                編集</th>
                                            <th rowspan="2" class="w-20 px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                カテゴリー</th>
                                            <th class="w-20 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                ショップ名</th>
                                            <th rowspan="2" class="w-48 px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                画像</th>
                                            <th rowspan="2" class="w-48 px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                コンセプト</th>
                                            <th rowspan="2" class="w-auto px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                基本情報</th>
                                            <th rowspan="2" class="w-20 px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                プレビュー</th>
                                            <th class="w-24 px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                作成日</th>
                                        </tr>
                                        <tr>
                                            <th class="px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                ロゴ</th>
                                            <th class="px-2 py-1 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 border border-slate-300">
                                                最新更新日</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($shops as $shop)
                                        <tr class="<?php echo $shop->release; ?>">
                                            <td rowspan="2" class="border border-slate-300">{{ $shop->id }}</td>
                                            <td rowspan="2" class="border border-slate-300">
                                                @if($shop->release === "release")
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell-fill mx-auto" viewBox="0 0 16 16" style="color:blue;">
                                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                                </svg>
                                                @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell-slash mx-auto" viewBox="0 0 16 16">
                                                    <path d="M5.164 14H15c-.299-.199-.557-.553-.78-1-.9-1.8-1.22-5.12-1.22-6 0-.264-.02-.523-.06-.776l-.938.938c.02.708.157 2.154.457 3.58.161.767.377 1.566.663 2.258H6.164l-1 1zm5.581-9.91a3.986 3.986 0 0 0-1.948-1.01L8 2.917l-.797.161A4.002 4.002 0 0 0 4 7c0 .628-.134 2.197-.459 3.742-.05.238-.105.479-.166.718l-1.653 1.653c.02-.037.04-.074.059-.113C2.679 11.2 3 7.88 3 7c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0c.942.19 1.788.645 2.457 1.284l-.707.707zM10 15a2 2 0 1 1-4 0h4zm-9.375.625a.53.53 0 0 0 .75.75l14.75-14.75a.53.53 0 0 0-.75-.75L.625 15.625z" />
                                                </svg>
                                                @endif
                                            </td>
                                            <td rowspan="2" class="border border-slate-300">
                                                <form id="del_{{ $shop->id }}" method="post" action="{{ route('shops.destroy', $shop->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="#" data-id="{{ $shop->id }}" onclick="delShop(this)" class="w-full p-1 text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash mx-auto" viewBox="0 0 16 16" style="color:red;">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </a>
                                                </form>
                                            </td>
                                            <td rowspan="2" class="border border-slate-300">
                                                <a href="{{ route('shops.edit', $shop->id) }}" class="w-full p-1 text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square mx-auto" viewBox="0 0 16 16" style="color:blue;">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td rowspan="2" class="text-start text-sm border border-slate-300">
                                                <?php if ($shop->category === 'product_food') { ?>
                                                    物産・飲食・物販
                                                <?php } else { ?>
                                                    サービス
                                                <?php } ?>
                                            </td>
                                            <td class="text-sm border border-slate-300">{{ $shop->name }}</td>
                                            <td rowspan="2" class="p-2 text-start text-sm border border-slate-300"><img src="{{ asset('$shop->filepath') }}" alt=""></td>
                                            <td rowspan="2" class="text-sm border border-slate-300">{{ $shop->concept }}</td>
                                            <td rowspan="2" class="text-start text-sm border border-slate-300">
                                                {!! nl2br($shop->content['shop_infos']) !!}
                                            </td>
                                            <td rowspan="2" class="border border-slate-300">
                                                <?php if ($shop->release === "release" && $shop->category === "service") { ?>
                                                    <a href="{{ 'http://localhost/laravel/public_html/areamap/service/shop.php?shop='.$shop->stamp }}" target='_BLANK' class="w-full p-1 text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-binoculars mx-auto" viewBox="0 0 16 16" style="color:green;">
                                                            <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z" />
                                                        </svg>
                                                    </a>
                                                <?php } elseif ($shop->release === "draft" && $shop->category === "service") { ?>
                                                    <a href="{{ 'preview/areamap/service/shop.php?shop='.$shop->stamp }}" target='_BLANK' class="w-full p-1 text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-binoculars mx-auto" viewBox="0 0 16 16" style="color:green;">
                                                            <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z" />
                                                        </svg>
                                                    </a>
                                                <?php } elseif ($shop->release === "release" && $shop->category !== "service") { ?>
                                                    <a href="{{ 'preview/areamap/product_food/shop.php?shop='.$shop->stamp }}" target='_BLANK' class="w-full p-1 text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-binoculars mx-auto" viewBox="0 0 16 16" style="color:green;">
                                                            <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z" />
                                                        </svg>
                                                    </a>
                                                <?php } elseif ($shop->release === "draft" && $shop->category !== "service") { ?>
                                                    <a href="{{ 'preview/areamap/product_food/shop.php?shop='.$shop->stamp }}" target='_BLANK' class="w-full p-1 text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-binoculars mx-auto" viewBox="0 0 16 16" style="color:green;">
                                                            <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z" />
                                                        </svg>
                                                    </a>
                                                <?php }; ?>
                                            </td>
                                            <td class="text-sm border border-slate-300">{{ $shop->created_at->format('Y-m-d') }}</td>
                                        </tr>
                                        <tr class="<?php echo $shop->release; ?>">
                                            <td class="p-2 text-start text-sm border border-slate-300"><img src="{{ asset('$shop->logopath') }}" alt=""></td>
                                            <td class="text-sm border border-slate-300">{{ $shop->updated_at->format('Y-m-d') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        function delShop(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか？')) {
                document.getElementById('del_' + e.dataset.id).submit();
            }
        }

        function ListAll() {
            if ($('.release').hasClass('hidden')) {
                $('.release').removeClass('hidden');
            }
            if ($('.draft').hasClass('hidden')) {
                $('.draft').removeClass('hidden');
            }
        }

        function ListRelease() {
            if ($('.release').hasClass('hidden')) {
                $('.release').removeClass('hidden');
            }
            if (!($('.draft').hasClass('hidden'))) {
                $('.draft').addClass('hidden');
            }
        }

        function ListDraft() {
            if (!($('.release').hasClass('hidden'))) {
                $('.release').addClass('hidden');
            }
            if ($('.draft').hasClass('hidden')) {
                $('.draft').removeClass('hidden');
            }
        }
    </script>
</x-app-layout>