
//Fix block after scroll
if($('.fixme').length) {
    var fixmeTop = $('.fixme').offset().top;
    $(window).scroll(function () {
        var currentScroll = $(window).scrollTop() + 70;
        if (currentScroll >= fixmeTop) {
            $(".fixme").addClass("fixemenu");
        } else {
            $(".fixme").removeClass("fixemenu");
        }
    });
}

//Burger Menu
$(document).ready(function () {
    $(".burger").click(function () {
        $("#mobile-menu").addClass("display-menu");
        $("#overley").addClass("display-overley");
        $("#close-menu").addClass("display-close-menu");
        $("#image-list").addClass("fixed-il");
        $("body").addClass("freeze");
        $('.pagination').css('display','none');
        $(".filters").removeClass("display-filters");
    });
    $(".filters-ico").click(function () {
        $(".filters").addClass("display-filters");
        $("#overley").addClass("display-overley");
        $("body").addClass("freeze");
    });
    $("#close-menu, #overley").click(function () {
        $("#close-menu").attr('class', '');
        $("#mobile-menu").attr('class', '');
        $("#overley").attr('class', '');
        $("#image-list").attr('class', '');
        $('.pagination').css('display','block');
        $(".filters").removeClass("display-filters");
        $("body").removeClass("freeze");
    });
});

//Open SubMenu
$(document).ready(function () {
//    $('.menu-element').hover(
//        function(){ 
//			var tag = this;
//            var subId = this.getAttribute('data-subId');
//			 setTimeout(function(){
//				$(tag).addClass('open-submenu');
//                $('.swiper-custom').addClass('active').html($(tag).find('.submenu').html());
//			}, 300);
//		},
//        function(){
//            var tag = this;
//            var subId = this.getAttribute('data-subId');
//            setTimeout(function(){
//                $(tag).removeClass('open-submenu');
//                $('.swiper-custom').html('');
//            }, 300);
//        }
//    );
    var meTimeout = "";
    $(document).on('mouseover', '.menu-element', function(e){ 
        var tag = this;
        var subId = this.getAttribute('data-subId');
        clearTimeout(meTimeout);
 
        if($(tag).find('.submenu').length) {
          meTimeout = setTimeout(function(){
            if(!$('.swiper-submenu-block').hasClass('active') || $('.swiper-submenu-block').attr('data-pId') !== subId) {
              $('.swiper-submenu-block').addClass('active').attr('data-pId', subId);
              setTimeout(function(){
                $('.swiper-submenu-block.active').html($(tag).find('.submenu').html());
              }, 300);
            }
          }, 500);
        } else {
          $('.swiper-submenu-block').removeAttr('data-pId').removeClass('active').html('');
        }
    });
    $(document).on('mouseout', '.menu-element', function(e){ 
        var target = e.toElement || e.relatedTarget;
        var pid = $('.swiper-submenu-block').attr('data-pId');
        if ( !($(target).closest('.swiper-submenu-block').length || $(target).closest(this).length || target == this) ) {
          clearTimeout(meTimeout);
          $('.menu-element[data-subId='+pid+']').removeClass('hovered');
          $('.swiper-submenu-block').removeAttr('data-pId').removeClass('active').html('');
        } else {
          $('.menu-element[data-subId='+pid+']').addClass('hovered');
        }
    });
    $(document).on('mouseout', '.swipper-container, .swiper-submenu-block', function(e){
        var target = e.toElement || e.relatedTarget;
        var pid = $('.swiper-submenu-block').attr('data-pId');
        if ( !$(target).closest(this).length ) {
          clearTimeout(meTimeout);
          $('.menu-element[data-subId='+pid+']').removeClass('hovered');
          $('.swiper-submenu-block').removeAttr('data-pId').removeClass('active').html('');
        } else {
          $('.menu-element[data-subId='+pid+']').addClass('hovered');
        }
    });
});



// Custom toggle for filter's collapse
jQuery(document).ready(function($){
    $('.see-more-filters').attr('data-click-state', 1).on('click',function(){
        if($(this).attr('data-click-state') == 1) {
            $(this).attr('data-click-state', 0);
			var DivID = $( this ).data( "fordivid" );
            $( '#'+DivID ).addClass("display-filters");
        } else {
            $(this).attr('data-click-state', 1);
			var DivID = $( this ).data( "fordivid" );
            $( '#'+DivID ).removeClass("display-filters");
			
        }
    });
});


