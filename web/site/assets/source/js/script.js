$('body, .fs-cart-piece-prod-count').keyup(function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
})
let globalSubmitSwitcher = false;
let orderGlobalSubmit = false;
$('.fs-cart-wrapper').submit(function(e) {
    if (globalSubmitSwitcher === false) {
        e.preventDefault();
    }
});
$('#state_change_accept').submit(function(e) {
    if (orderGlobalSubmit === false) {
        e.preventDefault();
    }
});
$(document).on('click', '.allow', function() {
    orderGlobalSubmit = true;
    $('#state_change_accept').submit();
});
$('.fs-search-input,.search-m').on('focus',function(){
    $(this).keyup();
});
// Search Panel -- Start
let searchInput = document.querySelector('.fs-search-input');
let searchMobile = document.querySelector('.search-m');
let searchResultBlock = document.querySelector('.fs-search-result-wrapper');
let searchResultBlockMobile = document.querySelector('.fs-mobile-search-result-block-wrapper');
let searchOverlay = document.querySelector('.fs-search-result-overlay');
searchInput.onkeyup = function() {
    let searchInputText = this.value;
    if (searchInputText.length >= 3) {
        searchProduct(searchInputText);
    } else {
        searchResultBlock.classList.remove('active');
    }
}
searchMobile.onkeyup = function() {
    let searchInputText = this.value;
    if (searchInputText.length >= 3) {
        searchProductM(searchInputText);
    } else {
        searchResultBlockMobile.classList.remove('active');
    }
}
searchOverlay.onclick = function() {
    searchResultBlock.classList.remove('active');
}
// Search Panel -- End
// Home Page Pagination
let paginationBlock = document.getElementsByClassName('fs-home-page-navigation')[0];
let sectionList = ['fs-weekly-supplier', 'fs-hot-offer-section', 'fs-last-viewed-section'];

