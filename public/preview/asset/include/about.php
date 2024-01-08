<?php
// ABOUT・スライダー
$abouts = glob('asset/img/about/*.jpg');
$abouts_reverse = array_reverse($abouts);
$slider_height = 250;
$about_height = $slider_height * 2 + 200;
// ABOUT・スライダー

// $title_about_fonts = array('F', 'a', 'c', 'i', 'l', 'i', 't', 'y');
$title_about_fonts = array('A', 'b', 'o', 'u', 't');
$delay_time = 0.7;
?>
<section id="about" class="container">

    <!-- 非表示 -->
    <!-- 見出し -->
    <h1 class="d-none">湘南初の道の駅。道の駅 湘南ちがさき</h1>
    <!-- 内容 -->
    <h2 class="d-none">潮風薫る“ちがさき愛”いっぱいの交流拠点として、令和7年7月（予定）にオープンいたします！【休憩機能】ゆったりとした雰囲気によるリラクゼーションを提供、【情報発信機能】さまざまなニーズに対応した情報提供と魅力・資源を発信、【地域連携機能】地域とのつながり、“ちがさき愛”を育み発信、このような機能を兼ね備えた道の駅です。</h2>
    <!-- 非表示 -->

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
        <div class="about-message col-12 col-lg-8 col-xl-7 col-xxl-6 bg-white mx-3 fadeIn">
            <p class="pt-3 lh-lg fw-bold" style="margin-left:2.25rem; margin-right:2.25rem;">
                <span class="fs-3">湘南初の道の駅。</span><br>
                潮風薫る“ちがさき愛”いっぱいの交流拠点として、<br>
                令和7年7月（予定）にオープンいたします！<br><br>
                【休憩機能】ゆったりとした雰囲気によるリラクゼーションを提供<br>
                【情報発信機能】さまざまなニーズに対応した情報提供と魅力・資源を発信<br>
                【地域連携機能】地域とのつながり、 “ちがさき愛”を育み発信<br>
                このような機能を兼ね備えた道の駅です。
            </p>
            <p class="px-0 px-sm-5 pb-3 mb-0 w-100 text-end"><a href="https://www.chigasaki-brand.jp/station/" target_="_blank" class="text-muted small">詳しく見る▶</a></p>
        </div>
        <div>
            <div class="slide-container" style="height:<?php echo $slider_height; ?>;">
                <div class="slide-wrapper">
                    <?php foreach ($abouts as $about) : ?>
                        <div class="slide">
                            <img src="<?php echo $about ?>" alt="パース画像">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slide-wrapper">
                    <?php foreach ($abouts as $about) : ?>
                        <div class="slide">
                            <img src="<?php echo $about ?>" alt="パース画像">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slide-wrapper">
                    <?php foreach ($abouts as $about) : ?>
                        <div class="slide">
                            <img src="<?php echo $about ?>" alt="パース画像">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="w-100 mx-auto bg-white fadeIn d-block d-lg-none">
                <div class="px-2 pt-3 px-md-4 lh-lg fw-bold">
                    <p class="fs-3 text-center">ALOHA湘南初！茅ヶ崎発！</p>
                    <p class="mb-4 mb-sm-0">
                        <span class="fs-3">湘南初の道の駅。</span><br>
                        潮風薫る“ちがさき愛”いっぱいの交流拠点として、<br class="d-none d-sm-block">
                        令和7年7月（予定）にオープンいたします！<br><br>
                        【休憩機能】ゆったりとした雰囲気によるリラクゼーションを提供<br><br class="d-block d-sm-none">
                        【情報発信機能】さまざまなニーズに対応した情報提供と魅力・資源を発信<br><br class="d-block d-sm-none">
                        【地域連携機能】地域とのつながり、 “ちがさき愛”を育み発信<br><br class="d-block d-sm-none">
                        このような機能を兼ね備えた道の駅です。
                    </p>
                </div>
                <p class="px-2 pb-3 mb-0 w-100 text-end"><a href="https://www.chigasaki-brand.jp/station/" target_="_blank" class="text-muted small">詳しく見る▶</a></p>
            </div>
            <div class="slide-container-reverse" style="height:<?php echo $slider_height; ?>;">
                <div class="slide-wrapper-reverse">
                    <?php foreach ($abouts_reverse as $about_reverse) : ?>
                        <div class="slide">
                            <img src="<?php echo $about_reverse ?>" alt="パース画像">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slide-wrapper-reverse">
                    <?php foreach ($abouts_reverse as $about_reverse) : ?>
                        <div class="slide">
                            <img src="<?php echo $about_reverse ?>" alt="パース画像">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="slide-wrapper-reverse">
                    <?php foreach ($abouts_reverse as $about_reverse) : ?>
                        <div class="slide">
                            <img src="<?php echo $about_reverse ?>" alt="パース画像">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- </a> -->
    </div>
</section>