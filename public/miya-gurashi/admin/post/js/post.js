// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
// main_announce.php
// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
// 公開／下書き選択表示
document.getElementById("all").addEventListener("click", function () {
    $('.release').removeClass('d-none');
    $('.draft').removeClass('d-none');
    $('.release').addClass('d-block');
    $('.draft').addClass('d-block');
});

document.getElementById("release").addEventListener("click", function () {
    $('.release').removeClass('d-none');
    $('.draft').removeClass('d-block');
    $('.release').addClass('d-block');
    $('.draft').addClass('d-none');
});

document.getElementById("draft").addEventListener("click", function () {
    $('.release').removeClass('d-block');
    $('.draft').removeClass('d-none');
    $('.release').addClass('d-none');
    $('.draft').addClass('d-block');
});
// 公開／下書き選択表示