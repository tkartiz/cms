<?php
$insta_media_limit = '10';
$insta_business_id = '17841461303480732';
$insta_access_token = 'EAATZCWTdoaT8BOZBHoec9xYjmzEnVLGeDnmpN9P2jLO8p1zNZCAXb4G5CG53xoiCZA2rAbYjxDjfKCiu3Nhkxt7sJMZBqaQjollIwnCAlcE6dkQF7RRN36iYUHRZBcZBQPCHRCZCi0Uuc5YlPC4SVpP8EUiDS14JSJx3Cx2B0af6qsLAYQRAm3yLkFfyezwgCVcZD';

$json = file_get_contents("https://graph.facebook.com/v6.0/{$insta_business_id}?fields=name%2Cmedia.limit({$insta_media_limit})%7Bcaption%2Cmedia_url%2Cthumbnail_url%2Cpermalink%7D&access_token={$insta_access_token}");

$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$obj = json_decode($json, true);

$insta = [];
foreach ($obj['media']['data'] as $k => $v) {
    if (!empty($v['thumbnail_url'])) {
        $data = [
            'img' => $v['thumbnail_url'],
            'caption' => $v['caption'],
            'link' => $v['permalink'],
        ];
    } else {
        $data = [
            'img' => $v['media_url'],
            'caption' => $v['caption'],
            'link' => $v['permalink'],
        ];
    }
    $insta[] = $data;
}

$stores =  glob('asset/img/choice_chigasaki/*.jpg');

$title_sns_fonts = array('C', 'h', 'o', 'i', 'c', 'e', '！');

?>

