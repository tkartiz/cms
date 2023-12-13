<?php
$subtitle1_fonts = array('道', 'の', '駅');
$delay_time = 1.5;

$subtitle2_fonts = array('湘', '南', 'ち', 'が', 'さ', 'き');
$subtitle3_fonts = array('2', '0', '2', '5', '.', '7', '&nbsp;', 'O', 'P', 'E', 'N');
?>
<div id="top" class="w-100 position-relative">
    <div id="fsv" class="w-100 h-100 position-relative toptitle-effect-trigger">
        <div class="fsv-title position-absolute">
            <div class="fsv-subtitle1 d-flex align-items-end">
                <div class="clip-text clip-text_one px-3 py-0 px-md-4 px-xxl-5">

                    <!-- 道の駅 -->
                    <?php foreach ($subtitle1_fonts as $subtitle1_font) : ?>
                        <span class="effect-inner-container appear" style="animation-duration:1s; animation-delay: <?php echo $delay_time; ?>s; ">
                            <span class="effect-inner" style="animation-duration:1.5s; animation-delay: <?php echo $delay_time; ?>s; "><?php echo $subtitle1_font; ?></span>
                        </span>
                        <?php $delay_time += 0.04; ?>
                    <?php endforeach; ?>
                    <?php $delay_time += 0.1; ?>

                </div>
                <div class="fsv-subtitle4 fadeIn" style="animation-delay: <?php echo $delay_time; ?>s; ">
                    <p class="m-0 px-3 px-md-4 py-1">
                        茅ヶ崎の魅力いっぱい<br>あなたのセカンドリビング
                    </p>
                </div>
            </div>
            <div class="fsv-subtitle2 clip-text clip-text_one ms-4 px-3 py-0 ms-md-5 px-md-5">
                <!-- 湘南ちがさき -->
                <?php foreach ($subtitle2_fonts as $subtitle2_font) : ?>
                    <span class="effect-inner-container appear" style="animation-duration:1s; animation-delay: <?php echo $delay_time; ?>s; ">
                        <span class="effect-inner" style="animation-duration:1.5s; animation-delay: <?php echo $delay_time; ?>s; "><?php echo $subtitle2_font; ?></span>
                    </span>
                    <?php $delay_time += 0.04; ?>
                <?php endforeach; ?>
            </div>
            <div class="fsv-subtitle3 clip-text clip-text_one px-3 py-0 px-md-5">
                <!-- <span class="font-monospace">2025</span>.<span class="font-monospace">7&nbsp;OPEN</span> -->
                <?php foreach ($subtitle3_fonts as $subtitle3_font) : ?>
                    <span class="font-monospace effect-inner-container appear" style="animation-duration:1s; animation-delay: <?php echo $delay_time; ?>s; ">
                        <span class="effect-inner" style="animation-duration:1.5s; animation-delay: <?php echo $delay_time; ?>s; "><?php echo $subtitle3_font; ?></span>
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