function isScrolledIntoView(el) {
    let rect = el.getBoundingClientRect();
    let elemTop = rect.top;
    let elemBottom = rect.bottom;
    let isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
    return isVisible;
}
window.onload = function() {
    $(window).scroll(function() {
        let sections = document.getElementsByClassName('fs-main-section-el');
        let top = window.scrollY;
        let checkPoint = window.innerHeight - 300;
        let point = 0;
        for (let i = 0; i < sections.length; i++) {
            let topPos = sections[i].getBoundingClientRect().top;
            if (topPos < checkPoint) {
                point = i;
            }
        }
        switch (point) {
            case 0:
                $('a[href="#weekly"]').addClass('active');
                $('a[href="#hot"]').removeClass('active');
                $('a[href="#last"]').removeClass('active');
                break;
            case 1:
                $('a[href="#weekly"]').removeClass('active');
                $('a[href="#hot"]').addClass('active');
                $('a[href="#last"]').removeClass('active');
                break;
            case 2:
                $('a[href="#weekly"]').removeClass('active');
                $('a[href="#hot"]').removeClass('active');
                $('a[href="#last"]').addClass('active');
                break;
            default:
                break;
        }
    }).trigger('scroll');
}
if (paginationBlock !== undefined) {
    document.getElementsByTagName('body')[0].onscroll = function() {
        if (window.scrollY > 200) {
            paginationBlock.classList.add('active');
        } else {
            paginationBlock.classList.remove('active');
        }
    }
}
//Burger menu open
let burgerButton = document.getElementsByClassName('fs-nav-burger')[0];
if (burgerButton) {
    burgerButton.onclick = () => {
        let burgerMenu = document.getElementsByClassName('fs-hidden-menu')[0];
        burgerMenu.classList.add('active');
    }
}
let hiddenMenuOverlay = document.getElementsByClassName('fs-hidden-menu')[0];
if (hiddenMenuOverlay) {
    hiddenMenuOverlay.onclick = () => {
        let burgerMenu = document.getElementsByClassName('fs-hidden-menu')[0];
        burgerMenu.classList.remove('active');
    }
    document.getElementsByClassName('fs-hidden-menu-inner')[0].onclick = (e) => {
        e.stopPropagation();
    }
}
//Sliders -- Start
//Hero Slider
$('.fs-hero-slider').owlCarousel({
    loop: true,
    margin: 0,
    dots: true,
    nav: false,
    items: 1,
    smartSpeed: 1600
})
//Header Category Slider
$('.fs-category-row-list').owlCarousel({
    loop: false,
    margin: 0,
    dots: false,
    nav: true,
    items: 4,
    autoWidth: true
})
//Single Product Slider
$('.fs-single-min-thumbnail-list').owlCarousel({
    loop: false,
    margin: 0,
    responsive: {
        0: {
            items: 1,
            margin: 0,
            nav: false,
            dots: true,
            mouseDrag: true,
            touchDrag: true
        },
        501: {
            items: 3,
            margin: 0,
            nav: false,
            dots: true,
            mouseDrag: true,
            touchDrag: true
        },
        769: {
            items: 3,
            margin: 0,
            nav: true,
            dots: false,
            mouseDrag: false,
            touchDrag: false
        },
        1025: {
            items: 4,
            margin: 0,
            nav: true,
            dots: false,
            mouseDrag: false,
            touchDrag: false
        }
    },
})
//Fast View Product Slider
$('.fs-product-fast-view-min-thumbnail-list').owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    items: 4,
})
$(document).ready(function() { //Product Slider
    $('.fs-product-slider').owlCarousel({
        loop: false,
        dots: true,
        nav: false,
        responsive: {
            0: {
                items: 2,
                margin: 12
            },
            501: {
                items: 3,
                margin: 24
            },
            769: {
                items: 4,
                margin: 24
            },
            1025: {
                items: 6,
                margin: 24
            }
        }
    })
});
//Per Fav Slider
$('.fs-per-fav-slider').owlCarousel({
    loop: false,
    dots: true,
    nav: true,
    responsive: {
        0: {
            items: 1,
            margin: 12
        },
        501: {
            items: 2,
            margin: 24
        },
        769: {
            items: 3,
            margin: 24
        },
        1025: {
            items: 4,
            margin: 24
        }
    }
})
//Weekly Slider
$('.fs-weekly-supplier-slider').owlCarousel({
    loop: false,
    dots: true,
    nav: false,
    autoHeight: true,
    responsive: {
        0: {
            items: 2,
            margin: 12
        },
        501: {
            items: 2,
            margin: 24
        },
        769: {
            items: 3,
            margin: 24
        },
        1025: {
            items: 6,
            margin: 24
        }
    }
})
//Categories Slider
let catSlider = $('.fs-categories-slider');
let switcher = false;
$(window).resize(function() {
    if ($(window).width() < 1025) {
        if (switcher === false) {
            catSlider.trigger('destroy.owl.carousel');
        }
        switcher = true;
    } else {
        if (switcher === false) {
            catSlider.owlCarousel({
                loop: false,
                margin: 24,
                dots: false,
                nav: true,
                items: 4
            })
        }
        switcher = false;
    }
}).trigger('resize');
//Providers Slider
$('.changeTemplate').on('click',function(){


        let ids = [];
        let count = [];
        $.each($('.fs-count-calc-block'), function(i, e) {
                ids.push($(this).find('.c_id').val());
                count.push($(this).find('.fs-count-calc-num').val());
        });

        $.post("/site/update-ws", {
            data: ids,
            count: count,
        }).done(function(data) {
            location.reload();
        });
});
$('.fs-provider-list').owlCarousel({
    loop: true,
    dots: false,
    nav: false,
    autoplay: true,
    responsive: {
        0: {
            items: 2,
            margin: 12,
        },
        501: {
            items: 4,
            margin: 24,
        },
        769: {
            items: 6,
            margin: 24,
        },
        1025: {
            items: 8,
            margin: 24,
        },
        1441: {
            items: 11,
            margin: 24,
        }
    }
})
//Sliders -- End
//Range
// fs-filter-range-slider
// if($(".fs-filter-range-slider").length > 0) {
//     $(".fs-filter-range-slider").ionRangeSlider();
// }
let _sliderInputNum = $('.fs-all-companies-filter-element .fs-filter-range-inputs input');
let _sliderInputNumFrom = $('.fs-all-companies-filter-element .fs-filter-range-inputs input[data-target="from"]');
let _sliderInputNumTo = $('.fs-all-companies-filter-element .fs-filter-range-inputs input[data-target="to"]');
// if(_sliderInputNum.length > 0) {
//     for(let i = 0; i < _sliderInputNum.length; i++) {
//         _sliderInputNum.eq(i)[0].onkeyup = function () {
//             switch (this.getAttribute('data-target')) {
//                 case 'from':
//                     break;
//                 case 'to':
//                     break;
//             }
//         }
//     }
// }
_sliderInputNum.keyup(function(e) {
    let _sliderInputNumFrom = $('.fs-all-companies-filter-element .fs-filter-range-inputs input[data-target="from"]');
    let _sliderInputNumTo = $('.fs-all-companies-filter-element .fs-filter-range-inputs input[data-target="to"]');
    let _numFrom = parseInt(_sliderInputNumFrom.val());
    let _numTo = parseInt(_sliderInputNumTo.val());
    if (_numFrom <= _numTo) {} else {
        e.preventDefault();
    }
});
//Filter
$(document).on('click', '.fs-filter-mobile-button', function() {
    $('.fs-all-companies-filter-block').addClass('active');
    $('.fs-main-content').addClass('no-limit');
});
$(document).on('click', '.fs-filter-header', function() {
    $('.fs-all-companies-filter-block').removeClass('active');
    $('.fs-main-content').removeClass('no-limit');
});
let input = document.getElementsByClassName("fs-tel-international");
if (input.length > 0) {
    for (let i = 0; i < input.length; i++) {
        window.intlTelInput(input[i], ({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "polite",
            dropdownContainer: null,
            excludeCountries: [],
            formatOnDisplay: true,
            geoIpLookup: null,
            hiddenInput: "full",
            initialCountry: "",
            localizedCountries: null,
            nationalMode: true,
            onlyCountries: [],
            placeholderNumberType: "FIXED_LINE",
            preferredCountries: ["am", "ru"],
            separateDialCode: false,
            utilsScript: ""
        }));
    }
}
// Category Dropdown
let dropdownTrigger = $('.fs-multi-dropdown-selected-variants');
dropdownTrigger.click(function() {
    $(this).closest('.fs-multi-dropdown').toggleClass('active');
});
$('body').click(function() {
    if ($('.fs-multi-dropdown').length > 0) {
        $('.fs-multi-dropdown').removeClass('active');
    }
});
$('.fs-multi-dropdown').click(function(e) {
    e.stopPropagation();
});
$('.fs-multi-dropdown-list-el').click(function() {
    let itemValue = $(this).attr('data-value');
    let itemText = $(this).text();
    let dropdown = $(this).closest('.fs-multi-dropdown');
    let targetArea = dropdown.find('.fs-multi-dropdown-selected-variants');
    let itemCount = targetArea.find('.fs-multi-dropdown-selected-variant').length;
    let inputField = dropdown.find('input[type="hidden"]');
    $(this).addClass('selected');
    if (itemCount === 0) {
        targetArea.removeClass('empty');
    }
    $()
    targetArea.prepend('<div class="fs-multi-dropdown-selected-variant" data-selected-value="' + itemValue + '">' + itemText + '<button type="button" class="fs-icon-close fs-remove-selected-el"></button></div>');
    inputField.val(inputField.val() + itemValue + ";");
});
$(document).on('mousedown', '.fs-remove-selected-el', function(e) {
    e.stopPropagation();
    let catElement = $(this).closest('.fs-multi-dropdown-selected-variant');
    let dropdown = $(this).closest('.fs-multi-dropdown');
    let targetArea = dropdown.find('.fs-multi-dropdown-selected-variants');
    let itemCount = targetArea.find('.fs-multi-dropdown-selected-variant').length;
    let index = catElement.attr('data-selected-value');
    let hiddenInput = dropdown.find('input[type="hidden"]');
    hiddenInput = hiddenInput.val().split(';');
    for (let i = 0; i < hiddenInput.length; i++) {
        if (hiddenInput[i] === index) {
            hiddenInput.splice(i, 1);
        }
    }
    hiddenInput = hiddenInput.join(';');
    dropdown.find('input[type="hidden"]').val(hiddenInput);
    dropdown.find('.fs-multi-dropdown-list-el[data-value="' + index + '"]').removeClass('selected');
    catElement.remove();
    if (itemCount === 1) {
        targetArea.addClass('empty');
    }
});
// let dropdownHeight = 140; // estimate/calculate the dropdown list's height manually
// $(window).scroll(function() {
//     if ($(window).height() - $('.row-' + row).position().top < dropdownHeight) {
//         console.log('up');
//     } else {
//         console.log('down');
//     }
// });
$('.fs-personal-tab-button').click(function() {
    let index = $(this).attr('data-index');
    $('.fs-personal-tab-button').removeClass('active');
    $(this).addClass('active');
    $('.fs-personal-page-tab-result').removeClass('active');
    $('.fs-personal-page-tab-result[data-index="' + index + '"]').addClass('active');
});
$('.fs-lang-list-item a').mousedown(function() {
    window.location.href = $(this).attr('href');
})
$('.fs-action-button[data-role="authorization"]').click(function(e) {
    e.stopPropagation();
    $('.fs-authorization-popover').show();
    $('.fs-profile-popover-window').show();
    $('.fs-action-button .fs-icon-bell').removeClass('active');
    $('.fs-notification-window').hide();
});
$('body').click(function() {
    $('.fs-authorization-popover').hide();
    $('.fs-profile-popover-window').hide();
});
$('.fs-authorization-popover').click(function(e) {
    e.stopPropagation();
});
$('.fs-profile-popover-window').click(function(e) {
    e.stopPropagation();
});
$('.fs-action-button .fs-icon-bell').click(function(e) {
    e.stopPropagation();
    if ($(this).hasClass('active')) {
        $('.fs-notification-window').hide();
         $('.fs-authorization-popover').hide();
    $('.fs-profile-popover-window').hide();
        $(this).removeClass('active');
    } else {
        $('.fs-notification-window').show();
         $('.fs-authorization-popover').hide();
    $('.fs-profile-popover-window').hide();
        $(this).addClass('active');
    }
});
$('.pagination-arrow').click(function() {
    const urlParams = new URLSearchParams(window.location.search);
    let page = $(this).data('page');
    if (page != 1) {
        urlParams.set('page', page);
    } else {
        urlParams.delete('page');
    }
    window.location.search = urlParams;
})
$('#search_fav').keyup(function() {
    /*takes inpt from input box*/
    var seterm = $('#search_fav').val();
    /*scans through each element*/
    for (var i = 0; i < $('.fs-product-name').length; i++) {
        /*Makes all elements visible*/
        $('.fs-product-name:eq(' + i + ')').closest('.fs-product-card').css('display', 'inline-block');
        /*If it doesn't match the input it is hidden*/
        if ($('.fs-product-name:eq(' + i + ')').text().toLowerCase().indexOf(seterm) < 0) {
            $('.fs-product-name:eq(' + i + ')').closest('.fs-product-card').css('display', 'none');
        }
    }
});
$('body').click(function() {
    $('.fs-notification-window').hide();
    $('.fs-action-button .fs-icon-bell').removeClass('active');
});
$('.fs-notification-window').click(function(e) {
    e.stopPropagation();
});
$('.fs-single-min-thumbnail').click(function() {
    let target = $('.fs-single-product-main-image img');
    $('.fs-single-min-thumbnail').removeClass('active');
    $(this).addClass('active');
    target.attr('src', ($(this).find('img').attr('src')));
    imageZoom("myimage", "myresult");
});
$('.corporateCat').change(function() {
    var url = '/site/corporate/';
    var l = 0;
    var s = '?';
    $('.corporateCat').each(function() {
        if ($(this).is(':checked')) {
            l++;
            url += s + 'category_id[]=' + $(this).val();
            if (l == 1) {
                s = '&';
            }
        }
    });
    window.location.href = url;
})
$('.filter_company').change(function() {
    var cur_val = $(this).val();
    if ($('#company-list-filter-buy-chk').prop('checked') === false && $('#company-list-filter-sel-chk').prop('checked') === false) {
        $(".fs-all-companies-grid-el").hide();
    }
    if (this.checked) {
        $("." + cur_val).each(function(index) {
            $(this).show();
        });
    } else {
        $("." + cur_val).each(function(index) {
            if (cur_val === 'company-list-filter-buy' && $(this).hasClass("company-list-filter-sel") !== true) {
                $(this).hide();
            }
            if (cur_val === 'company-list-filter-sel' && $(this).hasClass("company-list-filter-buy") !== true) {
                $(this).hide();
            }
        });
    }
});
$('.fs-calc-block button').click(function() {
    let role = $(this).attr('data-action');
    let currentNum = parseInt($(this).closest('.fs-calc-block').find('.fs-calc-field').val());
    switch (role) {
        case 'minus':
            if (currentNum === 1) {
                currentNum = 1;
            } else {
                currentNum--;
            }
            break;
        case 'plus':
            currentNum++
            break;
        default:
    }
    $(this).closest('.fs-calc-block').find('.fs-calc-field').val(currentNum);
});
let tableAllCheck = $('.fs-personal-order-table-head-row input');
for (let i = 0; i < tableAllCheck.length; i++) {
    tableAllCheck.eq(i)[0].addEventListener('change', (event) => {
        let bodyCheckboxes = $('.fs-personal-order-table-body-row input');
        if (event.currentTarget.checked) {
            bodyCheckboxes.prop('checked', true);
        } else {
            bodyCheckboxes.prop('checked', false);
        }
    })
}

function removeDynamicData() {
    let dynamicData = $('.removable-dynamic-data');
    for (let i = 0; i < dynamicData.length; i++) {
        dynamicData.eq(i).text('─');
    }
    $('.fs-cart-supplier-submit-button').addClass('active');
}

function removeProduct(prodArr) {
    let form = $('#remove-from-cart');
    form.find('input').val(prodArr);
    form.submit();
}

