// 画面横幅変更時200ms後に1回だけ読込み実施
$(function () {
    var timer = false;
    var prewidth = $(window).width();
    $(window).resize(function () {
        if (timer !== false) {
            clearTimeout(timer);
        }
        timer = setTimeout(function () {
            var nowWidth = $(window).width();
            if (prewidth !== nowWidth) {
                location.reload();
            }
            prewidth = nowWidth;
        }, 200);
    });
});
// 画面横幅変更時に1回だけ読込み実施

// メニュー
$('#menu').click(function () {
    if ($('#menu-collapse').hasClass('d-none')) {
        $('#menu-collapse').removeClass('d-none');
    } else {
        $('#menu-collapse').addClass('d-none');
    };
})

$('.jump').click(function () {
    if (!$('#menu-collapse').hasClass('d-none')) {
        $('#menu-collapse').addClass('d-none');
    };
})

window.addEventListener("mousewheel", function (e) {
    e.preventDefault();
    if (e.wheelDelta != 0) {
        $('#menu-collapse').addClass('d-none');
    }
});
// メニュー

