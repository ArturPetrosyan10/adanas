ymaps.ready(init);

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
    // }).then(function (result) {
    //     // Синим цветом пометим положение, полученное через браузер.
    //     // Если браузер не поддерживает эту функциональность, метка не будет добавлена на карту.
    //     result.geoObjects.options.set('preset', 'islands#blueCircleIcon');
    //     myMap.geoObjects.add(result.geoObjects);
    // });

    geolocation.get({
        provider: 'browser',
        mapStateAutoApply: true
    }).then(
        function (result) {
            // Success: Set marker options and add to the map
            result.geoObjects.options.set('preset', 'islands#blueCircleIcon');
            myMap.geoObjects.add(result.geoObjects);
        },
        function (error) {
            // Failure: Handle the error
            console.error('Geolocation error:', error.message);
        }
    );
}