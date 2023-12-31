<?php
$subtitle1_fonts = array('道', 'の', '駅');
$delay_time = 1.5;

$subtitle2_fonts = array('湘', '南', 'ち', 'が', 'さ', 'き');
$subtitle3_fonts = array('2', '0', '2', '5', '.', '7', '&nbsp;', 'O', 'P', 'E', 'N');
?>
<div id="top" class="w-100 position-relative">

    <!-- 非表示 -->
    <!-- 見出し -->
    <h1 class="d-none">湘南初の道の駅。道の駅 湘南ちがさき</h1>
    <!-- 内容 -->
    <h2 class="d-none">潮風薫る“ちがさき愛”いっぱいの交流拠点として、令和7年7月（予定）にオープンいたします！【休憩機能】ゆったりとした雰囲気によるリラクゼーションを提供、【情報発信機能】さまざまなニーズに対応した情報提供と魅力・資源を発信、【地域連携機能】地域とのつながり、“ちがさき愛”を育み発信、このような機能を兼ね備えた道の駅です。</h2>
    <!-- 非表示 -->

    <div id="fsv" class="w-100 h-100 position-relative toptitle-effect-trigger">
        <div class="fsv-title position-absolute position-relative">
            <div class="d-flex align-items-end w-100 m-0">
                <div class="fsv-subtitle1">
                    <!-- 道の駅 -->
                    <?php foreach ($subtitle1_fonts as $subtitle1_font) : ?>
                        <span class="effect-inner-container" style="animation-duration:1s; animation-delay: <?php echo $delay_time; ?>s;">
                            <span class="effect-inner clip-text clip-text_one" style="animation-duration:1.5s; animation-delay: <?php echo $delay_time; ?>s; "><?php echo $subtitle1_font; ?></span>
                        </span>
                        <?php $delay_time += 0.04; ?>
                    <?php endforeach; ?>
                    <?php $delay_time += 0.1; ?>
                </div>
                <div class="fsv-subtitle4" style="animation-delay: <?php echo $delay_time; ?>s; ">
                    <p class="m-0 ps-0 ps-sm-3 ps-md-0">
                        茅ヶ崎の魅力いっぱい<br><span style="color:#db62e0;">湘南初</span>の道の駅が誕生！
                    </p>
                </div>
            </div>
            <div class="fsv-subtitle2">
                <!-- 湘南ちがさき -->
                <?php foreach ($subtitle2_fonts as $subtitle2_font) : ?>
                    <span class="effect-inner-container" style="animation-duration:1s; animation-delay: <?php echo $delay_time; ?>s; ">
                        <span class="effect-inner clip-text clip-text_one" style="animation-duration:1.5s; animation-delay: <?php echo $delay_time; ?>s; "><?php echo $subtitle2_font; ?></span>
                    </span>
                    <?php $delay_time += 0.04; ?>
                <?php endforeach; ?>
            </div>
            <div class="fsv-subtitle3">
                <!-- 2025.7 OPEN -->
                <?php foreach ($subtitle3_fonts as $subtitle3_font) : ?>
                    <span class="font-monospace effect-inner-container" style="animation-duration:1s; animation-delay: <?php echo $delay_time; ?>s; ">
                        <span class="effect-inner clip-text clip-text_one" style="animation-duration:1.5s; animation-delay: <?php echo $delay_time; ?>s; "><?php echo $subtitle3_font; ?></span>
                    </span>
                    <?php $delay_time += 0.04; ?>
                <?php endforeach; ?>
                <!-- <div id="countdown" class="timer_1 lh-sm fs-1 fw-bold" style="font-size:6rem;"></div> -->
            </div>
        </div>
    </div>

    <!-- 波 -->
    <canvas id="waveCanvasTop" class="position-absolute bottom-0"></canvas>
</div>