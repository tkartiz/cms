<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お知らせ記事作成
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('announces.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="p-3 bg-white">
                        <div class="flex">
                            <div class="p-2 w-1/6">
                                <p class="text-gray-700">公開／非公開</p>
                                <ul class="w-48 text-sm font-medium text-gray-700">
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input id="show" type="radio" value="1" name="show" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="show" class="w-full py-1 ms-2 text-gray-700">公開</label>
                                        </div>
                                    </li>
                                    <li class="w-full">
                                        <div class="flex items-center ps-3">
                                            <input id="no-show" type="radio" value="0" name="show" class="w-4 h-4 text-blue-600 bg-gray-100 focus:ring-blue-500 focus:ring-2">
                                            <label for="no-show" class="w-full py-1 ms-2 text-gray-700">非公開</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-2 w-1/6">
                                <div class="relative">
                                    <label for="date" class="leading-7 text-sm text-gray-600">日付</label>
                                    <input type="date" id="date" name="date" value="{{ old('date') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                </div>
                            </div>
                            <div class="p-2 w-4/6">
                                <div class="relative">
                                    <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                                    <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                </div>
                            </div>
                        </div>
                        <?php for ($i = 1; $i < 7; $i++) { ?>
                            <div class="pb-3 border-double border-4 rounded border-gray-300">
                                <p class="w-full p-2 text-center text-lg font-bold bg-gray-200">カラム{{ $i }}</p>
                                <?php $tmpName = 'content' . $i; ?>
                                <x-announce-column contentID="{{ $tmpName }}" value='' />
                                <div class="flex px-2 justify-around">
                                    <?php for ($j = 1; $j < 4; $j++) { ?>
                                        <div class="mt-3">
                                            <?php $tmpImg = 'col' . $i . 'Img' . 1; ?>
                                            <x-announce-image contentID="{{ $tmpName }}" imgNum='{{ $j }}' value=''/>
                                        </div>
                                    <?php }; ?>
                                </div>
                            </div>
                        <?php }; ?>
                    </div>
                    <div class="w-3/4 flex mx-auto my-10">
                        <button type="submit" class="w-1/2 p-2 text-white bg-indigo-500 border-0 focus:outline-none hover:bg-indigo-600 rounded-l-xl">
                            作成する
                        </button>
                        <a href="{{ route('announces.index') }}" class="w-1/2 p-2 btn text-center text-white bg-pink-500 border-0 focus:outline-none hover:bg-pink-600 rounded-r-xl">
                            戻る
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>