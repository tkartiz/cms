<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            バナーアップロード
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('banners.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="w-3/4 mx-auto p-3 bg-white">
                        <div class="w-full mx-auto flex">
                            <input type="hidden" name="stamp" value="<?php echo time() ?>">
                            <div class="p-2 w-1/3">
                                <p class="font-medium text-gray-700">公開／非公開</p>
                                <ul class="w-48 text-sm font-medium text-gray-700">
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input id="release" type="radio" value="release" name="release" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="release" class="w-full py-1 ms-2 text-gray-700">公開</label>
                                        </div>
                                    </li>
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input id="draft" type="radio" value="draft" name="release" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="draft" class="w-full py-1 ms-2 text-gray-700">非公開</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-2 pe-10 w-1/3">
                                <label for="location" class="font-medium text-gray-700">配置場所</label>
                                <select requierd id="location" name="location" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-0 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option selected disabled value="">選択してください／選択なし</option>
                                    <?php
                                    $locations = ['トップぺージ', 'エリアマップ', 'サービスゾーン', '物産・飲食・物販ゾーン'];
                                    foreach ($shops as $shop) :
                                        $locations[] = $shop->name;
                                    endforeach;
                                    foreach ($locations as $location) :
                                    ?>
                                        <option value="<?php echo $location; ?>"><?php echo $location; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="p-2 w-1/3">
                                <p class="font-medium">表示期間</p>
                                <div class="flex items-center">
                                    <label for="period_start" class="w-20 leading-7 text-sm text-gray-600">開始日</label>
                                    <input type="date" id="period_start" name="period_start" value="{{ old('period_start') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-0 px-3 leading-8 transition-colors duration-200 ease-in-out" style="height:30px" />
                                </div>
                                <div class="flex items-center">
                                    <label for="period_end" class="w-20 leading-7 text-sm text-gray-600">終了日</label>
                                    <input type="date" id="period_end" name="period_end" value="{{ old('period_end') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-0 px-3 leading-8 transition-colors duration-200 ease-in-out" style="height:30px" />
                                </div>
                            </div>
                        </div>
                        <div class="w-full mx-auto p-2">
                            <p class="font-medium">画像</p>
                            <div class="w-full flex">
                                <div class="w-1/2">
                                    <label for="pc" class="text-sm py-1 ms-2 text-gray-700">PC用(推奨:300px x 250px)</label>
                                    <input id="pc" class="px-3 m-0" type="file" name="file[]" required>
                                </div>
                                <div class="w-1/2">
                                    <label for="sp" class="text-sm py-1 ms-2 text-gray-700">スマホ用(320x50)</label>
                                    <input id="sp" class="px-3 m-0" type="file" name="file[]" required>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 p-2">
                            <label for="url" class="font-medium py-1 ms-2 text-gray-700">URL</label>
                            <input id="url" type="text" name="url" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-0 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <div class="w-3/4 flex mx-auto my-6">
                        <button type="submit" class="w-1/2 p-2 text-white bg-indigo-500 border-0 focus:outline-none hover:bg-indigo-600 rounded-l-xl">
                            アップロードする
                        </button>
                        <a href="{{ route('banners.index') }}" class="w-1/2 p-2 btn text-center text-white bg-pink-500 border-0 focus:outline-none hover:bg-pink-600 rounded-r-xl">
                            戻る
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>