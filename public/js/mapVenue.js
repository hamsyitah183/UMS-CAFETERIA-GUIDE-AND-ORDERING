var cafe = document.querySelector('#cafeteria');
var cafe_list = document.querySelector('#cafeteria_list');

var kiosk = document.querySelector('#kiosk');
var kiosk_list = document.querySelector('#kiosk_list');

var vendor = document.querySelector('#vendor');
var vendor_list = document.querySelector('#vendor_list');

console.log(cafe);

cafe.addEventListener('click', () => {
    cafe.classList.toggle('focus');
    cafe_list.classList.toggle('show');
})


kiosk.addEventListener('click', () => {
    kiosk.classList.toggle('focus');
    kiosk_list.classList.toggle('show');
})

vendor.addEventListener('click', () => {
    vendor.classList.toggle('focus');
    vendor_list.classList.toggle('show');
})




// map
// var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//             maxZoom: 19,
//             attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
//         });



// // var map = L.map('map').setView([5.670106, 116.363931], 17);

// var map = L.map('map', {
//     center:[5.452251,115.822547],
//     zoom:16,
//     layers: [osm]
// });

// //cafe marker
// var cafeMarker = L.icon({
//     iconUrl : 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgUgJifSHoefqV0WFUTR8M_qhe8HDVrP4dJqXrQxH5E71tP2Hdy5IF8TKNcS4wWRaIDb787tyr1B8tIr77TjF0fYptRkxzCvT02PVZTjS6i-VnutEYHtxuuEPeuoAsRxDb24vohniNwbie8RcCZfL3tIc5aWs_GlXjXP6ytgJhHGDCiFeiXn7nHRRezaTg/s1600/cafeLocation.png',
//     iconSize: [35,35],
// });

// var cafeMarkersGroup = L.featureGroup().addTo(map);

// for(var i = 0; i < cafeCoordinate.length; i++) {
//     cafeteriaName[i] = document.querySelector('.'+cafeteriaSlug);

//     cafeteriaName[2].style.backgroundColor = 'black';

//     cafeteriaMarkers[i] = L.marker(cafeteriaCoordinate[i], {
//         icon:cafeMarker
//     })
//     .addToMap(cafeMarkersGroup);
// }


// cafeMarkersGroup.addTo(map);











