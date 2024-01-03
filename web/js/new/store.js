
jQuery.noConflict();
(function($) {
$(document).ready(function() {
    const body = $('body');
    $('body').on('click','#createStore', function (event) {
        openPopup();
    });
    function openPopup() {
        jQuery(".modal").remove();
        jQuery.ajax({
            url: "/store/create-store",
            success: function (result) {
                jQuery("body").append(result);
                $('#store-location-latitude').val(myLatitude);
                $('#store-location-longitude').val(myLongitude);
            }
        });

    }
    function getDataStore(position) {
        jQuery.ajax({
            url: "/store/index",
            success: function (result) {
                result = JSON.parse(result)
                poz = position
                result.forEach(el => {
                    el = el.location.split(', ')
                    let d = Math.pow((position[0] - +el[0]) ** 2 + (position[1] - +el[1]) ** 2, 1 / 2) * 100000
                    d <= 50 && (poz = el)
                })

            }
        });
    }
    $('.CreateDocument').on('click',function (){
        $('#CreateDocument').modal('show')
    });
        // $('body').on('click','.addProduct',function () {
        //     let el = $(this).closest('.inputGroup').clone();
        //     addProduct(el);
        // })
    $('body').on('click','.concurentsToggle',function () {
        $('body').find('#Concurents').toggleClass('d-none');
        $('body').find('.content').toggleClass('width-newmenu');
        if ($(this).html() === 'Տեսնել կոնկուրենտները') {
            $(this).html('Փակել կոնկուրենտները');
        } else {
            $(this).html('Տեսնել կոնկուրենտները');
        }
    })
    $('body').on('click','.chooseConc',function () {
        let el = $(this);
        let productCount = $('.inputGroup input[name="product[]"').length;
        let inputs = '';
        for (let i = 0; i < productCount; i++){
            inputs +='<input type="number" class="form-control" step="any" name="count[concurent]['+el.data('id')+'][]">';
        }
        let new_el = '<div class="d-flex flex-column border h-75 newConcList">\n' +
            '<input type="hidden" name="concurent[]" value="'+el.data('id')+'" >'+
            '                            <div class="col-sm-12 border d-flex justify-content-center">\n' +
            '                                <label class="" for="">'+el.html()+'</label>' +
            '                                <i class="fa fa-minus removeList" data-id="'+el.data('id')+'"></i>'+
            '                            </div>\n' +
            '                            <div class="col-sm-12">\n' +
            '                                <label for="">Առկա է (Քանակ)</label>\n' +
            inputs +
            '                            </div>\n' +
            '                        </div>';
        $('body').find('.concProdList').append(new_el);
        el.toggleClass('d-flex d-none');
    })
    $('body').on('click','.removeList',function () {
        let el = $(this);
        el.closest('.newConcList').remove();
        $('.chooseConc[data-id="'+el.data('id')+'"]').toggleClass('d-flex d-none');
    })
    // function addProduct(el){
    //     let last_el = $('body').find('.inputGroup').last();
    //     last_el.after(el);
    //     body.find('.newConcList').each(function() {
    //         let input = $(this).find('input').last();
    //         let new_input = input.clone();
    //         input.closest('div').append(new_input);
    //     });
    // }

    $('body').on('click','.ProductList', function (el) {
        if($('#ProdListPopup')){
            $('#ProdListPopup').remove();
        }
        var store_id = $(this).data('id');
        $.ajax({
            url: '/store/modal-prod-list',
            method: 'get',
            dataType: 'html',
            data: { store_id: store_id,  },
            success: function (data) {
                $('body').append(data);
                $('body').find('.ProdListPopup').trigger('click');
                $('body').find('.ProdListPopup').remove();
                // $('.multiple-select-field').select2();
                $('.multiple-select-field').select2({
                    placeholder: 'Search for a product', // Placeholder text for the search box
                    allowClear: true // Adds a small 'x' button to clear the selection
                });
            }
        });
    })

})
})(jQuery);