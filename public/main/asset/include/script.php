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

<!-- Google Tag Manager (noscript) -->
<!-- End Google Tag Manager (noscript) -->

<!-- Yahoo Tag -->
<!-- End Yahoo Tag -->

<!-- jquery Js読込み start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- jquery Js読込み end -->

<!-- Bootstrap Js読込み start -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- Bootstrap Js読込み end -->

<!-- swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- swiper -->

<!-- 専用Js読込み start -->
<!-- メイン -->
<script src="<?php echo $pre; ?>asset/js/main.js?p=(new Date()).getTime()"></script>
<!-- 波 -->
<?php if ($level === 1) { ?>
    <script src="<?php echo $pre; ?>asset/js/wave_init1.js?p=(new Date()).getTime()"></script>
<?php } else { ?>
    <script src="<?php echo $pre; ?>asset/js/wave_init2.js?p=(new Date()).getTime()"></script>
<?php } ?>
<script src="<?php echo $pre; ?>asset/js/wave_func.js?p=(new Date()).getTime()"></script>
<!-- カウントダウンタイマー -->
<!-- <script src="<?php echo $pre; ?>asset/js/countdown.js?p=(new Date()).getTime()"></script> -->
<!-- 専用Js読込み end -->