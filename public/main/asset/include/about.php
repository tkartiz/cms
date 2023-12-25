<?php
// ABOUT・スライダー
$abouts = glob('asset/img/about/*.jpg');
$abouts_reverse = array_reverse($abouts);
$slider_height = 250;
$slider_width = 800;
$about_height = $slider_height * 2 + 200;
// ABOUT・スライダー

// $title_about_fonts = array('F', 'a', 'c', 'i', 'l', 'i', 't', 'y');
$title_about_fonts = array('A', 'b', 'o', 'u', 't');
$delay_time = 0.7;
?>
<section id="about" class="container">
    <div class="position-relative" style="height:<?php echo $about_height; ?>px;">
        <!-- <a href="about/"> -->
        <div class="title-about position-absolute title-effect-trigger">
            <div class="title-font title-fs d-flex mb-2">
                <?php foreach ($title_about_fonts as $title_about_font) : ?>
                    <span class="effect-inner-container" style="animation-duration:1s; animation-delay: <?php echo $delay_time; ?>s; ">
                        <span class="effect-inner" style="animation-duration:1.5s; animation-delay: <?php echo $delay_time; ?>s; "><?php echo $title_about_font; ?></span>
                    </span>
                    <?php $delay_time += 0.04; ?>
                <?php endforeach; ?>
            </div>
            <?php $delay_time += 0.2; ?>
            <p class="title-fs-sub ms-3 fadeIn" style="animation-delay: <?php echo $delay_time; ?>s;">湘南ちがさき&nbsp;について</p>
        </div>
        <div class="about-message col-12 col-lg-7 col-xl-6 col-5 bg-white mx-3 fadeIn">
            <p class="px-5 pt-3 lh-lg fw-bold">
                <span class="fs-3">ALOHA湘南初！茅ヶ崎発！</span><br>
                潮風薫る“ちがさき愛”いっぱいの交流拠点。<br>
                ゆったりとした雰囲気によるリラクゼーションを提供する【休憩機能】、さまざまなニーズに対応した情報提供と魅力・資源を発信する【情報発信機能】、地域とのつながり、 “ちがさき愛”を育み発信する【地域連携機能】を兼ね備えた道の駅が、令和7年7月にオープン予定です。
            </p>
            <p class="px-0 px-sm-5 pb-3 mb-0 w-100 text-end"><a href="https://www.chigasaki-brand.jp/station/" target_="_blank" class="text-muted small">詳しく見る▶</a></p>
        </div>
        <div>
            <div class="swiper_about1 overflow-hidden" style="height:<?php echo $slider_height; ?>;">
                <div class="swiper-wrapper">
                    <?php if (!is_null($abouts)) { ?>
                        <?php foreach ($abouts as $about) : ?>
                            <div class="swiper-slide mt-2 me-3">
                                <div style="width:<?php echo $slider_width; ?>px; height:<?php echo $slider_height; ?>px;"><img class="w-100 h-100 object-fit-cover" style="object-position:center;" src="<?php echo $about ?>" alt="" loading="lazy"></div>
                            </div>
                        <?php endforeach; ?>
                    <?php } ?>
                </div>
            </div>
            <div class="w-100 mx-auto bg-white mx-3 fadeIn d-block d-lg-none">
                <div class="px-2 pt-3 px-md-4 lh-lg fw-bold">
                    <p class="fs-3 text-center">ALOHA湘南初！茅ヶ崎発！</p>
                    <p class="mb-0">潮風薫る“ちがさき愛”いっぱいの交流拠点。<br>
                        ゆったりとした雰囲気によるリラクゼーションを提供する【休憩機能】、さまざまなニーズに対応した情報提供と魅力・資源を発信する【情報発信機能】、地域とのつながり、 “ちがさき愛”を育み発信する【地域連携機能】を兼ね備えた道の駅が、令和7年7月にオープン予定です。</p>
                </div>
                <p class="px-2 pb-3 mb-0 w-100 text-end"><a href="https://www.chigasaki-brand.jp/station/" target_="_blank" class="text-muted small">詳しく見る▶</a></p>
            </div>
            <div class="d-none d-lg-block swiper_about2 overflow-hidden" style="height:<?php echo $slider_height; ?>; margin-top:-8px;">
                <div class="swiper-wrapper">
                    <?php if (!is_null($abouts)) { ?>
                        <?php foreach ($abouts_reverse as $about_reverse) : ?>
                            <div class="swiper-slide mt-2 me-3">
                                <div style="width:<?php echo $slider_width; ?>px; height:<?php echo $slider_height; ?>px;"><img class="w-100 h-100 object-fit-cover" style="object-position:center;" src="<?php echo $about_reverse ?>" alt="" loading="lazy"></div>
                            </div>
                        <?php endforeach; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- </a> -->
    </div>
</section>

<script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

    // ABOUTの設定　*********************************
    var screenWidth = $(window).width();
    if (screenWidth < 769) {
        const swiper_about1 = new Swiper(".swiper_about1", {
            loop: true, // ループ有効
            slidesPerView: 1, // 一度に表示する枚数
            speed: 10000, // ループの時間
            allowTouchMove: false, // スワイプ無効
            autoplay: {
                delay: 0, // 途切れなくループ
                reverseDirection: true // 逆方向
            },
        });

        const swiper_about2 = new Swiper(".swiper_about2", {
            loop: true, // ループ有効
            slidesPerView: 1, // 一度に表示する枚数
            speed: 10000, // ループの時間
            allowTouchMove: false, // スワイプ無効
            autoplay: {
                delay: 0, // 途切れなくループ
            },
        });
    } else {
        const swiper_about1 = new Swiper(".swiper_about1", {
            loop: true, // ループ有効
            slidesPerView: 2, // 一度に表示する枚数
            speed: 10000, // ループの時間
            allowTouchMove: false, // スワイプ無効
            autoplay: {
                delay: 0, // 途切れなくループ
                reverseDirection: true // 逆方向
            },
        });

        const swiper_about2 = new Swiper(".swiper_about2", {
            loop: true, // ループ有効
            slidesPerView: 2, // 一度に表示する枚数
            speed: 10000, // ループの時間
            allowTouchMove: false, // スワイプ無効
            autoplay: {
                delay: 0, // 途切れなくループ
            },
        });
    }
    // ABOUTの設定　*********************************
</script>