<section id="sns" class="container mx-auto text-center position-relative">
    <!-- 非表示 -->
    <!-- 見出し -->
    <h1 class="d-none">道の駅から発信するオリジナルブランド「Choice! CHIGASAKI」</h1>
    <!-- 内容 -->
    <h2 class="d-none">
        茅ヶ崎には、ここにしかないいいもの、もとからあるいいもの、茅ヶ崎だからこそのライフスタイルがあります。
        「Choice! CHIGASAKI」は、そんな茅ヶ崎の本質的な魅⼒の発信をしています。
    </h2>
    <!-- 非表示 -->

    <div class="sns-title d-flex align-items-center fadeIn" style="animation-delay:0.4s;">
        <a href="https://www.chigasaki-brand.jp/item/" target="_blank"><img src="asset/img/sns/logo.png" alt="" class="sns-logo me-3 me-lg-5"></a>
        <div class="text-start pt-4 fw-bold">
            <span class="fs-4">道の駅から発信するオリジナルブランド<br class="d-block d-lg-none">「Choice! CHIGASAKI」</span><br>
            <p class="ms-0 ms-lg-3">
                <span class="">茅ヶ崎には、ここにしかないいいもの、もとからあるいいもの、<br class="d-none d-lg-block d-xl-none">茅ヶ崎だからこそのライフスタイルがあります。<br>
                <span class="">「Choice! CHIGASAKI」は、そんな茅ヶ崎の本質的な魅⼒の発信をしています。</span>
            </p>
        </div>
    </div>
    <!-- <ul class="d-flex justify-content-center gap-3 gap-md-5 p-0 mb-4">
        <li>
            <a href="" class="d-flex" style="height:40px;">
                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve">
                    <style type="text/css">
                        .st0 {
                            fill: #ca15c6;
                        }
                    </style>
                    <g>
                        <g>
                            <g>
                                <path class="st0" d="M29.9,9c0-1.2-0.2-2.4-0.6-3.5c-0.9-2.4-2.5-4.1-5-4.9c-1.2-0.4-2.5-0.5-3.7-0.6C16.9,0,13.1,0,9.4,0.1
				C8.2,0.1,7.1,0.2,6,0.5C3.5,1.2,1.8,2.8,0.8,5.2C0.5,6,0.3,6.8,0.2,7.7C0,8.9,0,10,0,11.2c0,2.2,0,4.5,0,6.7c0,0.4,0,0.7,0,1.1
				c0,0.9,0,1.7,0.1,2.6c0,0.5,0.1,0.9,0.1,1.3c0.3,1.7,0.9,3.3,2.2,4.6C3,28,3.6,28.5,4.3,28.8c1,0.5,2,0.8,3.1,1
				c0.5,0.1,1,0.1,1.6,0.1c0.7,0,1.3,0,2,0c3.4,0,6.9,0.1,10.3-0.1c1,0,2-0.2,3-0.5c0.9-0.3,1.7-0.7,2.4-1.2c1.6-1.2,2.5-2.7,3-4.6
				c0.3-1.2,0.3-2.3,0.4-3.5C30,16.4,30,12.7,29.9,9z M27.3,18.9c0,1,0,1.9-0.1,2.9c-0.1,1.1-0.4,2.2-1,3.2
				c-0.3,0.4-0.7,0.8-1.1,1.1c-0.6,0.5-1.3,0.8-2,0.9c-0.6,0.1-1.1,0.2-1.7,0.2c-3.7,0.2-7.4,0.1-11.1,0.1c-1,0-2,0-3-0.3
				c-1.2-0.3-2.3-0.8-3.1-1.8c-0.6-0.7-0.9-1.5-1.1-2.3c-0.2-0.8-0.2-1.7-0.3-2.5c0-1-0.1-2,0-3c0-2.6,0-5.3,0.1-7.9
				C2.8,8.6,2.8,7.8,3,7c0.5-1.8,1.5-3.1,3.3-3.7c0.8-0.3,1.7-0.4,2.6-0.4c3.7-0.1,7.4-0.1,11.1,0c0.8,0,1.6,0,2.4,0.2
				c1.5,0.3,2.8,0.9,3.7,2.2c0.5,0.8,0.8,1.6,0.9,2.5c0.2,1.7,0.2,3.3,0.2,5C27.3,14.7,27.3,16.8,27.3,18.9z" />
                                <path class="st0" d="M18.5,8.2c-1.8-0.9-3.7-1.1-5.7-0.5c-1.1,0.3-2.1,0.9-3,1.6c-0.5,0.4-0.9,0.9-1.2,1.4c-0.4,0.6-0.7,1.3-1,2
				c-0.5,1.5-0.5,3.1,0,4.6c0.3,0.9,0.7,1.6,1.2,2.3c0.3,0.4,0.7,0.8,1.2,1.2c0.5,0.4,1.1,0.8,1.7,1.1c0.9,0.4,1.9,0.7,2.9,0.7
				c0.7,0,1.4,0,2.1-0.2c0.9-0.2,1.8-0.6,2.6-1.1c0.7-0.5,1.4-1.1,1.9-1.8c1.2-1.7,1.7-3.6,1.4-5.6C22.2,11.3,20.8,9.4,18.5,8.2z
				 M17.5,19.3c-0.4,0.2-0.7,0.4-1.1,0.5c-2.1,0.6-4.4-0.2-5.6-2.1C9.6,16.1,9.7,13.6,11,12c1.3-1.7,3.1-2.3,5.1-1.8
				c2,0.5,3.3,1.8,3.8,3.9C20.4,16.1,19.4,18.3,17.5,19.3z" />
                                <path class="st0" d="M23,5.2c-1,0-1.8,0.8-1.8,1.8c0,1,0.8,1.8,1.8,1.8c1,0,1.8-0.8,1.8-1.8C24.8,6,24,5.2,23,5.2z" />
                            </g>
                        </g>
                    </g>
                </svg>
                <p class="d-none d-sm-block title-font m-0 fs-2 d-flex align-self-center" style="color:#ca15c6;">Instagram</p>
            </a>
        </li>
        <li>
            <a href="" class="d-flex" style="height:37px;">
                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37.08 37.09">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #0a3f70;
                                stroke-width: 0px;
                            }
                        </style>
                    </defs>
                    <g id="_レイヤー_1-2">
                        <path class="cls-1" d="m37.08,2.87v31.35c0,1.59-1.28,2.87-2.87,2.87h-8.85v-13.88c0-.29-.02-.26.26-.26h4.19q.18,0,.21-.17c.26-1.75.54-3.51.8-5.26.05-.31.04-.31-.26-.31h-5q-.19,0-.2-.19v-3.49c0-.27.02-.55.07-.81.21-1.12.84-1.86,1.95-2.18.41-.12.85-.16,1.28-.16h2.23c.22,0,.21.02.21-.21v-4.56c0-.08-.02-.12-.12-.13-.23-.03-.46-.07-.69-.1-1-.13-2-.22-3.01-.26-.86-.03-1.72,0-2.56.18-1.01.2-1.94.57-2.78,1.18-1.18.86-1.94,2.02-2.37,3.4-.31.98-.41,1.98-.41,3,0,1.38,0,2.76,0,4.13,0,.21,0,.19-.19.19h-4.75c-.07,0-.11.03-.11.11,0,.03,0,.07,0,.12v5.29c0,.24-.02.23.23.23h4.56c.28,0,.26-.03.26.26v13.88H2.87c-1.59,0-2.87-1.29-2.87-2.87V2.87C0,1.29,1.28,0,2.87,0h31.35c1.59,0,2.87,1.29,2.87,2.87Z" />
                    </g>
                </svg>
                <p class="d-none d-sm-block title-font m-0 fs-2 d-flex align-self-center" style="color:#0a3f70;">Facebook</p>
            </a>
        </li>
        <li">
            <a href="" class="d-flex" style="height:35px;">
                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve">
                    <style type="text/css">
                        .st1 {
                            fill: #1a1a1a;
                        }
                    </style>
                    <g>
                        <g>
                            <g>
                                <path class="st1" d="M17.8,12.7L28.7,0h-2.6l-9.5,11L9.1,0H0.3l11.5,16.7L0.3,30h2.6l10-11.6l8,11.6h8.7L17.8,12.7L17.8,12.7z
				 M14.2,16.8l-1.2-1.7L3.8,1.9h4l7.5,10.7l1.2,1.7l9.7,13.9h-4L14.2,16.8L14.2,16.8z" />
                            </g>
                        </g>
                    </g>
                </svg>
                <p class="d-none d-sm-block title-font m-0 fs-2 d-flex align-self-center" style="color:#1a1a1a;">Twitter</p>
            </a>
            </li>
    </ul> -->
    <div class="swiper_sns_container container position-relative overflow-hidden fadeIn" style="z-index:-1; animation-delay:1.4s;">
        <div class="swiper_sns">
            <!-- <div class="swiper-wrapper">
                <?php foreach ($insta as $k => $v) : ?>
                    <div class="swiper-slide size_swiper_sns px-1 overflow-hidden">
                        <a href="' . $v['link'] . '" target="_blank">
                            <img class="impress w-100 h-100 object-fit-cover rounded-2" src="<?php echo $v['img']; ?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div> -->
            <div class="swiper-wrapper">
                <?php foreach ($stores as $store) : ?>
                    <div class="swiper-slide size_swiper_sns px-1 overflow-hidden">
                        <img class="impress w-100 h-100 object-fit-cover rounded-2" src="<?php echo $store; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
        <div class="swiper-pagination"></div>
    </div>
    <!-- <div class="text-muted"><a href="https://www.instagram.com/tk.sample/">view more</a></div> -->
