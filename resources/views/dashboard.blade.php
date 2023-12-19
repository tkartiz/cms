<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ダッシュボード') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    ようこそ！
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <img class="w-auto h-8" src="storage/logo/Artiz Logo.svg" alt="Artizロゴ">
            <p class="ms-5 text-xl font-bold">Welcome to 「道の駅 湘南ちがさき」ホームページＣＭＳ</p>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500" style="width:2rem; height:2rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <sppn class="text-gray-900 dark:text-white">お知らせ</span>
                        </div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            お知らせ記事の追加・編集・削除&nbsp;⇒
                            マニュアルは<a href="{{ asset('storage/manual/「道の駅 湘南ちがさき」サイト CMS操作手順書.pdf') }}" target="_blank" class="ml-1 underline">こちら</a>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                    <div class="flex items-center">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500" style="width:2rem; height:2rem;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold">
                            <sppn class="text-gray-900 dark:text-white">バナー</span>
                        </div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            バナーの追加・編集・削除&nbsp;⇒
                            マニュアルは<a href="{{ asset('storage/manual/「道の駅 湘南ちがさき」サイト CMS操作手順書.pdf') }}" target="_blank" class="ml-1 underline">こちら</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-2 md:grid-cols-4">
                <div class="p-3 sm:p-6">
                    <img class="" src="{{ asset('storage/img/image(1).jpg')}}" alt="">
                </div>
                <div class="p-3 sm:p-6">
                    <img class="" src="{{ asset('storage/img/image(3).jpg')}}" alt="">
                </div>
                <div class="p-3 sm:p-6">
                    <img class="" src="{{ asset('storage/img/image(2).jpg')}}" alt="">
                </div>
                <div class="p-3 sm:p-6">
                    <img class="" src="{{ asset('storage/img/image(4).png')}}" alt="">
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
            <div class="text-center text-sm text-gray-500 sm:text-left">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9" />
                    </svg>
                    <a href="/" target="_blank" class="ml-1 underline">
                        ホーム
                    </a>
                </div>
            </div>

            <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
</x-app-layout>