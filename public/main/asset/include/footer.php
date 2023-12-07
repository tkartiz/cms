<?php
// パス階層調整
if ($level === 3) {
    $pre = '../../';
} else if ($level === 2) {
    $pre = '../';
} else {
    $pre = '';
}
// パス階層調整
?>

<footer class="flex-container overflow-hidden position-relative wave">
    <p class="position-absolute bottom-0 end-0 m-0 p-2 me-sm-5 p-sm-3" style="z-index:10;">(C) 2023 SHONANCHIGASAKI</p>
    <img src="<?php echo $pre;?>asset/img/footer/fuji.png" alt="富士山" class="fuji position-absolute">
    <!-- 波 -->
    <canvas id="waveCanvas" class="position-absolute bottom-0"></canvas>
</footer>