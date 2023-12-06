window.addEventListener("mousewheel", function (e) {
    e.preventDefault();
    if (e.wheelDelta != 0) {
        $('#pers-frm1').addClass('d-none');
        $('#pers-frm2').addClass('d-none');
        $('#menu-collapse').addClass('d-none');
    }
});

$('#pers1').click(function () {
    if ($('#pers1-img').hasClass('d-none')) {
        $('#pers-frm1').removeClass('d-none');
        $('#pers1-img').removeClass('d-none');
        $('#pers1-img').addClass('appear');
        $('#pers2-img').addClass('d-none');
        $('#pers3-img').addClass('d-none');
        $('#pers-frm2').addClass('d-none');
    } else {
        $('#pers-frm1').addClass('d-none');
        $('#pers1-img').addClass('d-none');
    };
})

$('#pers2').click(function () {
    if ($('#pers2-img').hasClass('d-none')) {
        $('#pers-frm1').removeClass('d-none');
        $('#pers2-img').removeClass('d-none');
        $('#pers2-img').addClass('appear');
        $('#pers1-img').addClass('d-none');
        $('#pers3-img').addClass('d-none');
        $('#pers-frm2').addClass('d-none');
    } else {
        $('#pers-frm1').addClass('d-none');
        $('#pers2-img').addClass('d-none');
    };
})

$('#pers3').click(function () {
    if ($('#pers3-img').hasClass('d-none')) {
        $('#pers-frm1').removeClass('d-none');
        $('#pers3-img').removeClass('d-none');
        $('#pers3-img').addClass('appear');
        $('#pers1-img').addClass('d-none');
        $('#pers2-img').addClass('d-none');
        $('#pers-frm2').addClass('d-none');
    } else {
        $('#pers-frm1').addClass('d-none');
        $('#pers3-img').addClass('d-none');

    };
})

$('#pers4').click(function () {
    if ($('#pers-frm2').hasClass('d-none')) {
        $('#pers-frm2').removeClass('d-none');
        $('#pers-frm2').addClass('appear');
        $('#pers-frm1').addClass('d-none');
        $('#pers1-img').addClass('d-none');
        $('#pers2-img').addClass('d-none');
        $('#pers3-img').addClass('d-none');
    } else {
        $('#pers-frm2').addClass('d-none');
    };
})

