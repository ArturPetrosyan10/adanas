$(document).ready(function() {
    $('body').on('click','.fs-nav-burger',function () {
        $('.fs-hidden-menu-list-wrapper-ul ').toggleClass('d-none');
    })
    $('body').on('click','.small-sliders',function () {
        $('.big-slider').addClass('d-none');
        $('.slidern_'+$(this).data('id')).removeClass('d-none');
    })

    $('body').on('click','.changeProductVariation',function () {
        changeProductVariation($(this));
    })
    function changeProductVariation(el) {
        let var_id = el.data('var_id');
        let var_price = el.data('var_price');
        $('body').find('.fs-single-row').find('.fs-single-product-current-price').text(formatNumberWithCommas(var_price)+' դր/ ' + '');
        $('body').find('.fs-single-row').find('.fs-single-product-current-price').attr('data-price',var_price);
        $('body').find('.fs-product-add-to-cart-1').attr('data-price',var_price);
        $('body').find('.fs-product-add-to-cart-1').attr('data-variation',var_id);
        $('body').find('.fs-product-add-to-cart-1').attr('disabled',false);
    }
})
function formatNumberWithCommas(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}