function changeProdCount(prodArr) {
    let form = $('#changed-cart-data');
    form.find('input').val(prodArr);
    form.submit();
}
// $('.fs-cart-product-remove').click(function (){
//     let productId = $(this).closest('.fs-cart-supplier-row').attr('data-id');
//     let prodArr = [productId];
//
//     removeProduct(prodArr);
// });
// $('.fs-cart-hard-prod-calc-block button').click(function () {
//     let action = $(this).attr('data-action');
//     let calcNum = parseInt($(this).closest('.fs-cart-piece-prod-calc-block').find('.fs-cart-piece-prod-count').text());
//     let productId = $(this).closest('.fs-cart-supplier-row').attr('data-id');
//
//     switch (action) {
//         case 'plus':
//             calcNum++;
//             break;
//         case 'minus':
//             if (calcNum === 1) {
//                 calcNum = 1;
//             } else {
//                 calcNum--;
//             }
//             break;
//     }
//
//     $(this).closest('.fs-cart-piece-prod-calc-block').find('.fs-cart-piece-prod-count').text(calcNum);
//
//     // changedCartRow(productId, calcNum);
// });
// Cart Page Scripts -- End
$('#TAX').on('change', function() {
    var val_ = $(this).val();
    $.ajax({
        url: "/site/checkhvhh?hvhh=" + val_,
        success: function(result) {
            if (result >= 1) {
                $('#TAX').closest('.checking-input').addClass('error').attr('data-error', 'Նման հվհհ ով օգտատեր գրանցված է համակարգում')
            }
            //   fs-authorization-submit
        }
    });
});
$('#PARENT_TAX').on('change', function() {
    var val_ = $(this).val();
    $.ajax({
        url: "/site/checkhvhh?hvhh=" + val_,
        success: function(result) {
            if (result >= 1) {
                $('#PARENT_TAX').closest('.checking-input').addClass('error').attr('data-error', 'Նման հվհհ ով օգտատեր գրանցված է համակարգում')
            }
            //   fs-authorization-submit
        }
    });
});
$('.mail-input').on('change', function() {
    var val_ = $(this).val();
    $.ajax({
        url: "/site/checkmail?mail=" + val_,
        success: function(result) {
            if (result >= 1) {
                $('.mail-input').closest('.checking-input').addClass('error').attr('data-error', 'Նման Էլեկտրոնային հասցե ով օգտատեր գրանցված է համակարգում')
            }
            //   fs-authorization-submit
        }
    });
});
function maxLengthCheck(object, e) {
    if (object.value.length > object.maxLength) {
        object.value = object.value.slice(0, object.maxLength);
    }
}

function isNumeric(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}
let checkboxSwitcher;
$('#ISWORKSAME').change(function() {
    let firstInput = $('#ADDRTEXT');
    let secondInput = $('#WORKADDRTEXT');
    checkboxSwitcher = $(this).prop('checked') === true;
    if (checkboxSwitcher === true) {
        if (firstInput.val() !== '') {
            secondInput.val(firstInput.val());
            secondInput.closest('.checking-input').removeClass('empty');
            secondInput.closest('.checking-input').addClass('done');
        } else if (secondInput.val() !== '') {
            firstInput.val(secondInput.val());
            firstInput.closest('.checking-input').removeClass('empty');
            firstInput.closest('.checking-input').addClass('done');
        }
    } else {
        secondInput.val('');
    }
    if (firstInput.val() === '') {
        firstInput.closest('.checking-input').removeClass('done');
        firstInput.closest('.checking-input').addClass('empty');
    }
    if (secondInput.val() === '') {
        secondInput.closest('.checking-input').removeClass('done');
        secondInput.closest('.checking-input').addClass('empty');
    }
});
$('#ADDRTEXT').keyup(function() {
    if (checkboxSwitcher === true) {
        $('#WORKADDRTEXT').val($(this).val());
    }
});
$('#WORKADDRTEXT').keyup(function() {
    if (checkboxSwitcher === true) {
        $('#ADDRTEXT').val($(this).val())
    }
});
$('.fs-notification-tab').click(function() {
    let index = $(this).attr('data-index');
    $('.fs-notification-tab').removeClass('active');
    $(this).addClass('active');
    $('.fs-notification-list-wrapper').removeClass('active');
    $('.fs-notification-list-wrapper[data-index="' + index + '"]').addClass('active');
});
$('.fs-single-product-to-fav, .fs-product-add-to-fav').click(function() {
    let currentFavCount;
    let rearFavCount;
    let action;
    if ($('.header-favorite-button').attr('data-fav-count') === '') {
        currentFavCount = 0;
    } else {
        currentFavCount = parseInt($('.header-favorite-button').attr('data-fav-count'));
    }
    if ($(this).hasClass('active')) {
        currentFavCount--;
        action = 'remove';
        rearFavCount = currentFavCount;
        // debugger;
        if (currentFavCount === 0) currentFavCount = '0';
        if (currentFavCount === 0) rearFavCount = 0;
        if (rearFavCount === 9) currentFavCount = 9;
        $(this).removeClass('active');
    } else {
        currentFavCount++;
        action = 'add';
        rearFavCount = currentFavCount;
        if (currentFavCount > 9) currentFavCount = '+9';
        $(this).addClass('active');
    }
    $('.header-favorite-button').attr('data-fav-count', currentFavCount);
    $('.header-favorite-button').attr('title', rearFavCount);
    let pId;
    if ($(this).hasClass('fs-single-product-to-fav')) {
        pId = $(this).data('prodid');
    } else {
        pId = $(this).closest('.fs-product-card').find('.fs-open-prod-window').data('prodid');
    }
    $.post("/site/change-wishlist", {
        product_id: pId,
        action: action
    }).done(function(data) {});
    //
    // location.reload();
});


function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#company-logo').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$('.fs-as-read').click(function() {
    let notificationEl = $('.fs-notification-list-el.new-notification');
    let notificationArr = [];
    for (let i = 0; i < notificationEl.length; i++) {
        if (notificationEl.eq(i).find('input').prop('checked') === true) {
            notificationArr.push(notificationEl.eq(i).attr('data-id'));
        }
    }
    $.post("/site/mark-as-read", {
        notificationList: notificationArr,
    }).done(function(data) {
        var ct = $('.has-notification').attr('data-fav-count');
        ct = ct - notificationArr.length;
        $('.has-notification').attr('data-fav-count',ct);
        for (let i = 0; i < notificationArr.length; i++) {
            $('.fs-notification-list-el.new-notification[data-id="' + notificationArr[i] + '"]').remove();
        }
    });
});
$('.fs-show-unread').click(function() {
    $.post("/site/unread-nots", {
        get_unread_notifications: 'get_unread_notifications',
        mode: $('.fs-notification-list-wrapper.active .fs-notification-list').data('back')
    }).done(function(data) {
        if (data) {
            if (data === 'empty') {
                $('.fs-action-button').removeClass('has-notification');
                $('.fs-notification-list-wrapper.active').append("<div class=\"fs-notification-window-empty\">\n" +
                    "                                        <i class=\"fs-icon-bell\"></i>\n" +
                    "                                        <span>Դուք չունեք ծանուցումներ</span>\n" +
                    "                                    </div>");
                $('.fs-notification-list-wrapper.active .fs-notification-list').hide();
            } else {
                let dataArr = jQuery.parseJSON(data);
                let target = $('.fs-notification-list-wrapper.active .fs-notification-list');
                for (let i = 0; i < dataArr.length; i++) {
                    if (i === 0) {
                        target.html('');
                    }
                    console.log( dataArr[i]);
                    target.append(`<li class="fs-notification-list-el new-notification" data-id="` + dataArr[i].id + `">
                                                        <label class="fs-notification-check">
                                                            <input type="checkbox" />
                                                            <span class="fs-notification-check-imitation"></span>
                                                        </label>
                                                       <a href="` + dataArr[i].url + `" class="fs-notification-link">
                                                            <div class="fs-notification-thumbnail">
                                                                <img src="` + dataArr[i].image + `" alt="" />
                                                            </div>
                                                            <div class="fs-notification-data"><h4><strong>` + dataArr[i].legal_name
                        +`</strong> ` + dataArr[i].message + `</h4><time class="fs-notification-date">
                          ` + dataArr[i].created_at + `</time></div></a></li>`);
                }
            }
        } else {}
    });
});