</section>

<script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

    var screenWidth = $(window).width();
    // SNS instagramの設定　*********************************
    if (screenWidth < 577) {
        const swiper_sns = new Swiper(".swiper_sns", {
            loop: true, // ループ有効
            pagination: { // ページネーション
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: { // 前後の矢印
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: 2, // 一度に表示する枚数
            speed: 4000, // ループの時間
            allowTouchMove: false, // スワイプ無効
            autoplay: {
                delay: 0, // 途切れなくループ
            },
        });
    } else if (screenWidth < 769) {
        const swiper_sns = new Swiper(".swiper_sns", {
            loop: true, // ループ有効
            pagination: { // ページネーション
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: { // 前後の矢印
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: 3, // 一度に表示する枚数
            speed: 4000, // ループの時間
            allowTouchMove: false, // スワイプ無効
            autoplay: {
                delay: 0, // 途切れなくループ
            },
        });
    } else if (screenWidth < 993) {
        const swiper_sns = new Swiper(".swiper_sns", {
            loop: true, // ループ有効
            pagination: { // ページネーション
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: { // 前後の矢印
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: 4, // 一度に表示する枚数
            speed: 5000, // ループの時間
            allowTouchMove: false, // スワイプ無効
            autoplay: {
                delay: 0, // 途切れなくループ
            },
        });
    } else {
        const swiper_sns = new Swiper(".swiper_sns", {
            loop: true, // ループ有効
            pagination: { // ページネーション
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: { // 前後の矢印
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: 5, // 一度に表示する枚数
            speed: 5000, // ループの時間
            allowTouchMove: false, // スワイプ無効
            autoplay: {
                delay: 0, // 途切れなくループ
            },
        });
    }
    // SNS instagramの設定　*********************************
</script>