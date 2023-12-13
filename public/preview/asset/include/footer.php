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

<?php if ($level != 1) {
    echo '<footer class="flex-container overflow-hidden position-relative wave" style="margin-top:0!important;">';
} else {
    echo '<footer class="flex-container overflow-hidden position-relative wave">';
} ?>
<p class="position-absolute bottom-0 end-0 m-0 p-2 me-sm-5 p-sm-3" style="z-index:10;">(C) 2023 SHONANCHIGASAKI</p>
<img src="<?php echo $pre; ?>asset/img/footer/fuji.png" alt="富士山" class="fuji position-absolute">
<!-- 波 -->
<div class="position-absolute bottom-0">
    <canvas id="waveCanvasFooter"></canvas>
    <div class="waveBaseFooter" style="margin-top:-5px;"></div>
</div>
</footer>