$('.fs-single-prod-dynamic-data-toggle button').click(function() {
    if ($(this).hasClass('open')) {
        $(this).removeClass('open').addClass('close');
    } else {
        $(this).removeClass('close').addClass('open');
    }
});
$('.fs-authorization-modal-close').click(function() {
    $(this).closest('.fs-authorization-modal').removeClass('active');
});
let draggableTableSwitcher = false;
let currentTop = 0;
let currentLeft = 0;
let mouseTop = 0;
let mouseLeft = 0;
let scrollL = 0;
$('.draggable-table').mousedown(function() {
    // $(this).addClass('moving');
    draggableTableSwitcher = true;
    currentTop = $(this).closest('.draggable-table-wrapper').scrollTop();
    currentLeft = $(this).closest('.draggable-table-wrapper').scrollLeft();
});
$('.draggable-table').mouseup(function() {
    draggableTableSwitcher = false;
});
// $('.draggable-table').mouseout(function () {
//     draggableTableSwitcher = false;
// });
$('.draggable-table').mousemove(function(e) {
    if (draggableTableSwitcher === true) {
        let xCoordinate = e.pageX;
        let yCoordinate = e.pageY;
        let leftScrollPos = (xCoordinate - mouseLeft) * -1;
        $(this).closest('.draggable-table-wrapper').scrollLeft(scrollL + leftScrollPos);
        // console.log($(this).closest('.draggable-table-wrapper').scrollLeft() + leftScrollPos);
    } else {
        mouseTop = e.pageY;
        mouseLeft = e.pageX;
        scrollL = $(this).closest('.draggable-table-wrapper').scrollLeft();
    }
});
$(function() {
    if ($('.fs-cart-offer-date-number').length > 0) {
        $(".fs-cart-offer-date-number").datepicker();
    }
});
$('.fs-cart-mark-all input').change(function() {
    if ($(this).prop('checked') === true) {
        $('.fs-cart-supplier-select-block input').prop('checked', true);
        $('.fs-cart-supplier-row-select-block input').prop('checked', true);
    } else {
        $('.fs-cart-supplier-select-block input').prop('checked', false);
        $('.fs-cart-supplier-row-select-block input').prop('checked', false);
    }
});
$('.fs-cart-wrapper .fs-cart-supplier-row-select-block input[type="checkbox"], .fs-cart-wrapper .fs-cart-mark-all input[type="checkbox"]').change(function() {
    let allInputs = $('.fs-cart-wrapper input[type="checkbox"]');
    let switcher = false;
    for (let i = 0; i < allInputs.length; i++) {
        if (allInputs.eq(i).prop('checked') === true) {
            switcher = true
        }
    }
    if (switcher === true) {
        $('.fs-cart-empty-button').addClass('active');
    } else {
        $('.fs-cart-empty-button').removeClass('active');
    }
});
$('.fs-cart-supplier-select-block input').change(function() {
    let supplierBlock = $(this).closest('.fs-cart-supplier-block');
    let supplierRows = supplierBlock.find('.fs-cart-supplier-row');
    for (let i = 0; i < supplierRows.length; i++) {
        supplierRows.eq(i).find('input').prop('checked', true);
    }
});
$('.fs-cart-supplier-row-select-block input').change(function() {
    $(this).closest('.fs-cart-supplier-block').find('.fs-cart-supplier-select-block input').prop('checked', false);
    $('.fs-cart-mark-all input').prop('checked', false);
});

$('.fs-cart-piece-prod-count').blur(function() {
    let ppid = parseInt($(this).data('ppid'));
    changeCountOfCorz(ppid, 'change');
});
if ($('.fs-set-date-to').length > 0) {

    let dateFormat = "dd/mm/yy",

        from = $(".fs-set-date-from")
            .datepicker({language:'hy'})
            .on("change", function() {
                to.datepicker("option", "minDate", getDate(this));
            }),
        to = $(".fs-set-date-to").datepicker({language:'hy'})
            .on("change", function() {
                from.datepicker("option", "maxDate", getDate(this));
            });

    function getDate(element) {
        let date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }
        return date;
    }
}
$('.fs-datepicker-trigger').click(function(e) {
    e.stopPropagation();
    $('.fs-double-datepicker-body').addClass('active');
});
$('body').click(function() {
    $('.fs-double-datepicker-body').removeClass('active');
});
$('.fs-double-datepicker-body').click(function(e) {
    e.stopPropagation();
});
$('.fs-set-date-block button[data-action="reset"]').click(function() {
    $('.fs-set-date-from').val('');
    $('.fs-set-date-to').val('');
    let form_to_s = $(this).data('fform');
    $('.fs-double-datepicker-body').removeClass('active');
    $('.fs-datepicker-trigger').text('Ըստ ժամանակահատվածի');
    $("#" + form_to_s).submit();
})
$('.fs-set-date-block button[data-action="filter"]').click(function() {
    let fromInput = $('.fs-set-date-from');
    let toInput = $('.fs-set-date-to');
    let form_to_s = $(this).data('fform');
    if (fromInput.val() !== '' && toInput.val() !== '') {
        $('.fs-double-datepicker-body').removeClass('active');
        $('.fs-datepicker-trigger').text(fromInput.val() + ' - ' + toInput.val());
    }
    $("#" + form_to_s).submit();
});
// function detectElementPosition(elem) {
//     let position = elem[0].getBoundingClientRect();
//
//     if(position.top < window.innerHeight) {
//         let id = elem[0].getAttribute("id");
//         $('.fs-home-page-navigation').find('a').removeClass('active');
//         $('.fs-home-page-navigation').find('a[href="#' + id + '"]').addClass('active');
//     }
// }
let elemList = [$('#last'), $('#weekly'), $('#hot')];

function testInView($el) {
    let wTop = $(window).scrollTop();
    let wBot = wTop + $(window).height();
    let eTop = $el.offset().top;
    let eBot = eTop + $el.height();
    return ((eBot <= wBot) && (eTop >= wTop));
}

function setInView() {
    $('.fs-main-section-el').each(function() {
        let $zis = $(this);
        $zis.removeClass("inview");
        if (testInView($zis)) {
            $zis.addClass("inview");
        }
    });
}
$(document).scroll(function() {
    setInView();
});
$(document).resize(function() {
    setInView();
});
$(document).ready(function() {
    setInView();
});

function num(n) {
    n = parseInt(n);
    n += "";
    n = new Array(4 - n.length % 3).join("U") + n;
    return n.replace(/([0-9U]{3})/g, "$1 ").replace(/U/g, "");
}

function productCalculating() {
    let countingFieldsDataList = [$('.fs-single-prod-dynamic-data-input.width').val(), $('.fs-single-prod-dynamic-data-input.length').val(), $('.fs-single-prod-calc-block-inner .fs-calc-field').val()];
    let singleProdPrice = parseInt($('.fs-single-product-current-price').attr('data-price'));
    let switcher = true;
    let targetForNum = $('.fs-single-prod-dynamic-result-data');
    let targetForRes = $('.fs-single-prod-result span');
    for (let i = 0; i < countingFieldsDataList.length; i++) {
        if (countingFieldsDataList[i] === '') switcher = false;
    }
    if (switcher === true) {
        targetForNum.text(parseInt(countingFieldsDataList[0]) * parseInt(countingFieldsDataList[1]) * parseInt(countingFieldsDataList[2]).toFixed(2));
        targetForRes.text(num((parseInt(countingFieldsDataList[0]) * parseInt(countingFieldsDataList[1]) * parseInt(countingFieldsDataList[2])) * singleProdPrice));
    }
}

function productSimpleCalculating(prodCount) {
    let productPrice = '';
    let targetForRes = $('.fs-single-prod-result span');
    targetForRes.text(num(prodCount * parseInt($('.fs-single-product-current-price').attr('data-price'))));
}
$(document).on('input', '.calculating-product .fs-single-prod-dynamic-data-input', function() {
    productCalculating();
});
$(document).on('click', '.fs-single-prod-calc-block-inner button', function() {
    let role = $(this).attr('data-action');
    let target = $(this).siblings('.fs-calc-field');
    let count = parseInt(target.val());
    switch (role) {
        case 'minus':
            if (count > 1) count--;
            break;
        case 'plus':
            count++;
            break;
        default:
            break;
    }
    target.val(count);
    target.attr('value', count);
    if ($(this).closest('.fs-single-info-col').hasClass('calculating-product')) {
        productCalculating();
    } else {
        productSimpleCalculating(count);
    }
});
$('.fs-single-prod-calc-block-inner input').blur(function() {
    let count = parseInt($(this).val());
    productSimpleCalculating(count);
});
$('.fs-open-prod-window').click(function() {
    $('#fs-product-fast-view-modal_' + $(this).data('prodid')).addClass('active');
    $('.fs-main-content').addClass('no-transorm');
});
$('.fs-product-fast-view-modal-close').click(function() {
    $('.fs-product-fast-view-modal').removeClass('active');
    $('.fs-main-content').removeClass('no-transorm');
});
$('.fs-product-fast-view-modal').click(function() {
    $(this).removeClass('active');
});
$('.fs-product-fast-view-modal-body').click(function(e) {
    e.stopPropagation();
});
$(document).on('click', '.fs-product-fast-view-min-thumbnail', function(e) {
    e.stopPropagation();
    $('.fs-product-fast-view-min-thumbnail').removeClass('active');
    $(this).addClass('active');
    let image = $(this).find('img').attr('src');
    $('.fs-product-fast-view-main-image-wrapper img').attr('src', image);
});
$('.fs-single-template-prod-block button').click(function() {
    $(this).toggleClass('active');
    if ($(this).hasClass('active')) {
        $(this).siblings('.fs-single-template-prod-info').slideDown();
    } else {
        $(this).siblings('.fs-single-template-prod-info').slideUp();
    }
});
$('.fs-not-registered-prod-modal').click(function() {
    $(this).removeClass('active');
});
$('.fs-not-registered-prod-modal-inner').click(function(e) {
    e.stopPropagation();
});
$('.fs-single-product-submit').click(function() {
    if (!$(this).hasClass('user-authorized')) {
        $('.fs-not-registered-prod-modal').addClass('active');
    }
});
$('.fs-filter-section-title').click(function() {
    if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $(this).siblings('.fs-filter-section-body').slideUp();
    } else {
        $(this).addClass('active');
        $(this).siblings('.fs-filter-section-body').slideDown();
    }
});
// let $range = $("#example_1");
// let $input = $("#example_1_input");
// $(".fs-filter-range-slider-input").ionRangeSlider();

