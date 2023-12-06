ymaps.ready(init);


let poz

function init() {
    let geolocation = ymaps.geolocation,
        myMap = new ymaps.Map('map', {
            center: [40.177628, 44.512546],
            zoom: 13,
            controls: ['geolocationControl']

        }, {
            searchControlProvider: 'yandex#search'
        });

    // Сравним положение, вычисленное по ip пользователя и
    // положение, вычисленное средствами браузера.
    geolocation.get({
        provider: 'yandex',
        mapStateAutoApply: false
    }).then(function (result) {
        // console.log(result.geoObjects.position)
        getDataStore(result.geoObjects.position)
        // console.log(result.geoObjects.position)
        // Красным цветом пометим положение, вычисленное через ip.
        result.geoObjects.options.set('preset', 'islands#redCircleIcon');
        result.geoObjects.get(0).properties.set({
            balloonContentBody: 'Мое местоположение'
        });
        myMap.geoObjects.add(result.geoObjects);
    })

    // geolocation.get({
    //     provider: 'browser',
    //     mapStateAutoApply: true
    // }).then(
    //     function (result) {
    //         // Success: Set marker options and add to the map
    //         getDataStore(result.geoObjects.position)
    //
    //         result.geoObjects.options.set('preset', 'islands#blueCircleIcon');
    //         myMap.geoObjects.add(result.geoObjects);
    //     },
    //     function (error) {
    //         // Failure: Handle the error
    //         console.error('Geolocation error:', error.message);
    //     }
    // );
}


function openPopup() {
    jQuery(".modal").remove();
    jQuery.ajax({
        url: "/store/create-store",
        success: function (result) {
            jQuery("body").append(result);
            document.getElementById('store-location').value=poz.join(', ')
        }
    });

}

async function getDataStore(position) {
    await jQuery.ajax({
        url: "/store/index",
        success: function (result) {
            result = JSON.parse(result)
            poz = position
            result.forEach(el => {
                el = el.location.split(', ')
                let d = Math.pow((position[0] - +el[0]) ** 2 + (position[1] - +el[1]) ** 2, 1 / 2) * 100000
                d <= 50 && (poz = el)
            })
            console.log(poz.join(', '))

        }
    });
    // console.log('poz', poz)
}

// $('body').on('click', '#createStore', function(event) {
//     console.log("open moddddd")
//     // var id = $('.sortable li.active').attr('data-id');
//     openPopup();
// });


jQuery(document).ready(function ($) {
    $('#createStore').on('click', function (event) {
        // var id = $('.sortable li.active').attr('data-id');
        openPopup();
    });


});