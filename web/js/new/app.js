$(document).ready(function() {
    $('body').on('click','.fs-nav-burger',function () {
        $('.fs-hidden-menu-list-wrapper-ul ').toggleClass('d-none');
    })
    $('body').on('click','.small-sliders',function () {
        $('.big-slider').addClass('d-none');
        $('.slidern_'+$(this).data('id')).removeClass('d-none');
    })
})