$('.fs-dialog').click(function() {
    $(this).removeClass('active');
});
$('.fs-dialog-body').click(function(e) {
    e.stopPropagation();
});
$('#basket-remove-dialog button').click(function() {
    switch ($(this).attr('data-answere')) {
        case 'yes':
            let allRows = $('.fs-cart-supplier-row');
            let removableArr = [];
            for (let i = 0; i < allRows.length; i++) {
                if (allRows.eq(i).find('input').prop('checked') === true) {
                    removableArr.push(allRows.eq(i).attr('data-id'));
                }
            }
            removableArr = removableArr.join(' ');
            removeProduct(removableArr);
            break;
        case 'no':
            $(this).closest('.fs-dialog').removeClass('active');
            break;
        default:
            break;
    }
});
$('.fs-personal-announced-table-cell.company').click(function(e) {
    e.stopPropagation();
    $('.fs-gift-popup').addClass('active');
});
$('.fs-gift-popup').click(function() {
    $(this).removeClass('active')
});
$('.fs-gift-popup-body').click(function(e) {
    e.stopPropagation();
});
$('.fs-footer-col-title span').click(function() {
    $(this).closest('.fs-footer-col-title').siblings('.fs-footer-col-list').slideToggle();
});
$('.fs-hidden-menu-list-wrapper a button').click(function(e) {
    e.preventDefault();
    let subWrapper = $(this).closest('a').siblings('.fs-hidden-menu-sublist-wrapper'),
        label = $(this).closest('a').text();
    subWrapper.find('.fs-hidden-menu-sublist-back span').text(label);
    subWrapper.css('display', 'block');
});
$('.fs-hidden-menu-sublist-back').click(function() {
    $(this).closest('.fs-hidden-menu-sublist-wrapper').hide();
});
let authInputList = document.getElementsByClassName('inn-input');
for (let i = 0; i < authInputList.length; i++) {
    authInputList[i].oninput = function(e) {
        let value = this.value;
        let reg = new RegExp('^[0-9]*$');
        if (reg.test(value) === false) {
            this.value = '';
        }
    }
}
let formValid = false;
$('.fs-tel-country').click(function(e) {
    $(this).siblings('.fs-tel-code-list').slideDown('fast');
    e.stopPropagation();
});
$('body').click(function() {
    if ($('.fs-tel-code-list').length > 0) {
        $('.fs-tel-code-list').slideUp('fast');
    }
})
if ($('.masked-tel').length > 0) {
    $('.masked-tel').mask('+37400000000');
}
$('.fs-tel-code-li').click(function() {
    let selected_map = $(this).find('img');
    let lang = $(this).attr('data-lang');
    $(this).closest('.fs-tel-code').find('.fs-tel-country img').attr('src', selected_map.attr('src'));
    $(this).closest('.fs-tel-code-list').slideUp('fast');
    switch (lang) {
        case 'arm':
            $(this).closest('.fs-auth-tel').find('.masked-tel').mask('+37400000000');
            $(this).closest('.fs-auth-tel').find('.masked-tel').attr('placeholder', '+374xxxxxxxx');
            break;
        case 'rus':
            $(this).closest('.fs-auth-tel').find('.masked-tel').mask('+70000000000');
            $(this).closest('.fs-auth-tel').find('.masked-tel').attr('placeholder', '+7xxxxxxxxxx');
            break;
        default:
            break;
    }
});
$('.fs-single-prod-dynamic-data-search input').on("change paste keyup", function() {
    let filteringEls = $(this).closest('.fs-single-prod-dynamic-data-list-col').find('.fs-single-prod-dynamic-data-li');
    let filteringText = $(this).val().toLowerCase();
    if ($(this).val() === '') {
        filteringEls.show()
    } else {
        filteringEls.hide();
        for (let i = 0; i < filteringEls.length; i++) {
            if (filteringEls.eq(i).find('a').text().toLowerCase().includes($(this).val())) {
                filteringEls.eq(i).show();
            }
        }
    }
})
// Sign Up Check Code
$('.fs-auth-role input[type="checkbox"]').change(function(e) {
    let checkedRoles = $('.fs-auth-role input[type="checkbox"]');
    let roleCheck = !(checkedRoles.eq(0).prop('checked') === false && checkedRoles.eq(1).prop('checked') === false);
    $('.fs-auth-input-el, .fs-auth-same-block, .fs-auto-select-wrapper, .fs-authorization-policy-row').removeClass('disabled');
    if (roleCheck === false) {
        $(document).scrollTop(0);
        $(this).prop('checked', true);
        $('.fs-sign-in-error-message').slideDown();
        setTimeout(function() {
            $('.fs-sign-in-error-message').slideUp();
        }, 2000);
    }
});
$('#regf').click(function() {
    let roleInputs = $('.fs-auth-role input');
    let switcher = true;
    if (roleInputs.eq(0).prop('checked') === false && roleInputs.eq(1).prop('checked') === false) {
        $('.fs-sign-in-error-message').slideDown();
        setTimeout(function() {
            $('.fs-sign-in-error-message').slideUp();
        }, 2000);
    }
});
$('#regf').submit(function(e) {
    if (checkEmptyFields() === false || checkValidation() === false) {
        if($('.fs-auth-input-el.empty').length>0){
            $([document.documentElement, document.body]).animate({
                scrollTop: $('.fs-auth-input-el.empty').eq(0).offset().top - 100
            }, 240);
        }
        e.preventDefault();
    }
});
$('.fs-auth-role-el').click(function(e) {
    e.stopPropagation();
});

function checkInn(data) {
    return data.length === 8 && new RegExp('^[0-9]+$').test(data);
}

function checkMail(data) {
    return new RegExp('[a-z0-9]+@[a-z0-9]+.[a-z]{2,3}').test(data);
}

function checkPass(data) {
    return new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@_()^$!%*?&+=#])[A-Za-z\\d@_()^$!%*?&+=#]{8,64}$", "g").test(data);
}

function checkCategoryList() {
    let categoryInput = $('.fs-multi-dropdown input');
    if (categoryInput.val() === '') {
        categoryInput.closest('.fs-auto-select-wrapper').addClass('error');
    } else {
        categoryInput.closest('.fs-auto-select-wrapper').removeClass('error');
    }
    return categoryInput.val() !== '';
}
/**/
/**/
/**/
$('.checking-input[data-type="inn"] input').blur(function() {
    let parent = $(this).closest('.checking-input');
    if (checkInn($(this).val()) === false) {
        if ($(this).val() === '') {
            parent.removeClass('done');
            parent.removeClass('error');
            parent.addClass('empty');
        } else {
            parent.removeClass('empty');
            parent.removeClass('done');
            parent.addClass('error');
        }
    } else {
        parent.removeClass('error');
        parent.removeClass('empty');
        parent.addClass('done');
    }
});
$('.checking-input[data-type="regular_name"] input').blur(function() {
    let parent = $(this).closest('.checking-input');
    if ($(this).val() === '') {
        parent.removeClass('done');
        parent.addClass('empty');
    } else {
        parent.removeClass('empty');
        parent.addClass('done');
    }
});
$('.checking-input[data-type="holding_inn"] input').blur(function() {
    let parent = $(this).closest('.checking-input');
    if ($(this).val().length > 0 && checkInn($(this).val()) === false) {
        parent.removeClass('done');
        parent.addClass('error');
    } else {
        parent.removeClass('error');
        parent.addClass('done');
    }
});
$('#ADDRTEXT').blur(function() {
    let parent = $(this).closest('.checking-input');
    if (checkboxSwitcher === true) {
        if ($('#ADDRTEXT').val() === '') {
            $('#ADDRTEXT').closest('.checking-input').removeClass('done');
            $('#ADDRTEXT').closest('.checking-input').addClass('empty');
            $('#WORKADDRTEXT').closest('.checking-input').removeClass('done');
            $('#WORKADDRTEXT').closest('.checking-input').addClass('empty');
        } else {
            $('#ADDRTEXT').closest('.checking-input').removeClass('empty');
            $('#ADDRTEXT').closest('.checking-input').addClass('done');
            $('#WORKADDRTEXT').closest('.checking-input').removeClass('empty');
            $('#WORKADDRTEXT').closest('.checking-input').addClass('done');
        }
    }
});
$('#WORKADDRTEXT').blur(function() {
    let parent = $(this).closest('.checking-input');
    if (checkboxSwitcher === true) {
        if ($('#ADDRTEXT').val() === '') {
            $('#ADDRTEXT').closest('.checking-input').removeClass('done');
            $('#ADDRTEXT').closest('.checking-input').addClass('empty');
            $('#WORKADDRTEXT').closest('.checking-input').removeClass('done');
            $('#WORKADDRTEXT').closest('.checking-input').addClass('empty');
        } else {
            $('#ADDRTEXT').closest('.checking-input').removeClass('empty');
            $('#ADDRTEXT').closest('.checking-input').addClass('done');
            $('#WORKADDRTEXT').closest('.checking-input').removeClass('empty');
            $('#WORKADDRTEXT').closest('.checking-input').addClass('done');
        }
    }
});
$('.checking-input[data-type="email"] input').blur(function() {
    let parent = $(this).closest('.checking-input');
    if (checkMail($(this).val()) === false) {
        if ($(this).val() === '') {
            parent.removeClass('done');
            parent.removeClass('error');
            parent.addClass('empty');
        } else {
            parent.removeClass('empty');
            parent.removeClass('done');
            parent.addClass('error');
        }
    } else {
        parent.removeClass('error');
        parent.removeClass('empty');
        parent.addClass('done');
    }
});
$('.checking-input[data-type="tel"] input').blur(function() {
    let parent = $(this).closest('.checking-input');
    if ($(this).val() === '') {
        parent.removeClass('done');
        parent.removeClass('error');
        parent.addClass('empty');
    } else if ($(this).val().length !== 12) {
        parent.removeClass('empty');
        parent.removeClass('done');
        parent.addClass('error');
    } else {
        parent.removeClass('error');
        parent.removeClass('empty');
        parent.addClass('done');
    }
});
$('.checking-input[data-type="pass"] input').blur(function() {
    let parent = $(this).closest('.checking-input'),
        verifyField = $('.checking-input[data-type="verify_pass"] input');
    if ($(this).val() !== '') {
        if (checkPass($(this).val()) === false) {
            parent.removeClass('empty');
            parent.removeClass('done');
            parent.addClass('error');
        } else {
            parent.removeClass('error');
            parent.removeClass('empty');
            parent.addClass('done');
        }
    } else {
        parent.removeClass('done');
        parent.removeClass('error');
        parent.addClass('empty');
    }
    if (verifyField.val() !== '') {
        if ($(this).val() === verifyField.val()) {
            verifyField.closest('.checking-input').removeClass('error');
            verifyField.closest('.checking-input').removeClass('empty');
            verifyField.closest('.checking-input').addClass('done');
        } else {
            verifyField.closest('.checking-input').removeClass('empty');
            verifyField.closest('.checking-input').removeClass('done');
            verifyField.closest('.checking-input').addClass('error');
        }
    }
});
$('.checking-input[data-type="verify_pass"] input').blur(function() {
    let parent = $(this).closest('.checking-input'),
        passField = $('.checking-input[data-type="pass"] input');
    if ($(this).val() !== '') {
        if ($(this).val() === passField.val()) {
            parent.removeClass('error');
            parent.removeClass('empty');
            parent.addClass('done');
        } else {
            parent.removeClass('empty');
            parent.removeClass('done');
            parent.addClass('error');
        }
    } else {
        parent.removeClass('done');
        parent.removeClass('error');
        parent.addClass('empty');
    }
});

