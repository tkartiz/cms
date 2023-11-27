<header class="w-100 position-fixed top-0 start-0" style="z-index:100; height:90px;">
    <?php if ($siteview === 'draft') { ?>
        <h1 class="w-100 position-absolute top-0 start-0 bg-warning">ドラフト版</h1>
    <?php } ?>

    <div class="w-100 d-flex justify-content-between">
        <!-- ロゴ -->
        <div class="ms-2" style="width:80px; height:80px; margin:5px;">
            <img class="w-100 object-fit" src="img/logo.png" alt="道の駅ちがさきロゴ">
        </div>

        <!-- メニュー -->
        <div class="border rounded-bottom" style="width:600px; height:90px;">
            <ul class="w-100 d-flex m-0 p-0" style="height:90px;">
                <li class="d-flex col-2 bg-white" style="width:100px;">
                    <p class="my-0 mx-auto align-self-center"><a href="#top">トップ</a></p>
                </li>
                <li class="d-flex col-2 bg-white" style="width:100px;">
                    <p class="my-0 mx-auto align-self-center text-center lh-sm"><a href="#concept">コンセプト</a></p>
                </li>
                <li class="d-flex col-2 bg-white" style="width:100px;">
                    <p class="my-0 mx-auto align-self-center"><a href="#guide">ガイド</a></p>
                </li>
                <li class="d-flex col-2 bg-white" style="width:100px;">
                    <p class="my-0 mx-auto align-self-center"><a href="#contact">お問合せ</a></p>
                </li>
                <li class="d-flex col-2 bg-white" style="width:100px;">
                    <div class="dropdown-center align-self-center my-0 mx-auto">
                        <button class="dropdown-toggle border border-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            言語
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button active class="dropdown-item" type="button">
                                    <a href="index.php">JPN</a>
                                </button>
                            </li>
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
                <li id="menu" class="d-flex col-2" style="width:100px; background-color:#8CD0E3; cursor:pointer;">
                    <p class="my-0 mx-auto align-self-center">メニュー</p>
                </li>
            </ul>
        </div>
        <div id="menu-collapse" class="position-absolute end-0 p-5 d-none" style="top:90px; width:400px; background-color:#ffffff;">
            <p class="fs-6 fw-bold text-center m-0">～Mohala He Li'a～</p>
            <p class="fs-3 fw-bold text-center mb-5">湘南ちがさき</p>
            <div>
                <div class="mb-4">
                    <p class="title-font">INFO</p>
                    <div class="ms-4 d-flex">
                        <p class="col-4"><a class="jump" href="announce_list.php">イベント</a></p>
                        <p class="col-4"><a class="jump" href="announce_list.php">お知らせ</a></p>
                    </div>
                </div>
                <div class="mb-4">
                    <p class="title-font">ABOUT</p>
                    <div class="ms-4 d-flex">
                        <p class="col-4"><a class="jump" href="#concept">コンセプト</a></p>
                    </div>
                </div>
                <div class="mb-4">
                    <p class="title-font">GUIDE</p>
                    <div class="ms-4 d-flex">
                        <p class="col-4"><a class="jump" href="#facility">施設</a></p>
                        <p class="col-4"><a class="jump" href="#store">ストア</a></p>
                        <p class="col-4"><a class="jump" href="#access">アクセス</a></p>
                    </div>
                </div>
                <div class="mb-4">
                    <p class="title-font">OTHER</p>
                    <div class="ms-4 d-flex flex-wrap">
                        <p class="col-4"><a class="jump" href="#sns">SNS</a></p>
                        <p class="col-4"><a class="jump" href="#contact">お問合せ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>