//DataTable
$(document).ready(function() {
    $('#example, #subscribers').DataTable( {
        scrollY:        '60vh',
        scrollCollapse: true,
		order: [],
        paging:false
    } );
} );

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
//Custom file uploader
$('#imageUpload').change(function(){
    readImgUrlAndPreview(this);
    function readImgUrlAndPreview(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
});


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

//Datepicker
$( function() {
    $( "#datepicker" ).datepicker();
} );


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



	