function checkValidation() {
    return $('.error').length === 0;
}

function checkEmptyFields() {
    let inputFields = $('.checking-input.required');
    let policy = $('.fs-authorization-policy-row input');
    let step1 = true,
        step2 = true,
        step3 = true;
    for (let i = 0; i < inputFields.length; i++) {
        if (inputFields.eq(i).find('input').val() === '') {
            inputFields.eq(i).addClass('empty');
            step1 = false;
        }
    }
    if (policy.prop('checked') === false) {
        $('.fs-authorization-policy-row').addClass('error');
        step2 = false;
    } else {
        $('.fs-authorization-policy-row').removeClass('error');
        step2 = true;
    }
    if ($('.fs-multi-dropdown-selected-variants').hasClass('empty')) {
        $('.fs-auto-select-wrapper').addClass('error');
        step3 = false;
    } else {
        $('.fs-auto-select-wrapper').removeClass('error');
        step3 = true;
    }

    return (step1 && step2 && step3) === true;
}
$('.close-welcome-popup, .ok-button').click(function() {
    $('.fs-welcome-popup').hide();
});
$('.fs-mobile-search-btn').click(function() {
    $('.fs-mobile-search-block').addClass('active');
});
$('.fs-close-search-panel').click(function() {
    $('.fs-mobile-search-block').removeClass('active');
});

function generatePartner(data) {
    let partnerTemplate = '<div class="fs-all-companies-grid-el"><img src="./assets/media/images/providers/provider9.jpg" alt=""><div class="fs-all-company-info"><h3>Lոռեմ իպսում</h3><div class="fs-registered-message"><i class="fs-icon-check"></i><span>Գործընկեր</span></div></div></div>';
    return partnerTemplate;
}
$('#partner_list_search input').on("change paste keyup", function() {
    if ($(this).val().length > 2) {
        $.post("http://" + window.location.hostname + "/public/ajax/engine.ajax.php", {
            mode: 'getSearchedPartners'
        }).done(function(data) {
            generatePartner(data);
        });
    }
});
$('.list-show-more-btn button').click(function() {
    let categoryName = $(this).closest('.list-show-more-btn').attr('data-cat');
    let searchString = $('.fs-personal-partners-search-field input').val();
    if ($(this).hasClass('show-more')) {
        $(this).closest('.list-show-more-btn').siblings('.fs-personal-partner-slider').removeClass('less');
        $(this).removeClass('show-more');
        $(this).addClass('show-less');
        $.post("http://" + window.location.hostname + "/public/ajax/engine.ajax.php", {
            mode: 'getFullPartnerList',
            catName: categoryName,
            searchString: searchString
        }).done(function(data) {});
    } else {
        $(this).closest('.list-show-more-btn').siblings('.fs-personal-partner-slider').addClass('less');
        $(this).removeClass('show-less');
        $(this).addClass('show-more');
    }
});
$('.fs-gift-popup-close, .fs-gift-popup').click(function() {
    $('.fs-gift-popup').removeClass('active');
});
$('.fs-gift-popup-body').click(function(e) {
    e.stopPropagation();
});
$('.fs-to-top-button').click(function() {
    $("html, body").animate({
        scrollTop: 0
    }, "slow");
    return false;
});
$('.fs-product-count-btn').click(function() {
    let role = $(this).attr('data-action');
    let countTarget = $(this).siblings('.fs-product-count');
    let countTargetCount = parseInt(countTarget.val());
    switch (role) {
        case 'plus':
            countTargetCount++;
            countTarget.attr('value', countTargetCount);
            break;
        case 'minus':
            countTargetCount--;
            if (countTargetCount < 1) countTargetCount = 1;
            countTarget.attr('value', countTargetCount);
            break;
        default:
            break;
    }
});
$('.fs-product-count').on('change', function(){
    if($(this).val() == 0){
        $(this).val(1);
    }
});
$('.fs-hidden-menu-close-btn').click(function() {
    $(this).closest('.fs-hidden-menu').removeClass('active');
});
$('.fs-product-add-to-cart').click(function() {
    let product = $(this).data('product');
    let price = $(this).attr('data-price');
    let variation = $(this).attr('data-variation');
    var el_ = $(this);
    let count = $(this).closest('.fs-product-card').find('.fs-product-count').val();
    var cart = $('#orderListCountCont');
    var imgtodrag = el_.closest('.fs-product-card').find("img").eq(0);
    // if (imgtodrag) {
    //     var imgclone = imgtodrag.clone()
    //         .offset({
    //             top: imgtodrag.offset().top,
    //             left: imgtodrag.offset().left
    //         })
    //         .css({
    //             'opacity': '0.5',
    //             'position': 'absolute',
    //             'height': '150px',
    //             'width': '150px',
    //             'z-index': '100'
    //         })
    //         .appendTo($('body'))
    //         .animate({
    //             'top': cart.offset().top + 10,
    //             'left': cart.offset().left + 10,
    //             'width': 75,
    //             'height': 75
    //         }, 1000, 'easeInOutExpo');
    //
    //     setTimeout(function () {
    //         cart.effect("shake", {
    //             times: 2
    //         }, 200);
    //     }, 1500);
    //
    //     imgclone.animate({
    //         'width': 0,
    //         'height': 0
    //     });
    // }
    $.post("/site/add-to-cart", {
        product_id: product,
        quantity: count,
        variation_id: variation,
        price: price
    }).done(function(data) {
        $('.fs-added-product-notification').addClass('active');
        $('#orderListCountCont').attr('title', parseInt($('#orderListCountCont').attr('title')) + 1);
        $('#orderListCountCont').attr('data-prod-count', parseInt($('#orderListCountCont').attr('data-prod-count')) + 1);

        setTimeout(function() {
            $('.fs-added-product-notification').removeClass('active');
        }, 1000);
    });
});
$('.fs-category-el').click(function(){
    var class_  = $(this).attr('data-url');
    var els = $('body').find('.'+class_).clone();
    $('.'+class_).remove();
    $('.fs-all-categories-list .fs-container').prepend(els);
});
$('.fs-product-add-to-cart-1').click(function() {
    let product = $(this).data('product');
    let price = $(this).attr('data-price');
    let variation = $(this).attr('data-variation');
    let count = $(this).closest('.fs-single-page-wrapper').find('.fs-product-count').val();

    $.post("/site/add-to-cart", {
        product_id: product,
        quantity: count,
        variation_id: variation,
        price: price
    }).done(function(data) {
        $('.fs-added-product-notification').addClass('active');
        $('#orderListCountCont').attr('title', parseInt($('#orderListCountCont').attr('title')) + 1);
        $('#orderListCountCont').attr('data-prod-count', parseInt($('#orderListCountCont').attr('data-prod-count')) + 1);
        setTimeout(function() {
            $('.fs-added-product-notification').removeClass('active');
        }, 2000);
    });
});
$('.buyerChangeOrder').click(function() {
    let order = $(this).data('order');
    let status = $(this).data('status');
    let price = $(this).data('price');
    $.post("/site/personal-change-order", {
        order_id: order,
        status: status,
        price: price
    }).done(function(data) {
        location.reload();
    });
});
$('.remove-template-item').click(function() {
    let template = $('#removeTemplateID').val();
    let cart = $('#removeCartID').val();
    $.post("/site/personal-delete-template-item", {
        template: template,
        cart: cart,
    }).done(function(data) {
        location.reload();
    });
});
$('.fs-template-to-cart').click(function() {
    let template = $(this).data('template');
    $.post("/site/personal-push-template", {
        template: template,
    }).done(function(data) {
        window.location.href = '/cart';
    });
});

