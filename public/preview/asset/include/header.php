<?php
$layer = read_layer($level);
?>
<header id="header" class="w-100 position-fixed top-0 start-0">
    <?php if ($siteview === 'draft') { ?>
        <h1 class="position-absolute top-0 start-50 bg-warning" style="transform:translatex(-50%);">ドラフト版</h1>
    <?php } ?>

    <div class="d-flex justify-content-end">
        <!-- メニュー -->
        <div class="nav-bar">
            <ul class="d-flex m-0 p-0">
                <li class="d-none d-md-flex justify-content-center align-items-center p-2">
                    <a href="<?php echo $layer; ?>">
                        <div class="w-100 d-flex align-items-baseline justify-content-center">
                            <img src="<?php echo $layer; ?>asset/icon/home.svg" style="width:30px; height:30px;">
                            <p class="ms-2 me-0 mt-0 mb-1 fw-bold">Home</p>
                        </div>
                        <p class="d-none d-md-block w-100 text-center small m-0 fw-bold">ホーム</p>
                    </a>
                </li>
                <li class="d-none d-md-flex justify-content-center align-items-center p-2">
                    <a href="<?php echo $layer; ?>news/?page=1">
                        <div class="w-100 d-flex align-items-baseline justify-content-center">
                            <img src="<?php echo $layer; ?>asset/icon/info.svg" style="width:30px; height:30px;">
                            <p class="ms-2 me-0 mt-0 mb-1 fw-bold">Information</p>
                        </div>
                        <p class="d-none d-md-block w-100 text-center small m-0 fw-bold">お知らせ</p>
                    </a>
                </li>
                <li class="d-none d-md-flex justify-content-center align-items-center p-2">
                    <a href="<?php echo $layer . 'inquiry/'; ?>">
                        <div class="w-100 d-flex align-items-baseline justify-content-center">
                            <img src="<?php echo $layer; ?>asset/icon/contact.svg" style="width:30px; height:30px;">
                            <p class="ms-2 me-0 mt-0 mb-1 fw-bold">Contact</p>
                        </div>
                        <p class="d-none d-md-block w-100 text-center small m-0 fw-bold">お問い合わせ</p>
                    </a>
                </li>
                <!-- <li class="d-none d-md-flex justify-content-center align-items-center p-2">
                    <a href="<?php echo $layer . '#sns'; ?>">
                        <div class="w-100 d-flex align-items-baseline justify-content-center">
                            <img src="<?php echo $layer; ?>asset/icon/X.svg" class="" style="margin:5px 0; width:20px; height:20px;">
                            <img src="<?php echo $layer; ?>asset/icon/facebook_2.svg" class="" style="width:20px; height:20px;">
                            <img src="<?php echo $layer; ?>asset/icon/instagram.svg" class="" style="width:20px; height:20px;">
                        </div>
                        <p class="d-none d-md-block w-100 text-center small m-0 mt-2 fw-bold">SNS</p>
                    </a>
                </li> -->


                <!-- google翻訳サイトで翻訳できないため消去　→　Chromeの翻訳機能は正常に使用可能 -->
                <!-- <li class="d-flex justify-content-center align-items-center p-2">
                    <div class="dropdown-center align-self-center m-0">
                        <button class="dropdown-toggle border-0 bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="d-none d-md-block bi bi-translate fs-4 mb-1"></i><span class="small fw-bold">JPN</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button class="dropdown-item" type="button">
                                    <?php if ($siteview === 'draft') { ?>
                                        <a href="https://translate.google.com/translate?sl=ja&tl=en&u=https://m-shonanchigasaki.com/preview/index.php">EN</a>
                                    <?php } else { ?>
                                        <a href="https://translate.google.com/translate?sl=ja&tl=en&u=https://m-shonanchigasaki.com/main/index.php">EN</a>
                                    <?php } ?>
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <?php if ($siteview === 'draft') { ?>
                                        <a href="https://translate.google.com/translate?sl=ja&tl=zh-CN&u=https://m-shonanchigasaki.com/preview/index.php">CHS</a>
                                    <?php } else { ?>
                                        <a href="https://translate.google.com/translate?sl=ja&tl=zh-CN&u=https://m-shonanchigasaki.com/main/index.php">CHS</a>
                                    <?php } ?>
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button">
                                    <?php if ($siteview === 'draft') { ?>
                                        <a href="https://translate.google.com/translate?sl=ja&tl=ko&u=https://m-shonanchigasaki.com/preview/index.php">KOR</a>
                                    <?php } else { ?>
                                        <a href="https://translate.google.com/translate?sl=ja&tl=ko&u=https://m-shonanchigasaki.com/main/index.php">KOR</a>
                                    <?php } ?>
                                </button>
                            </li>
                        </ul>
                    </div>
                </li> -->


                <li id="menu" class="d-flex justify-content-center align-items-center p-2" style="cursor:pointer;">
                    <p class="d-none d-md-block align-self-center m-0 text-center" style="color:#24b5f5;">
                        <svg width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                        <br><span class="small fw-bold">MENU</span>
                    </p>
                    <p class="d-block d-md-none align-self-center m-0 text-center fs-2"><i class="bi bi-list"></i></p>
                </li>
            </ul>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <div id="menu-collapse" class="p-3 p-sm-5 d-none">
            <a href="<?php echo $layer; ?>">
                <p class="fs-6 fw-bold text-center m-0">～Mohala He Li'a～</p>
                <p class="fs-3 fw-bold text-center mb-3 mb-sm-4">湘南ちがさき</p>
            </a>
            <div>
                <div class="mb-2 mb-sm-3">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">INFOMATION</p>
                        <p class="text-muted small">お知らせ</p>
                    </div>
                    <div class="ms-4 d-flex">
                        <!-- <p class="col-6"><a class="jump" href="<?php echo $layer; ?>event/list.php">イベント</a></p> -->
                        <p class="col-6"><a class="jump" href="<?php echo $layer; ?>news/?page=1">お知らせ一覧</a></p>
                    </div>
                </div>
                <div class="mb-2 mb-sm-3">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">ABOUT</p>
                        <p class="text-muted small">湘南ちがさきについて</p>
                    </div>

                    <!-- <div class="ms-4 d-flex">
                        <p class="col-6"><a class="jump" href="<?php echo $layer; ?>about/concept/">コンセプト</a></p>
                        <p class="col-6"><a class="jump" href="<?php echo $layer; ?>about/environment/">環境への取組み</a></p>
                    </div> -->
                </div>

                <!-- <div class="mb-2 mb-sm-3">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">GUIDE</p>
                        <p class="text-muted small">施設ガイド</p>
                    </div>
                    <div class="ms-4 d-flex flex-wrap">
                        <p class="col-12"><a class="jump" href="<?php echo $layer; ?>areamap/">エリアマップ</a></p>
                        <p class="col-6"><a class="jump" href="<?php echo $layer; ?>areamap/product_food/">物販・フード</a></p>
                        <p class="col-6"><a class="jump" href="<?php echo $layer; ?>areamap/service/">「コト」サービス</a></p>
                        <p class="col-6"><a class="jump" href="<?php echo $layer; ?>areamap/rest/">休憩所・広場</a></p>
                    </div>
                </div> -->

                <div class="mb-2 mb-sm-3">
                    <div class="d-flex align-items-baseline">
                        <p class="title-font fs-5 me-2">OTHER</p>
                        <p class="text-muted small">その他</p>
                    </div>
                    <div class="ms-4 d-flex flex-wrap">
                        <!-- <p class="col-6"><a class="jump" href="<?php echo $layer; ?>access/">アクセスマップ</a></p>
                        <p class="col-6"><a class="jump" href="<?php echo $layer; ?>faq/">よくあるご質問</a></p> -->

                        <p class="col-6"><a class="jump" href="<?php echo $layer; ?>inquiry/">お問い合わせ</a></p><br>
                        <p class="col-6" style="width:100%;"><a class="jump" href="<?php echo $layer; ?>privacy/">プライバシーポリシー</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    const headerHeight = document.getElementById('header').clientHeight;;
    document.documentElement.style.setProperty('--headerHeight', headerHeight + 'px');

    $(document).ready(function() {
        $('html,body').animate({
            scrollTop: 0
        }, '1');
    });
</script>