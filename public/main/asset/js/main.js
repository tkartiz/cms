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
$("#menu").on("click", function () {
    if ($("#menu-collapse").hasClass("d-none")) {
        $("#menu-collapse").removeClass("d-none");
    } else {
        $("#menu-collapse").addClass("d-none");
    }
});

$(".jump").on("click", function () {
    if (!$("#menu-collapse").hasClass("d-none")) {
        $("#menu-collapse").addClass("d-none");
    }
});

window.onwheel = (event) => {
    if (event.deltaY != 0) {
        $("#menu-collapse").addClass("d-none");
        $(".dropdown-menu").removeClass("show");
    }
};
// メニュー

// タイトル出現効果
window.addEventListener("load", () => {
    $(".toptitle-effect-trigger").each(function () {
        var clipText = $(this).find(".clip-text");
        var fadeInText = $(this).find(".fadeIn");
        var container = $(this).find(".effect-inner-container");
        var inner = $(this).find(".effect-inner");
        clipText.addClass("appear");
        fadeInText.addClass("appear");
        container.addClass("appear");
        inner.addClass("appear");
    });
});

window.addEventListener("scroll", () => {
    var scroll = window.scrollY;

    $(".title-effect-trigger").each(function () {
        var elemPos = $(this).offset().top + 100;
        var windowHeight = $(window).height();
        var container = $(this).find(".effect-inner-container");
        var inner = $(this).find(".effect-inner");

        if (scroll >= elemPos - windowHeight) {
            $(this).addClass("appear");
            container.addClass("appear");
            inner.addClass("appear");
        }
    });

    $(".fadeIn").each(function () {
        var elemPos = $(this).offset().top - 50;
        var windowHeight = $(window).height();
        if (scroll >= elemPos - windowHeight) {
            $(this).addClass("appear");
        }
    });
});

// タイトル出現効果