$('.fs-cart-mark-all').click();
$('.fs-cart-supplier-row-checkbox').click(function() {
    let price = parseInt($(this).closest('.fs-cart-supplier-row-inner').find('.fs-cart-product-total-price').text().replace(/\D/g, ''));
    if (window.getComputedStyle($(this)[0], ':after').getPropertyValue('content') != 'none') {
        $('.fs-cart-aside-grand-total-price-span').text(parseInt($('.fs-cart-aside-grand-total-price-span').text()) - price);
    } else {
        $('.fs-cart-aside-grand-total-price-span').text(parseInt($('.fs-cart-aside-grand-total-price-span').text()) + price);
    }
})
$('.fs-cart-supplier-checkbox').click(function() {
    var el_ = $(this);
  
      setTimeout(function(){
        if (el_.prev().prop('checked') === true) {
        el_.closest('.fs-cart-supplier-block').find('.fs-cart-supplier-row-select-block input').prop('checked', true);
       
     } else {
        el_.closest('.fs-cart-supplier-block').find('.fs-cart-supplier-row-select-block input').prop('checked', false);
    }
       Calc__();
    },100);
   
})
$('.fs-cart-mark-imitation').click(function() {
    $('.fs-cart-aside-grand-total-price-span').text(0);
    let price = 0;
    $.each($('.fs-cart-supplier-stock-total-price'), function(i, e) {
        price += parseInt($(e).text().replace(/\D/g, ''));
    });
    $('.fs-cart-aside-grand-total-price-span').text(price);
})
$(document).on('click', '.fs-cart-aside-grand-total-submit-btn', function() {
    $.post("/site/clone-order", {
        order_id: $(this).data('order'),
    }).done(function(data) {
        window.location.href = '/cart';
    });
});
$(document).on('click', '.saveTemplate', function() {
    const elements = $('.fs-cart-supplier-row-checkbox').filter(function() {
        const content = window.getComputedStyle(this, ':after').getPropertyValue('content');
        return content !== 'none';
    });
    let ids = [];
    $.each(elements, function(i, e) {
        ids.push($(e).data('id'));
    })
    let name = $(this).closest('.fs-cart-supplier-save-template-block-inner').find('.fs-cart-supplier-template-name').val();
    let seller = $(this).data('seller');
    if (ids.length < 1) {
        alert('Select Products');
    } else if (name.length < 1) {
        alert("Name can't be empty");
    } else {
        $.post("/site/save-template", {
            ids: ids,
            name: name,
            seller: seller
        }).done(function(data) {
            $('.fs-cart-supplier-template-checkbox-wrapper').replaceWith(`<label class="fs-cart-supplier-template-checkbox-wrapper" style="font-size:16px;">
                    <input type="checkbox">
                    <i class="fs-icon-approved" style="color:#297551;"></i>
                <span className="fs-cart-supplier-template-label">Ձևանմուշը պահպանված է</span>
            </label>`);
            $('.fs-cart-supplier-template-name,.fs-cart-supplier-save-template-bottom-row').hide();
        });
    }
});
$('#refill_order').on('click', function() {
    const elements = $('.fs-cart-supplier-row-checkbox').filter(function() {
        const content = window.getComputedStyle(this, ':after').getPropertyValue('content');
        return content !== 'none';
    });
    let ids = [];
    let qtys = [];
    $.each(elements, function(i, e) {
        ids.push($(e).data('id'));
        qtys.push($(e).closest('.fs-cart-supplier-row-inner').find('.fs-count-calc-num').val());
    })

    let seller = $(this).data('seller');
    if (ids.length < 1) {
        alert('Select Products');
    } else {
        $.post("/site/update-order", {
            ids: ids,
            qtys: qtys
        }).done(function(data) {
             window.location.href = '/cart?update=success';
        });
    }
});
$('body').on('click','.fs-to-top-button',function() {
    $("html, body").animate({
        scrollTop: 0
    }, "slow");
    return false;
});
$('.disable_partner').on('change',function(){
    var pid = $(this).val();
    if($(this).is(':checked')){
        var type ='disabled';
    } else {
        var type = 'activate';
    }
    $.post("/site/disable-partner", {
        partner_id: pid,
        type:type,
    }).done(function(data) {
        window.location.href =  window.location.href+'?update=success';
    });
});
$(document).on('click', '.fs-cart-aside-grand-total-submit-btn-1', function() {
    $('#basket-submit-modal').addClass('active');
});
$('.filter-select-prod').change(function() {
    if ($(this).val()) {
        var price = $(this).find(':selected').attr('data-price')
        $(this).closest('.item').find('.fs-product-current-price').html(price);
        $(this).closest('.item').find('.fs-product-add-to-cart').attr('data-price', price);
        $(this).closest('.item').find('.fs-product-add-to-cart').attr('data-variation', $(this).val());
        $(this).closest('.fs-product-card').find('.fs-product-current-price').html(price);
        $(this).closest('.fs-product-card').find('.fs-product-add-to-cart').attr('data-price', price);
        $(this).closest('.fs-product-card').find('.fs-product-add-to-cart').attr('data-variation', $(this).val());
        $(this).attr('data-variation', $(this).val());
    }
});
$('.filter-select-prod-sec').change(function() {
    if ($(this).val()) {
        var price = $(this).find(':selected').attr('data-price');
        $(this).closest('.fs-product-fast-view-inner').find('.fs-single-product-current-price').html(price + ' դր');
    }
});
$(document).on('click', '.sendOrderRequestNoRe', function() {
    let data = {};
    let price = {};
    let delivery_date = {};
    var is_store = false;
    if($('#store').val()){
        is_store = $('#store').val();
    }

    $.each($('.fs-cart-supplier-block'), function(i, e) {
        let ids = [];
        let money = [];
        var delivery;
        let elements = $(e).find('.fs-cart-supplier-row-checkbox').filter(function() {
            let content = window.getComputedStyle(this, ':after').getPropertyValue('content');
            return content !== 'none';
        });
        $.each(elements, function(j, k) {
       
            ids.push($(k).data('id'));
            money.push(parseInt($(k).closest('.fs-cart-supplier-row').find('.fs-cart-product-total-price').text().replace(/\D/g, '')));
             delivery = $(k).closest('.fs-cart-supplier-block').find('.delivery_date').val();
        })
        let supp = $(e).data('supplier');
        data[$(e).data('supplier')] = ids;
        price[$(e).data('supplier')] = money;
        delivery_date[$(e).data('supplier')] = delivery;
    });
   

    $.post("/site/create-order", {
        data: data,
        price: price,
         store: is_store,
        delivery_date:delivery_date
    }).done(function(data) {
         location.reload();
    });
});
$(document).on('click', '.sendOrderRequestRe', function() {

    const elements = $('.fs-cart-supplier-row-checkbox').filter(function() {
        const content = window.getComputedStyle(this, ':after').getPropertyValue('content');
        return content !== 'none';
    });
    let ids = [];
    let qtys = [];
 
    $.each(elements, function(i, e) {
        ids.push($(e).data('id'));
        qtys.push($(e).closest('.fs-cart-supplier-row-inner').find('.fs-count-calc-num').val());
    })

    let seller = $(this).data('seller');
    if (ids.length < 1) {
        alert('Select Products');
    } else {
        $.post("/site/update-order", {
            ids: ids,
            qtys: qtys
        }).done(function(data) {
            $('.sendOrderRequestNoRe').click();
        });
    }
});
$('.fs-personal-page-request-popup-close').click(function() {
    // $(this).closest('.fs-personal-page-request-popup').removeClass('active');
    // window.location.href = $(this).attr('data-back-link');
    window.history.back()
});

