<header class="w-100 position-fixed top-0 start-0">
    <?php if ($siteview === 'draft') { ?>
        <h1 class="w-50 position-absolute top-0 start-0 bg-warning">ドラフト版</h1>
    <?php } ?>

    <div class="d-flex justify-content-end">
        <!-- メニュー -->
        <div class="nav-bar">
            <ul class="d-flex m-0 p-0">
                <li class="d-none d-sm-block d-flex justify-content-center align-self-center p-2">
                    <a href="#top">
                        <div class="w-100 d-flex align-items-baseline justify-content-center">
                            <img src="asset/icon/home.svg" style="width:30px; height:30px;">
                        </div>
                        <p class="d-none d-md-block w-100 text-center small m-0">ホーム</p>
                    </a>
                </li>
                <li class="d-none d-sm-block d-flex justify-content-center align-self-center p-2">
                    <a href="#info">
                        <div class="w-100 d-flex align-items-baseline justify-content-center">
                            <img src="asset/icon/info.svg" style="width:30px; height:30px;">
                        </div>
                        <p class="d-none d-md-block w-100 text-center small m-0">お知らせ</p>
                    </a>
                </li>
                <li class="d-none d-sm-block d-flex justify-content-center align-self-center p-2">
                    <a href="#info">
                        <div class="w-100 d-flex align-items-baseline justify-content-center">
                            <img src="asset/icon/contact.svg" style="width:30px; height:30px;">
                        </div>
                        <p class="d-none d-md-block w-100 text-center small m-0">お問い合わせ</p>
                    </a>
                </li>
                <li class="d-none d-sm-block d-flex justify-content-center align-self-center p-2">
                    <a href="#info">
                        <div class="w-100 d-flex align-items-baseline justify-content-center">
                            <img src="asset/icon/X.svg" class="" style="margin:5px 0; width:20px; height:20px;">
                            <img src="asset/icon/facebook_2.svg" class="" style="width:20px; height:20px;">
                            <img src="asset/icon/instagram.svg" class="" style="width:20px; height:20px;">
                        </div>
                        <p class="d-none d-md-block w-100 text-center small m-0">SNS</p>
                    </a>
                </li>
                <li class="d-flex justify-content-center p-2">
                    <div class="dropdown-center align-self-center m-0">
                        <button class="dropdown-toggle border-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="d-none d-md-block bi bi-translate"></i>JPN
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a href="https://translate.google.com/translate?sl=ja&tl=en&u=https://ff-server.site/m-shonanchigasaki/main/index.php">EN</a>
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a href="https://translate.google.com/translate?sl=ja&tl=zh-CN&u=https://ff-server.site/m-shonanchigasaki/main/index.php">CHS</a>
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a href="https://translate.google.com/translate?sl=ja&tl=ko&u=https://ff-server.site/m-shonanchigasaki/main/index.php">KOR</a>
                                </button>
                            </li>
                        </ul>
                    </div>
                </li>
                <li id="menu" class="d-flex justify-content-center p-2" style="cursor:pointer;">
                    <p class="d-none d-md-block align-self-center m-0 text-center"><i class="bi bi-list"></i><br><span class="small">MENU</span></p>
                    <p class="d-block d-md-none align-self-center m-0 text-center fs-2"><i class="bi bi-list"></i></p>
                </li>
            </ul>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <div id="menu-collapse" class="p-3 p-sm-5 d-none">
            <p class="fs-6 fw-bold text-center m-0">～Mohala He Li'a～</p>
            <p class="fs-3 fw-bold text-center mb-3 mb-sm-4">湘南ちがさき</p>
            <div>
                <div class="mb-2 mb-sm-3">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">EVENT & NEWS</p>
                        <p class="text-muted small">イベント＆お知らせ</p>
                    </div>
                    <div class="ms-4 d-flex">
                        <p class="col-6"><a class="jump" href="event/">イベント</a></p>
                        <p class="col-6"><a class="jump" href="news/">お知らせ</a></p>
                    </div>
                </div>
                <div class="mb-2 mb-sm-3">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">ABOUT</p>
                        <p class="text-muted small">湘南ちがさきについて</p>
                    </div>
                    <div class="ms-4 d-flex">
                        <p class="col-6"><a class="jump" href="about/concept/">コンセプト</a></p>
                        <p class="col-6"><a class="jump" href="about/environment/">環境への取組み</a></p>
                    </div>
                </div>
                <div class="mb-2 mb-sm-3">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">GUIDE</p>
                        <p class="text-muted small">施設ガイド</p>
                    </div>
                    <div class="ms-4 d-flex flex-wrap">
                        <p class="col-12"><a class="jump" href="areamap/">エリアマップ</a></p>
                        <p class="col-6"><a class="jump" href="areamap/product_food/">物販・フード</a></p>
                        <p class="col-6"><a class="jump" href="areamap/service/">「コト」サービス</a></p>
                        <p class="col-6"><a class="jump" href="areamap/rest/">休憩所・広場</a></p>
                    </div>
                </div>
                <div class="mb-2 mb-sm-3">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">OTHER</p>
                        <p class="text-muted small">その他</p>
                    </div>
                    <div class="ms-4 d-flex flex-wrap">
                        <p class="col-6"><a class="jump" href="access/">SNS</a></p>
                        <p class="col-6"><a class="jump" href="access/">アクセスマップ</a></p>
                        <p class="col-6"><a class="jump" href="faq/">よくあるご質問</a></p>
                        <p class="col-6"><a class="jump" href="inquiry/">お問い合わせ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>