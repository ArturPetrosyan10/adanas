
    jQuery('#discountTable').DataTable( {
        paging: false,
        "searching": false,
        "info":false,
        "ordering": false,
        "language": {
            "emptyTable": "Հայտարարված զեղչեր չկան"
        },
    });
    jQuery.datepicker.regional['hy'] = {clearText: 'Effacer', clearStatus: '',
        closeText: 'փակել', closeStatus: 'Փակել անփոփոխ ',
        prevText: '<նախորդը', prevStatus: 'նախորդ ամիսը',
        nextText: 'հաջորդը>', nextStatus: 'հաջորդ ամիս',
        currentText: 'Ընթացիկ', currentStatus: 'Դիտեք ընթացիկ ամիսը',
        monthNames: ['Հունվար','Փետրվար','Մարտ','Ապրիլ','Մայիս','Հունիս',
            'Հուլիս','Օգոստոս','Սեպտեմբեր','Հոկտեմբեր','Նոյեմբեր','Դեկտեմբեր'],
        monthNamesShort: ['Հուն','Փետ','Մարտ','Ապր','Մայ','Հուն',
            'Հուլ','Օգո','Սեպ','Հոկ','Նոյ','Դեկ'],
        monthStatus: 'Դիտեք ևս մեկ ամիս', yearStatus: 'Դիտեք ևս մեկ տարի',
        weekHeader: 'Sm', weekStatus: '',
        dayNames: ['Կիրակի','Երկուշաբթի','Երեքշաբթի','Չորեքշաբթի','Հինգշաբթի','Ուրբաթ','Շաբաթ'],
        dayNamesShort: ['Կիր','Երկ', 'Երք','Չոր','Հնգ','Ուրբ','Շաբ'],
        dayNamesMin:  ['Կիր','Երկ', 'Երք','Չոր','Հնգ','Ուրբ','Շաբ'],
        dayStatus: 'Օգտագործեք DD որպես շաբաթվա առաջին օր', dateStatus: 'Kies DD, MM d',
        dateFormat: 'yy-mm-dd', firstDay: 1,
        initStatus: 'Ընտրեք ամսաթիվ', isRTL: false};
    jQuery.datepicker.setDefaults(jQuery.datepicker.regional['hy']);
    jQuery( ".datepicker" ).datepicker();
    jQuery( "#date_pk_start" ).datepicker();
    jQuery( "#date_pk_end" ).datepicker();
    jQuery('.cal-img').click(function(){
        jQuery(this).closest('.dt-block').find('input').focus();
    });
    var selected_item;
    jQuery('body').on('change','#switch',function(){
        jQuery('.dt-block-cg').toggleClass('hide');
    });
    jQuery('body').on('change','#switch-3',function(){
        jQuery('.assortment').toggleClass('hide');
    });
    jQuery('body').on('change','#switch-5',function(){
        jQuery('.assortment_sec').toggleClass('hide');
    });
    jQuery('body').on('change','#switch-4',function(){
        jQuery('.partners').toggleClass('hide');
    });
    jQuery('body').on('focus','.select_item',function(){
        jQuery('#addnew form').addClass('hide')
        selected_item = jQuery(this).attr('data-id');
        let elems = jQuery(this).attr('data-val');
        var lc = localStorage.getItem('.item_'+selected_item);
        if(lc && elems){
            jQuery('.checked_items_block').html(lc);
        } else {
            jQuery('.checked_items_block').html('');
        }
        let type_ = jQuery(this).closest('tr').find('select').val();
        if(!jQuery('#cond_type').length) {
            jQuery('#addnew .addItem').append('<input type="hidden" id="cond_type" value="'+type_+'">');
        } else {
            jQuery('#cond_type').replaceWith('<input type="hidden" id="cond_type" value="'+type_+'">');
        }
        jQuery('.search-cat').val('');
        jQuery('.items_block').html('');
        jQuery('#addnew .addItem').removeClass('hide');
    });
    jQuery('body').on('focus','.select_partner',function(){
        jQuery('#addnew form').addClass('hide')
        selected_item = jQuery(this).attr('data-id');
        let elems = jQuery(this).attr('data-val');
        var lc = localStorage.getItem('.item_'+selected_item);
        if(lc && elems){
            jQuery('.addPartners .checked_items_block').html(lc);
        } else {
            jQuery('.addPartners .checked_items_block').html('');
        }
        jQuery('.modal-header').hide();
        jQuery('.search-cat').val('');
        jQuery('.items_block').html('');
        jQuery('#addnew .addPartners').removeClass('hide');
    });
    jQuery('body').on('focus','.select_item_second',function(){
        jQuery('#addnew form').addClass('hide');
        selected_item = jQuery(this).attr('data-id');
        let elems = jQuery(this).attr('data-val');
        var lc = localStorage.getItem('.item_'+selected_item);
        if(lc && elems){
            jQuery('.checked_items_block').html(lc);
        } else {
            jQuery('.checked_items_block').html('');
        }
        jQuery('.search-cat').val('');
        jQuery('.items_block').html('');
        jQuery('#addnew .addItemSecond').removeClass('hide');
        let type_ = jQuery(this).closest('tr').find('select').val();
        if(!jQuery('#cond_type_second').length) {
            jQuery('#addnew .addItemSecond').append('<input type="hidden" id="cond_type_second" value="'+type_+'">');
        } else {
            jQuery('#cond_type_second').replaceWith('<input type="hidden" id="cond_type_second" value="'+type_+'">');
        }
        jQuery('#addnew .addType').addClass('hide');
    });

    jQuery('body').on('click','.return',function(){
        jQuery('#addnew form').removeClass('hide');
        jQuery('#addnew .addItem').addClass('hide');
    });
    jQuery('body').on('click','.return_partner',function(){
        jQuery('#addnew form').removeClass('hide');
        jQuery('.modal-header').show();
        jQuery('#addnew .addPartners').addClass('hide');
    });
    jQuery('body').on('click','.search-item',function(){
        var tp = jQuery('#cond_type').val();
        var text_ = jQuery(this).closest('.row').find('.search-cat').val();
        var this_ = jQuery(this);
        var category_ = jQuery(this).closest('.row').find('.category').val();


        jQuery.ajax({
            url: "/manager/get-items?text=" + text_+'&category='+category_+'&tp='+tp,
            success: function(result) {
                this_.closest('.row').find('.items_block').html(result);
            }
        });

    });
    jQuery('body').on('click','.search-item-partner',function(){
        var text_ = jQuery(this).closest('.row').find('.search-partner').val();
        var this_ = jQuery(this);
        if (text_) {
            jQuery.ajax({
                url: "/manager/get-partners?text=" + text_,
                success: function(result) {
                    this_.closest('.row').find('.items_block__ss').html(result);
                }
            });
        }
    });

    jQuery('body').on('click','.addproducts',function(){
        var elems = [];
        var i = 0;
       let elements_ = jQuery(this).closest('.row').find('.items_block li input');
        elements_.each(function(index){
           if(jQuery(this).is(':checked')){
               i++;
               elems.push(jQuery(this).attr('data-id'));
            }
        });
        jQuery('#addnew form').removeClass('hide');
        jQuery('#addnew .addItem').addClass('hide');
        jQuery('.item_'+selected_item).attr('data-val',elems);
        localStorage.setItem('.item_'+selected_item+'',jQuery('.checked_items_block').html());
        jQuery('.item_'+selected_item).val('ընտրված է '+i+' ապրանք');
    });
    jQuery('body').on('click','.addpartners',function(){
        var elems = [];
        var i = 0;
       let elements_ = jQuery(this).closest('.row').find('.items_block__ss li input');
        elements_.each(function(index){
           if(jQuery(this).is(':checked')){
               i++;
               elems.push(jQuery(this).attr('data-id'));
            }
        });
        jQuery('#addnew form').removeClass('hide');
        jQuery('#addnew .addPartners').addClass('hide');
        jQuery('.modal-header').show();
        jQuery('.item_'+selected_item).attr('data-val',elems);
        localStorage.setItem('.item_'+selected_item+'',jQuery('.checked_items_block').html());
        jQuery('.item_'+selected_item).val('ընտրված է '+i+' գործընկեր');
    });
    jQuery('body').on('click','.addproductssecond',function(){
        var elems = [];
        var i = 0;
       let elements_ = jQuery(this).closest('.row').find('.items_block li input');
        elements_.each(function(index){
           if(jQuery(this).is(':checked')){
               i++;
               elems.push(jQuery(this).attr('data-id'));
            }
        });
        jQuery('#addnew .addItemSecond').addClass('hide');
        jQuery('#addnew .addType').removeClass('hide');
        jQuery('.item_'+selected_item).attr('data-val',elems);
        localStorage.setItem('.item_'+selected_item+'',jQuery('.checked_items_block').html());
        jQuery('.item_'+selected_item).val('ընտրված է '+i+' ապրանք');
    });
    jQuery('body').on('change','input[type=checkbox]',function(){
        var elems = [];
        var i = 0;
        let elements_ = jQuery(this).closest('.row').find('.items_block li input');
        jQuery('.checked_items_block').html('');
        elements_.each(function(index){
            if(jQuery(this).is(':checked')){
                let id = jQuery(this).attr('data-id');
                jQuery('.checked_items_block').append('<span>'+jQuery(this).attr('data-name')+' <span onclick="remove_el(jQuery(this),'+id+')">X</span></span>');
            }
        });
        // jQuery('.item_'+selected_item).attr('data-val',elems);
        // jQuery('.item_'+selected_item).val('ընտրված է '+i+' ապրանք');
    });
    jQuery('body').on('change','#discount_type',function(){
        var type_ = parseInt(jQuery(this).val());
       switch (type_){
           case 1:
               jQuery('.sale-procent').removeClass('hide');
               jQuery('.sale-price').addClass('hide');
               jQuery('.sale-count').addClass('hide');
               jQuery('.sale-count-why').addClass('hide');
               break;
           case 2:
               jQuery('.sale-procent').addClass('hide');
               jQuery('.sale-price').removeClass('hide');
               jQuery('.sale-count').addClass('hide');
               jQuery('.sale-count-why').addClass('hide');
               break;
           case 3:
               jQuery('.sale-procent').addClass('hide');
               jQuery('.sale-price').removeClass('hide');
               jQuery('.sale-count').addClass('hide');
               jQuery('.sale-count-why').addClass('hide');
               break;
           case 4:
               jQuery('.sale-procent').addClass('hide');
               jQuery('.sale-price').addClass('hide');
               jQuery('.sale-count').removeClass('hide');
               jQuery('.sale-count-why').removeClass('hide');
               break;
           case 5:
               jQuery('.sale-procent').addClass('hide');
               jQuery('.sale-price').addClass('hide');
               jQuery('.sale-count').removeClass('hide');
               jQuery('.sale-count-why').addClass('hide');
               break;
       }
    });
    function remove_el(this_,id){
        this_.parent().remove();
        jQuery('input[data-id='+id+']').prop('checked', false);

    }
    jQuery('body').on('click','.check_all',function(){
        if (jQuery(this).is(':checked')) {
            jQuery('input:checkbox').prop('checked',true);
        } else {
            jQuery('input:checkbox').prop('checked', false);
        }
    });
    jQuery('body').on('click','.parent__',function(){
        let id = jQuery(this).attr('data-id');
        jQuery('.chaild__'+id).toggleClass('chaild__');
        if(jQuery(this).next().hasClass('chaild__')){
            jQuery(this).find('.minus').addClass('hide');
            jQuery(this).find('.plus').removeClass('hide');
        } else {
            jQuery(this).find('.minus').removeClass('hide');
            jQuery(this).find('.plus').addClass('hide');
        }
    });
    jQuery('body').on('click','.btn-add-cond',function(){
        jQuery('.cond').append(`<tr>
                                    <td><img src="/web/images/circle.png" alt="" class="mr-2"> Տեսականի</td>
                                    <td>
                                        <select class="form-control">
                                            <option value="=">Հավասար է</option>
                                            <option value="!=">Հավասար չէ</option>
                                            <option value="IN">Ցուցակում է</option>
                                            <option value="NOT IN">Ցուցակում չէ</option>       
                                            <option value="IN GROUP">Խմբում է</option>
                                            <option value="NOT IN GROUP">Խմբում չէ</option>
                                            <option value="IN GROUP LIST">Խմբերի ցուցակում է</option>
                                            <option value="NOT IN GROUP LIST">Խմբերի ցուցակում չէ</option>
                                            <option value="LIKE">Պարունակում է</option>
                                        </select></td>
                                    <td><input type="text"  class="form-control select_item item_`+jQuery('.cond tr').length+`" data-id="`+jQuery('.cond tr').length+`" placeholder="Ընտրել          ..."></td>
                                </tr>`);
    });
    jQuery('body').on('click','.btn-add-partner',function(){
        jQuery('.cond-partners td[colspan=3]').parent().addClass('hide');
        jQuery('.cond-partners').append(`<tr>
                                    <td><img src="/web/images/circle.png" alt="" class="mr-2"> Գործընկեր</td>
                                    <td>
                                        <select class="form-control" name="dec_condition[]">
                                            <option value="=">Հավասար է</option>
                                            <option value="!=">Հավասար չէ</option>
                                            <option value="IN">Ցուցակում է</option>
                                            <option value="NOT IN">Ցուցակում չէ</option>       
                                            <option value="LIKE">Պարունակում է
                                        </select></td>
                                    <td><input type="text" name="dec_condition_val[]"  class="form-control select_partner item_partner_`+jQuery('.cond-partners tr').length+`" data-id="partner_`+jQuery('.cond-partners tr').length+`" placeholder="Ընտրել          ..."></td>
                                </tr>`);
    });
    function addAnd(){
        jQuery('.cond').append(`<tr>
                                    <td>Խումբ <<և>></td>
                                    <td><input type="hidden" class="conditions" name="dec_condition_and_or[]" value="and"></td>
                                    <td></td>
                                </tr>`);
    }
    function addOr(){
        jQuery('.cond').append(`<tr>
                                    <td>Խումբ <<կամ>></td>
                                    <td><input type="hidden" name="dec_condition_and_or[]" class="conditions" value="or"></td>
                                    <td></td>
                                </tr>`);
    }

    jQuery('body').on('click','.btn-add-cond-second',function(){
        jQuery('.cond-second').append(`<tr>
                                    <td><img src="/web/images/circle.png" alt="" class="mr-2"> Տեսականի</td>
                                    <td>
                                        <select class="form-control" name="dec_condition_second[]">
                                            <option value="=">Հավասար է</option>
                                            <option value="!=">Հավասար չէ</option>
                                            <option value="IN">Ցուցակում է</option>
                                            <option value="NOT IN">Ցուցակում չէ</option>       
                                            <option value="IN GROUP">Խմբում է</option>
                                            <option value="NOT IN GROUP">Խմբում չէ</option>
                                            <option value="IN GROUP LIST">Խմբերի ցուցակում է</option>
                                            <option value="NOT IN GROUP LIST">Խմբերի ցուցակում չէ</option>
                                            <option value="LIKE">Պարունակում է</option>
                                        </select></td>
                                    <td><input type="text" name="dec_condition_second_and_or[]"  class="form-control select_item_second item_`+jQuery('.cond-second tr').length+`" data-id="`+jQuery('.cond-second tr').length+`" placeholder="Ընտրել          ..."></td>
                                </tr>`);
    });

    function deleteThis(name_){
        jQuery('#addnew .modal-body>div').hide();
        jQuery('#addnew .modal-body>form').hide();
        jQuery('#confirm').removeClass('hide').show();
        jQuery('.modal-header').hide();
        jQuery('#confirm').append(`<div class="text-center">
                       <button type="button" class="btn " onclick="deleteThisEl('`+name_+`')" value="true">Այո</button>
                       <button type="button" class="btn btn-succ" onclick="cancelDel('`+name_+`')" value="true">Ոչ</button>
                   </div>`);
        jQuery('#addnew').css('margin-top','12%');

    }
    function editeThis(elem){
        var tt = jQuery('#it'+elem);
        var el = tt.clone(true);
        tt.remove();
         el.removeClass('hide');
        jQuery('.modal-header').hide();
        jQuery('#addnew form').addClass('hide');
        jQuery('.editeType').removeClass('hide').show().html(el);
    }
    function deleteThisEl(name_){
        jQuery('#it'+name_).remove();
        jQuery('#tr'+name_).remove();
        jQuery('#addnew form').removeClass('hide').show();
        jQuery('#confirm').addClass('hide');
        jQuery('.modal-header').show();
        jQuery('#addnew').css('margin-top','0px');
    }
    function cancelDel(name_){
        jQuery('#addnew form').removeClass('hide').show();
        jQuery('#confirm').addClass('hide');
        jQuery('.modal-header').show();
        jQuery('#addnew').css('margin-top','0px');
    }
    jQuery('.condition_type').on('change',function(){
        if(jQuery(this).val()== 1){
            jQuery('.interval').removeClass('hide');
        } else {
            jQuery('.interval').addClass('hide');
        }
    });
    jQuery('body').on('click','.add-discount-condition',function(){
        jQuery('.conditions_page .first').remove();
        var _form = jQuery('.addType').clone(true, true).removeClass('addType');
        var inps = jQuery('.addType').find('input,select');
        var nm = jQuery('#home-tb .condition_name').val();
        inps.each(function (){
            jQuery(this).val("");
        });

        var count_ = jQuery('.conditions_page tr').length;
        _form.find('.nav').replaceWith(`<ul class="nav nav-tabs" role="tablist">
                         <li class="nav-item">
                             <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-tb`+count_+`" role="tab" aria-controls="home" aria-selected="true">Հիմնական</a>
                         </li>
                         <li class="nav-item assortment_sec">
                             <a class="nav-link" id="assortment-tab" data-toggle="tab" href="#assortment-tb`+count_+`" role="tab" aria-controls="assortment" aria-selected="false">Տեսականի</a>
                         </li>
                     </ul>`);
        _form.find('#home-tb').attr('id','home-tb'+count_);
        _form.find('#assortment-tb').attr('id','assortment-tb'+count_);
        _form.find('#switch-5').attr('id','switch-5'+count_);
        _form.find('.swtch').attr('for','switch-5'+count_);
        _form.attr('id','it'+nm);
        jQuery('.other_forms').append(_form);
        jQuery('.other_forms').hide();


        jQuery('.conditions_page').append(`<tr id="tr`+nm+`">
                                    <td>`+count_+`</td>
                                    <td>`+nm+`</td>
                                    <td><button type="button" class="btn m-2" onclick="editeThis('`+nm+`')"><img src="/web/images/edite.png" alt=""></button><button type="button" class="btn m-2" onclick="deleteThis('`+nm+`')"><img  src="/web/images/delete.png" alt=""></button></td>
                                </tr>`);
        jQuery('#addnew form').removeClass('hide');
        jQuery('.modal-header').show();
        jQuery('#addnew .addType').addClass('hide');

    });
    jQuery('body').on('click','.btn-add-type',function(){
        jQuery('.modal-header').hide();
        jQuery('#addnew form').addClass('hide');
        jQuery('.addType').removeClass('hide');
    });
    jQuery('body').on('click','.return_t',function(){
        jQuery('#addnew form').removeClass('hide');
        jQuery('.modal-header').show();
        jQuery('#addnew .addType').addClass('hide');
    });
    jQuery('body').on('click','.return_second',function(){
        jQuery('#addnew .addItemSecond').addClass('hide');
        // jQuery('.modal-header').show();
        jQuery('#addnew .addType').removeClass('hide');
    });
    jQuery('#add-discount').click(function(){
       // alert('uxarkvec');
       // return false;
    });