// List View Switcher
$(document).ready(function () {
    $(".list-view").click(function () {
        $('.product-list').addClass("horizontal");
        $('.grid-view').removeClass("selected");
        $('.list-view').addClass("selected");
        lazyloadfunc();
    });
    $(".grid-view").click(function () {
        $('.product-list').removeClass("horizontal");
        $('.grid-view').addClass("selected");
        $('.list-view').removeClass("selected");
        lazyloadfunc();
    });
});
//$( window ).resize(function() {
//    if($( window ).width() < 768){
//        $('.product-list').removeClass("horizontal");
//    }
//});



// SearchBar
jQuery(document).ready(function($){
    $('.search-ico').attr('data-click-state', 1).on('click',function(){
        if($(this).attr('data-click-state') == 1) {
            $(this).attr('data-click-state', 0);
            $('.header-search').addClass("display-searchbar");
            $("#overley").addClass("display-overley");
            $("body").addClass("freeze");
            $('.searchinp').focus();
        } else {
            $(this).attr('data-click-state', 1);
            $('.header-search').removeClass("display-searchbar");
            $("#overley").removeClass("display-overley");
            $("body").removeClass("freeze");
        }
    });
    $("#overley").click(function () {
        $('.search-ico').attr('data-click-state', 1);
        $('.header-search').removeClass("display-searchbar");
        $("#overley").attr('class', '');
        $("body").removeClass("freeze");
    });
});
// Onfocus open suggesstion bar and remove after focuout
$(document).ready(function(){
    $("input.searchinp").click(function(event){
        $('.search-suggestion').addClass("display");
        event.stopPropagation();
    });
    $('.search-suggestion').click(function(event){
        event.stopPropagation();
    });
    $('body').click(function(){
        $('.search-suggestion').removeClass("display");
    });
});
//--------------------------------------------------------

//Slider js
//$(document).ready(function() {
//    var owl = $('.owl-carousel');

//});

function starsActive(){
	
	    /* 1. Visualizing things on Hover - See next part for action on click */

    $('#stars li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover');
        });
    });
    /* 2. Action to perform on click */
    $('#stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }
        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        }
        else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }
        responseMessage(msg);
    });
	
	
}

// Rating Stars
$(document).ready(function(){
	starsActive();
});
function responseMessage(msg) {
    $('.success-box').fadeIn(200);
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
}

//Input number formating
(function($, undefined) {
    "use strict";
    // When ready.
    $(function() {
        var $form = $( "#form" );
        var $input = $form.find( "input" );
        $input.on( "keyup", function( event ) {
            // When user select text in the document, also abort.
            var selection = window.getSelection().toString();
            if ( selection !== '' ) {
                return;
            }
            // When the arrow keys are pressed, abort.
            if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                return;
            }
            var $this = $( this );
            // Get the value.
            var input = $this.val();
            var input = input.replace(/[\D\s\._\-]+/g, "");
            input = input ? parseInt( input, 10 ) : 0;
            $this.val( function() {
                return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
            } );
        } );
        /* When Form Submitted */
        $form.on( "submit", function( event ) {
            var $this = $( this );
            var arr = $this.serializeArray();
            for (var i = 0; i < arr.length; i++) {
                arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
            };
    
            event.preventDefault();
        });
    });
})(jQuery);

//Subscription message
$(document).ready(function () {
    $("#subscribe").click(function () {
        //$(".subscription-cont").addClass("hide");
        //$(".subscription-msg").addClass("show");
    });
    $("#goback").click(function () {
        $(".subscription-cont").removeClass("hide");
        $(".subscription-msg").addClass("hide");
    });
});

//Datepicker
$( function() {
    $( "#datepicker" ).datepicker();
} );


// Disable Map scrolling zoom
$('.map-container')
    .click(function(){
        $(this).find('iframe').addClass('clicked')})
    .mouseleave(function(){
        $(this).find('iframe').removeClass('clicked')
});

// Make list image height equal to width
/*var resizeImages = function() {
	var equalsize = $('.equalsize');
	equalsize.each(function(key, value) {
		$(this).height(equalsize.width());
	});
};
resizeImages();
$(document).ready(function () {
	resizeImages();
	$(window).resize(function() { resizeImages(); });
});*/


