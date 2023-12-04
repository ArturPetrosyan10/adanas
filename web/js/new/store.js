function openPopup(id) {
    jQuery(".modal").remove();
    jQuery.ajax({
        url: "/store/create-store",
        success: function (result) {
            console.log(result)
            jQuery("body").append(result);
        }
    });

}


// $('body').on('click', '#createStore', function(event) {
//     console.log("open moddddd")
//     // var id = $('.sortable li.active').attr('data-id');
//     openPopup();
// });


jQuery(document).ready(function ($) {
    $('#createStore').on('click', function (event) {
        console.log("open moddddd")
        // var id = $('.sortable li.active').attr('data-id');
        openPopup();
    });
});