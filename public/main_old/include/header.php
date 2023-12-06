<header class="w-100 position-fixed top-0 start-0" style="z-index:100; height:90px;">
    <?php if ($siteview === 'draft') { ?>
        <h1 class="w-100 position-absolute top-0 start-0 bg-warning">ドラフト版</h1>
    <?php } ?>

    <div class="w-100 d-flex justify-content-between">
        <!-- ロゴ -->
        <div class="ms-2" style="width:80px; height:80px; margin:5px;">
            <!-- <img class="w-100 object-fit" src="img/logo.png" alt="道の駅ちがさきロゴ"> -->
        </div>

        <!-- メニュー -->
        <div class="border rounded-bottom" style="width:500px; height:90px;">
            <ul class="w-100 d-flex m-0 p-0" style="height:90px;">
                <li class="d-flex col-2 bg-white" style="width:100px;">
                    <p class="title-font my-0 mx-auto align-self-center"><a href="#top">TOP</a></p>
                </li>
                <li class="d-flex col-2 bg-white" style="width:100px;">
                    <p class="title-font my-0 mx-auto align-self-center text-center lh-sm"><a href="#about">ABOUT</a></p>
                </li>
                <li class="d-flex col-2 bg-white" style="width:100px;">
                    <p class="title-font my-0 mx-auto align-self-center"><a href="#guide">GUIDE</a></p>
                </li>
                <li class="d-flex col-2 bg-white" style="width:100px;">
                    <div class="dropdown-center align-self-center my-0 mx-auto">
                        <button class="title-font dropdown-toggle border-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            JPN
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a class="title-font" href="https://translate.google.com/translate?sl=ja&tl=en&u=https://ff-server.site/m-shonanchigasaki/main/index.php">EN</a>
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a class="title-font" href="https://translate.google.com/translate?sl=ja&tl=zh-CN&u=https://ff-server.site/m-shonanchigasaki/main/index.php">CHS</a>
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <a class="title-font" href="https://translate.google.com/translate?sl=ja&tl=ko&u=https://ff-server.site/m-shonanchigasaki/main/index.php">KOR</a>
                                </button>
                            </li>
                        </ul>
                    </div>
                </li>
                <li id="menu" class="d-flex col-2" style="width:100px; background-color:#8CD0E3; cursor:pointer;">
                    <p class="title-font my-0 mx-auto align-self-center">MENU</p>
                </li>
            </ul>
        </div>
        <div id="menu-collapse" class="position-absolute end-0 p-5 d-none" style="top:90px; width:400px; background-color:#ffffff;">
            <p class="fs-6 fw-bold text-center m-0">～Mohala He Li'a～</p>
            <p class="fs-3 fw-bold text-center mb-5">湘南ちがさき</p>
            <div>
                <div class="mb-4">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">EVENT & NEWS</p>
                        <p class="text-muted small">イベント＆お知らせ</p>
                    </div>
                    <div class="ms-4 d-flex">
                        <p class="col-6"><a class="jump" href="event/">イベント</a></p>
                        <p class="col-6"><a class="jump" href="news/">お知らせ</a></p>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">ABOUT</p>
                        <p class="text-muted small">湘南ちがさきについて</p>
                    </div>
                    <div class="ms-4 d-flex">
                        <p class="col-6"><a class="jump" href="about/concept/">コンセプト</a></p>
                        <p class="col-6"><a class="jump" href="about/environment/">環境への取組み</a></p>
                    </div>
                </div>
                <div class="mb-4">
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
                <div class="mb-4">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">OTHER</p>
                        <p class="text-muted small">その他</p>
                    </div>
                    <div class="ms-4 d-flex flex-wrap">
                        <p class="col-6"><a class="jump" href="access/">アクセスマップ</a></p>
                        <p class="col-6"><a class="jump" href="faq/">よくあるご質問</a></p>
                        <p class="col-6"><a class="jump" href="inquiry/">お問い合わせ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>