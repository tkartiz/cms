<?php
// ABOUT・スライダー
$abouts = glob('asset/img/about/*.jpg');
$abouts_reverse = array_reverse($abouts);
$slider_height = 360;
$slider_width = 800;
$about_height = $slider_height * 2 + 200;
// ABOUT・スライダー

$title_about_fonts = array('F', 'a', 'c', 'i', 'l', 'i', 't', 'y');
$delay_time = 0;
?>
<section id="about" class="container">
    <div class="position-relative" style="height:<?php echo $about_height; ?>px;">
        <a href="about/">
            <div class="title-about position-absolute">
                <div class="title-font title-fs d-flex title-effect-trigger mb-2">
                    <?php foreach ($title_about_fonts as $title_about_font) : ?>
                        <span class="effect-inner-container" style="animation-duration:1s; animation-delay: <?php echo $delay_time; ?>s; ">
                            <span class="effect-inner" style="animation-duration:1.5s; animation-delay: <?php echo $delay_time; ?>s; "><?php echo $title_about_font; ?></span>
                        </span>
                        <?php $delay_time += 0.04; ?>
                    <?php endforeach; ?>
                </div>
                <p class="title-fs-sub ms-3 fadeIn" style="animation-delay: <?php echo $delay_time; ?>s;">湘南ちがさき&nbsp;について</p>
            </div>

            <div class="position-absolute bg-white mx-3 fadeIn" style="z-index:10; bottom:0px; right:0;">
                <p class="px-5 py-4 lh-lg fw-bold">
                    道の駅紹介のサンプル記事<br>
                    サンプル記事サンプル記事サンプル記事サンプル記事<br>
                    サンプル記事サンプル記事サンプル記事サンプル記事<br>
                    サンプル記事サンプル記事サンプル記事サンプル記事<br>
                    サンプル記事サンプル記事<br>
                    サンプル記事サンプル記事サンプル記事
                </p>
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
                <div class="swiper_about2 overflow-hidden" style="height:<?php echo $slider_height; ?>; margin-top:-8px;">
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
        </a>
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