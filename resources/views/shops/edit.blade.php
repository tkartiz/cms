<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ショップ編集
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('shops.update', $shop->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="p-3 bg-white">
                        <div class="flex flex-wrap">
                            <input type="hidden" name="stamp" value="{{ $shop->stamp }}">
                            <div class="p-2 w-1/2 lg:w-1/4">
                                <p class="text-gray-700 font-medium">公開／非公開</p>
                                <ul class="w-48 text-sm text-gray-700">
                                    @if($shop->release === 'release')
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input checked id="release" type="radio" value="release" name="release" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="release" class="w-full py-1 ms-2 text-gray-700">公開</label>
                                        </div>
                                    </li>
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input id="draft" type="radio" value="draft" name="release" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="draft" class="w-full py-1 ms-2 text-gray-700">非公開</label>
                                        </div>
                                    </li>
                                    @else
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input id="release" type="radio" value="release" name="release" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="release" class="w-full py-1 ms-2 text-gray-700">公開</label>
                                        </div>
                                    </li>
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input checked id="draft" type="radio" value="draft" name="release" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="draft" class="w-full py-1 ms-2 text-gray-700">非公開</label>
                                        </div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="p-2 w-1/2 lg:w-1/4">
                                <p class="text-gray-700 font-medium">カテゴリー</p>
                                @if($shop->category === 'product_food')
                                <ul class="w-48 text-sm text-gray-700">
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input checked id="product_food" type="radio" value="product_food" name="category" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="product_food" class="w-full py-1 ms-2 text-gray-700">物産・飲食・物品販売</label>
                                        </div>
                                    </li>
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input id="service" type="radio" value="service" name="category" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="service" class="w-full py-1 ms-2 text-gray-700">サービス</label>
                                        </div>
                                    </li>
                                </ul>
                                @else
                                <ul class="w-48 text-sm text-gray-700">
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input id="product_food" type="radio" value="product_food" name="category" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="product_food" class="w-full py-1 ms-2 text-gray-700">物産・飲食・物品販売</label>
                                        </div>
                                    </li>
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input checked id="service" type="radio" value="service" name="category" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="service" class="w-full py-1 ms-2 text-gray-700">サービス</label>
                                        </div>
                                    </li>
                                </ul>
                                @endif
                            </div>
                            <div class="p-2 w-full lg:w-2/4">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm font-medium text-gray-600">ショップ名</label>
                                    <input type="text" id="name" name="name" value="{{ $shop->name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 px-2 py-4">
                                <div class="w-full flex">
                                    <div class="w-5/6 pb-3">
                                        <div class="flex">
                                            <label for="logo" class="leading-7 text-sm font-medium text-gray-600">ロゴ</label>
                                            <div class="flex ms-10 gap-3">
                                                <label><input type="radio" name="logo_delete" checked value="no">保持</label>
                                                <label><input type="radio" name="logo_delete" value="yes">削除</label>
                                            </div>
                                        </div>
                                        <input type="hidden" name="logo_org" value="{{ $shop->logo }}">
                                        <input type="hidden" name="logopath_org" value="{{ $shop->logopath }}">
                                        <input id="logo" class="w-full p-0 m-0" type="file" name="file[]" multiple="multiple">
                                        <p class="py-1 mb-1">現選択：{{ $shop->logo }}</p>
                                    </div>
                                    <?php if (!is_null($shop->logopath)) { ?>
                                        <img class="w-1/6 object-contain" src="{{ asset($shop->logopath) }}" alt="ロゴ">
                                    <?php }; ?>
                                </div>
                                <p class="text-sm font-medium">ショップ画像</p>
                                <?php
                                $item = ['メイン', 'サブ１', 'サブ２', 'サブ３'];
                                for ($i = 1; $i < 5; $i++) {
                                    $tmpfile = 'filename' . $i;
                                    $tmppath = 'filepath' . $i;
                                ?>
                                    <div class="flex w-full ps-4 pb-2">
                                        <label for="<?php echo 'file' . $i; ?>" class="w-2/12 leading-7 text-sm font-medium text-gray-600"><?php echo $item[$i - 1]; ?></label>
                                        <div class="w-2/12">
                                            <div><input type="radio" name="<?php echo 'file' . $i . '_delete'; ?>" checked value="no"><label>保持</label></div>
                                            <div><input type="radio" name="<?php echo 'file' . $i . '_delete'; ?>" value="yes"><label>削除</label></div>
                                        </div>
                                        <div class="w-6/12">
                                            <input id="<?php echo 'file' . $i; ?>" class="w-full p-0 m-0" type="file" name="file[]" multiple="multiple">
                                            <input type="hidden" name="<?php echo 'filename' . $i . '_org'; ?>" value="{{ $shop->$tmpfile }}">
                                            <input type="hidden" name="<?php echo 'filepath' . $i . '_org'; ?>" value="{{ $shop->$tmppath }}">
                                            <p class="text-sm py-1 mb-1">現選択：{{ $shop->$tmpfile }}</p>
                                        </div>
                                        <?php if (!is_null($shop->$tmppath)) { ?>
                                            <img class="w-2/12 object-contain" src="{{ asset($shop->$tmppath) }}" alt="メイン画像">
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="w-full lg:w-1/2 p-2">
                                <div>
                                    <label for="concept" class="leading-7 text-sm font-medium text-gray-600">コンセプト</label>
                                    <textarea id="concept" name="concept" class="w-full h-80 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $shop->concept }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 p-2">
                                <div class="w-full">
                                    <label for="business_hours" class="w-28 leading-7 text-sm font-medium text-gray-600">営業時間</label>
                                    <textarea id="business_hours" name="business_hours" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $shop->content['business_hours'] }}</textarea>
                                </div>
                                <div class="w-full">
                                    <label for="closing_days" class="w-28 leading-7 text-sm font-medium text-gray-600">定休日</label>
                                    <textarea type="text" id="closing_days" name="closing_days" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $shop->content['closing_days'] }}</textarea>
                                </div>
                                <div class="w-full">
                                    <label for="tel" class="w-28 leading-7 text-sm font-medium text-gray-600">電話番号</label>
                                    <input type="text" id="tel" name="tel" value="{{ $shop->content['tel'] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                </div>
                                <div class="w-full">
                                    <label for="floor_index" class="w-28 leading-7 text-sm font-medium text-gray-600">フロアマップ番号</label>
                                    <input type="text" id="floor_index" name="floor_index" value="{{ $shop->content['floor_index'] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                </div>
                                <div class="w-full">
                                    <label for="url" class="w-28 leading-7 text-sm font-medium text-gray-600">URL</label>
                                    <input type="text" id="url" name="url" value="{{ $shop->content['url'] }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 p-2">
                                <label for="shop_infos" class="leading-7 text-sm font-medium text-gray-600">その他情報</label>
                                <textarea id="shop_infos" name="shop_infos" class="w-full h-96 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $shop->content['shop_infos'] }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="w-3/4 flex mx-auto my-6">
                        <button type="submit" class="w-1/2 p-2 text-white bg-indigo-500 border-0 focus:outline-none hover:bg-indigo-600 rounded-l-xl">
                            更新する
                        </button>
                        <a href="{{ route('shops.index') }}" class="w-1/2 p-2 btn text-center text-white bg-pink-500 border-0 focus:outline-none hover:bg-pink-600 rounded-r-xl">
                            戻る
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>