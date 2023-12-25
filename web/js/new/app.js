$(document).ready(function() {
    $('body').on('click','.fs-nav-burger',function () {
        $('.fs-hidden-menu-list-wrapper-ul ').toggleClass('d-none');
    })
    $('body').on('click','.small-sliders',function () {
        $('.big-slider').addClass('d-none');
        $('.slidern_'+$(this).data('id')).removeClass('d-none');
    })
    // $('body').on('error','img', function() {
    //     alert(1);
    //     $(this).attr('src' , 'web/images/undefined.webp');
    // });
    document.addEventListener('DOMContentLoaded', function() {
        var images = document.querySelectorAll('img');

        images.forEach(function(img) {
            img.addEventListener('error', function() {
                img.src = 'web/images/undefined.webp';
                img.alt = 'web/images/undefined.webp';
            });
        });
    });
})