// Images flying to basket
function flyToElement(flyer, flyingTo) {
    var $func = $(this);
    var divider = 10;
    var flyerClone = $(flyer).clone();
    $(flyerClone).css({position: 'absolute', top: $(flyer).offset().top + "px", left: $(flyer).offset().left + "px", opacity: 1, 'z-index': 1000});
    $('body').append($(flyerClone));
    var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 3) - ($(flyer).width()/divider)/3;
    var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 3) - ($(flyer).height()/divider)/3;

    $(flyerClone).animate({
            opacity: 0.4,
            left: gotoX,
            top: gotoY,
            width: $(flyer).width()/divider,
            height: $(flyer).height()/divider
        }, 500,
        function () {
            $(flyingTo).fadeOut('fast', function () {
                $(flyingTo).fadeIn('fast', function () {
                    $(flyerClone).fadeOut('fast', function () {
                        $(flyerClone).remove();
                    });
                });
            });
        });
}
$(document).ready(function(){
    $('.add-to-cart').on('click',function(){
        //Select item image and pass to the function
        var itemImg = $(this).closest('.listitem').find('.img-1').eq(0);
        flyToElement($(itemImg), $('.cart_anchor'));
    });
});


function totopGO(){
	$('body,html').animate({
		scrollTop : 0                  
	}, 500);
}

function getDocHeight() {
	var D = document;
	return Math.max(
		D.body.scrollHeight, D.documentElement.scrollHeight,
		D.body.offsetHeight, D.documentElement.offsetHeight,
		D.body.clientHeight, D.documentElement.clientHeight
	);
}

window.oldCheckpoint = 0;


// ===== Scroll to Top ==== 
	$(window).scroll(function() {
	if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
		$('#totop').fadeIn(200);     // Fade in the arrow
	} else {
		$('#totop').fadeOut(200);    // Else fade out the arrow
	}
	if((($(window).scrollTop() + $(window).height())+100) > getDocHeight()) {
		if(window.oldCheckpoint == 0 || (window.oldCheckpoint+100) < $(window).scrollTop()){
			window.oldCheckpoint = $(window).scrollTop();
		}
	}
	else{

	}
});


//lazyload
function lazyloadfunc(){
    var itemIndex = 19;
    var maxScrollTop = 0;
    var itemsLength = 0;

    var lazyLoad = function(index) {
        $(".product-list .listitem").each(function(i, elem){
            if(i > index){
                $(this).hide();
            } else {
                $(this).show();

                $(this).find( 'img' ).each(function(){
                    $(this).attr('src', $(this).data('src'));
                });
                $(this).find( '.forLoadCont' ).each(function(){
                    var _self = $(this);
                    _self.css({
                        backgroundImage: 'url(' + _self.data('ssrc') + ')'
                    });
                });
            }

        });
    };
    lazyLoad(itemIndex);
    $(window).scroll(function() {
        itemsLength = $(".product-list .listitem").length;
        var scrollTop = $(window).scrollTop();
        var windowHeight = $(window).height();
        if(scrollTop > maxScrollTop) {
            maxScrollTop = scrollTop;
            var elemTop = $(".product-list .listitem").eq(itemIndex).position().top;
            if(scrollTop + windowHeight/2 >= elemTop) { //Avoid from not enough scrolling
                if(itemIndex + 20 <= itemsLength) {
                    itemIndex += 20;
                    lazyLoad(itemIndex);
                } else {
                    itemIndex = itemsLength - 1;
                    lazyLoad(itemIndex);
                }
            }
        }
    });
}


//	listitem image slider
function imgSliderProd(){
    var loading_timer, _span, k, load_image, this_image, chng_timer, chng_timer2;
		$('.hover-img').mouseenter(function(){
			var _self = $(this),
				_img = _self.find('img'),
				_count = _img.data('loadcount');
			_span = _self.find('span');
            k = 2;
            this_image = _img.attr('src');
            load_image = _self.find('.load_-image');
			loadCouter(k);
			function loadCouter(k) {
				if(k>=_count-1){
                    load_image.attr('src', _img.data('load'+k));
                    chng_timer = setTimeout(function(){
                        _self.find('.spans').addClass('active');

                         _span.css(
                             'background-image', 'url(' + _img.data('load'+k) + ')'
                         );

                        loadTiming(0);
                    }, 500);
                }else{
                    load_image.attr('src', _img.data('load'+k));
                    chng_timer2 = setTimeout(function(){

                         _span.css(
                             'background-image', 'url(' + _img.data('load'+k) + ')'
                         );
                        loadTiming(k);
                    }, 500);
				}
			}
			function loadTiming(i) {
				loading_timer = setTimeout(function(){
					i++;
					loadCouter(i);
				}, 1000);
			}
		});
		$('.hover-img').mouseleave(function(){
            load_image.attr('src', this_image);
			_span.css(
                'background-image', 'url(' + this_image + ')'
			);
			clearTimeout(loading_timer);
            clearTimeout(chng_timer);
            clearTimeout(chng_timer2);
			$( this ).find('.spans').removeClass('active');
		});
}
	
	
	