function checkOrderResult(arr) {
    let resultPrice = 0;
    for (let i = 0; i < arr.length; i++) {
        let currentPrice = parseInt(arr[i].eq(0).closest('.fs-personal-order-table-body-row').find('.result').text().split(',').join(''));
        resultPrice += currentPrice;
    }
    if (resultPrice === 0) {
        $('.fs-personal-order-result-row').removeClass('active');
    } else {
        $('.fs-personal-order-result-row').addClass('active');
    }
    $('.fs-personal-order-result-inner var').text(resultPrice + ' դրամ');
}
$('.fs-personal-order-table-body-row .fs-personal-order-table-row-check input').change(function() {
    let checkboxList = $('.fs-personal-order-table-body-row .fs-personal-order-table-row-check input');
    let checkedArr = [];
    let resultCur = '';
    for (let i = 0; i < checkboxList.length; i++) {
        if (checkboxList.eq(i).prop('checked') === true) {
            checkedArr.push(checkboxList.eq(i));
        }
    }
    checkOrderResult(checkedArr);
});
$('.fs-personal-order-table-head-row .fs-personal-order-table-row-check input').change(function() {
    let checkboxList = $('.fs-personal-order-table-body-row .fs-personal-order-table-row-check input');
    let checkedArr = [];
    let resultCur = '';
    for (let i = 0; i < checkboxList.length; i++) {
        if (checkboxList.eq(i).prop('checked') === true) {
            checkedArr.push(checkboxList.eq(i));
        }
    }
    checkOrderResult(checkedArr);
});
$('.fs-personal-announced-table-cell.company').click(function() {
    $('.fs-sale-details-modal').addClass('active');
    $('.fs-main-content').addClass('no-transorm');
});
$('.fs-sale-details-modal button, .fs-sale-details-modal').click(function() {
    $('.fs-sale-details-modal').removeClass('active');
    $('.fs-main-content').removeClass('no-transorm');
});
$('.fs-sale-details-modal-inner').click(function(e) {
    e.stopPropagation();
})
$('.fs-cart-supplier-template-checkbox-wrapper input[type="checkbox"]').change(function() {
    if ($(this).prop('checked') === true) {
        $(this).closest('.fs-cart-supplier-save-template-top-row').find('.fs-cart-supplier-template-name').addClass('active');
        $(this).closest('.fs-cart-supplier-save-template-top-row').siblings('.fs-cart-supplier-save-template-bottom-row').addClass('active');
    } else {
        $(this).closest('.fs-cart-supplier-save-template-top-row').find('.fs-cart-supplier-template-name').removeClass('active');
        $(this).closest('.fs-cart-supplier-save-template-top-row').siblings('.fs-cart-supplier-save-template-bottom-row').removeClass('active');
    }
});
$(document).on('click', '.fs-single-order-td button', function() {
    let calcAction = $(this).attr('class');
    let prodCount = Number($(this).siblings('.fs-count-calc-num').val());
    if (calcAction === 'fs-icon-minus') {
        prodCount--;
        if (prodCount < 1) {
            prodCount = 1;
        }
    }
    else if(calcAction === 'fs-icon-plus'){
        prodCount++;
    }
    $(this).siblings('.fs-count-calc-num').val(prodCount);
    // prodCount is new product count to send
    // $.post("LINK", {
    //     role: 'prodToCart',
    // }).done(function (data) {
    //
    // });
});
$(document).on('click', '.answer_button_group button[data-role="reject"]', function(e) {
    let reason = $('.order_comment').val();
    reason = reason.split(' ').join('');
    if (reason.length < 1) {
        e.preventDefault();
        $('.fs-order-comment').addClass('error');
    } else {
        $('.fs-order-comment').removeClass('error');
        $('.rejectOrderComment').val(reason);
        $('#state_change_reject').submit();
    }
});
$(document).on('click', '.fs-personal-order-result-row', function() {});
$(document).on('click', '.fs-cart-product-info-toggle-btn', function() {
    $(this).siblings('.fs-cart-product-info-block').slideToggle();
});
$(document).on('click', '.fs-remove-template-el', function() {
    $('#remove_template_modal').addClass('active');
    $('#tempalte_id').val($(this).data('tempalte_id'));
});
$('.fs-remove-template').click(function() {
    $('#removeTemplateID').val($(this).data('temprid'));
    $('#removeCartID').val($(this).data('cartid'));
})
$(document).on('click', '.fs-modal', function() {
    $(this).removeClass('active');
});
$(document).on('click', '.fs-modal-body', function(e) {
    e.stopPropagation();
});
$(document).on('click', '.fs-modal-btn[data-action="no"]', function() {
    $(this).closest('.fs-modal').removeClass('active');
});
$(document).on('click', '#remove_template_modal .fs-modal-btn[data-action="yes"]', function() {
    $(this).closest('.fs-modal').removeClass('active');
    $("#tempalte_remove_form").submit();
});
$(document).on('click', '.fs-single-template-action-change', function() {
    $('#edit_template_modal').addClass('active');
});
$(document).on('click', '.fs-remove-template', function() {
    $("#remove_template_row_id").val(parseInt($(this).data('temprid')));
    $('#remove_template_prod').addClass('active');
});
$(document).on('click', '.fs-cart-empty-button', function() {
    $('#remove_cart_prods').addClass('active');
});
$(document).on('click', '.fs-cart-product-remove', function() {
    var id = $(this).data('id');
    let elem = $(this).closest('.fs-cart-supplier-row');
    $('#fs-cart-product-remove').attr('data-id',id);
    $('#fs-cart-product-remove').addClass('active');
    $('.removeItem').click(function(){
        $.post("/site/delete-from-cart", {
            id: id,
        }).done(function(data) {
            window.location.reload();
        });
    });

});
$('.fs-cart-empty-button').click(function() {
    $('#basket-remove-dialog').addClass('active');
    $('.removeItems').click(function() {
        const elements = $('.fs-cart-supplier-row-checkbox').filter(function () {
            const content = window.getComputedStyle(this, ':after').getPropertyValue('content');
            return content !== 'none';
        });
        let ids = [];
        $.each(elements, function (i, e) {
            ids.push($(e).data('id'));
        })
        $.post("/site/delete-from-cart", {
            id: ids,
        }).done(function (data) {
            location.reload();
        });
    });
});
$(document).on('click', '#remove_template_prod .fs-modal-btn[data-action="yes"]', function() {
    $(this).closest('.fs-modal').removeClass('active');
});
$(document).on('click', '#remove_cart_prods .fs-modal-btn[data-action="yes"]', function() {
    alert('Том. Тут надо удалить продукты');
    $(this).closest('.fs-modal').removeClass('active');
});
$(document).on('click', '#basket-remove-el-dialog .fs-modal-btn[data-action="yes"]', function() {
    let productId = $(this).closest('#basket-remove-el-dialog').attr('data-id');
    let prodArr = [productId];
    removeProduct(prodArr);
    $(this).closest('.fs-modal').removeClass('active');
});
$(document).on('click', '#basket-submit-modal .fs-modal-btn[data-action="yes"]', function() {
    globalSubmitSwitcher = true;
    $('.fs-cart-wrapper').submit();
    $(this).closest('.fs-modal').removeClass('active');
});
$(document).on('mousedown', '.fs-catalogue-sort .fs-dropdown-select-option', function() {
    let selected = $(this).closest('.fs-dropdown').find('.fs-dropdown-selected-variant');
    let targetText = $(this).text();
    let type_ = $(this).attr('data-type');
    $(this).addClass('active').siblings('.fs-dropdown-select-option').removeClass('active');
    selected.text(targetText);
    document.cookie = "sort=" + type_ + "; expires=Thu, 18 Dec 2033 12:00:00 UTC; path=/";
    document.cookie = "sort_text=" + targetText + "; expires=Thu, 18 Dec 2033 12:00:00 UTC; path=/";
    window.location.reload();
});
$(document).on('click', '.head-panel-category-btn', function() {
    $('.fs-main-content').addClass('no-transorm');
    $('body').addClass('no-scroll');
    $('.fs-mobile-cat-window').addClass('active');
});
$(document).on('click', '.fs-mobile-cat-window-close', function() {
    $('.fs-main-content').removeClass('no-transorm');
    $('body').removeClass('no-scroll');
    $('.fs-mobile-cat-window').removeClass('active');
});
$(document).on('click', '.head-panel-filter-btn', function() {
    $('.fs-main-content').addClass('no-transorm');
    $('body').addClass('no-scroll');
    $(document).scrollTop(0);
    $('.fs-mobile-filter-window').addClass('active');
});
$('#drop_mobile').change(function(){
    var val_ = $(this).val();
    if(val_){
        window.location.href = '/personal-history?state='+val_;
    } else {
        window.location.href = '/personal-history';
    }
});
$('#drop_mobile_s').change(function(){
    var val_ = $(this).val();
    if(val_){
        window.location.href = '/supplier-processing?state='+val_;
    } else {
        window.location.href = '/supplier-processing';
    }
});
$('#drop_mobile_company_sup').change(function(){
    var val_ = $(this).val();
    var company_id = $('#comp_id').val();
    if(val_){
        window.location.href = '/company-details/'+company_id+'?category='+val_;
    } else {
        window.location.href = '/company-details/'+company_id;
    }
});

$('#drop_mobile_reqs').change(function(){
    var val_ = $(this).val();
    if(val_){
        window.location.href = '/site/personal-requests?state='+val_;
    } else {
        window.location.href = '/site/personal-requests';
    }
});
$('#drop_mobile_offers_sup').change(function(){
    var val_ = $(this).val();
    if(val_){
        window.location.href = '/supplier-offers?state='+val_;
    } else {
        window.location.href = '/supplier-offers';
    }
});
$('#drop_mobile_offers_pers').change(function(){
    var val_ = $(this).val();
    if(val_){
        window.location.href = '/personal-sales?state='+val_;
    } else {
        window.location.href = '/personal-sales';
    }
});
$('#drop_mobile_reqs_sup').change(function(){
    var val_ = $(this).val();
    if(val_){
        window.location.href = '/site/supplier-requests?state='+val_;
    } else {
        window.location.href = '/site/supplier-requests';
    }
});
$(document).on('click', '.fs-mobile-filter-window-close', function() {
    $('.fs-main-content').removeClass('no-transorm');
    $('body').removeClass('no-scroll');
    $('.fs-mobile-filter-window').removeClass('active');
});
$('.fs-personal-order-tab').click(function(){
    console.log($(this).attr('href'));
});
$(document).on('click', '.fs-mobile-sort-row', function() {
    if ($(this).hasClass('opened')) {
        $(this).removeClass('opened');
    } else {
        $(this).addClass('opened');
    }
});
$(document).on('click', '.fs-mob-to-back', function() {
    $('.fs-personal-aside').addClass('active');
});
$(document).on('click', '.show-more-btn', function() {
    let checker = $(this).closest('.fs-min-product-slider-wrapper').find('.show-more-switcher');
    checker.prop('checked', !checker.prop('checked'));
});
