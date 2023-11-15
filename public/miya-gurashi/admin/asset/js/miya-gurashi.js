/* =============================================================== */
/*　効果*/
/* =============================================================== */
// スクロールフェードアップの動き
function fadeAnime() {
    $('.fadeUpTrigger').each(function () {
        if (window.matchMedia("(max-width: 575px)").matches) {
            $(this).addClass('fadeUp');
        } else {
            var elemPos = $(this).offset().top + 100;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll >= elemPos - windowHeight) {
                $(this).addClass('fadeUp');
            } else {
                $(this).removeClass('fadeUp');
            }
        }
    });

    $('.fadeInTrigger').each(function () {
        if (window.matchMedia("(max-width: 575px)").matches) {
            $(this).addClass('fadeIn');
        } else {
            var elemPos = $(this).offset().top + 100;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll >= elemPos - windowHeight) {
                $(this).addClass('fadeIn');
            } else {
                $(this).removeClass('fadeIn');
            }
        }
    });
}

$(window).scroll(function () {
    fadeAnime();
});