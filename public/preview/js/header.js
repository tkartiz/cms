$('#menu').click(function() {
    if($('#menu-collapse').hasClass('d-none')){
        $('#menu-collapse').removeClass('d-none');
    } else {
        $('#menu-collapse').addClass('d-none');
    };
})