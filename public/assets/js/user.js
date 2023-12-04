const navbar = document.querySelector('.col-navbar')
const cover = document.querySelector('.screen-cover')

const sidebar_items = document.querySelectorAll('.sidebar-item')

function toggleNavbar() {
    navbar.classList.toggle('d-none')
    cover.classList.toggle('d-none')
}

function toggleActive(e) {
    sidebar_items.forEach(function(v, k) {
        v.classList.remove('active')
    })
    e.closest('.sidebar-item').classList.add('active')

}
 /* ----------Screenshots carousel------ */
$(document).ready(function(){
    $('#features-carousel').owlCarousel({
        loop:true,
        margin:0,
        autoplay:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    });   
});
// var map;
// var directionsService = new google.maps.DirectionsService();
// var directionsDisplay = new google.maps.DirectionsRenderer();
// var harga = 1.7;

// map = new google.maps.Map(document.getElementById('map'), {
//     center: {
//         lat: -7.960996,
//         lng: 112.618634
//     },
//     zoom: 16
// });
// directionsDisplay.setMap(map);

// var start = document.getElementById('start');
// var searchStart = new google.maps.places.SearchBox(start);
// var end = document.getElementById('end');
// var searchEnd = new google.maps.places.SearchBox(end);

// var detail = document.getElementById('detail');

// var pesanStart = document.getElementById('pesan-btn');

// function findRoute() {
//     var startAddress = start.value;
//     var endAddress = end.value;
//     var request = {
//         origin: startAddress,
//         destination: endAddress,
//         travelMode: 'DRIVING'
//     };
//     directionsService.route(request, function (result, status) {
//         if (status == 'OK') {
//             directionsDisplay.setDirections(result);

//             detail.style.display = 'block';
//         } else {
//             detail.style.display = 'none';
//             alert('Petunjuk arah gagal dimuat, masukkan alamat yang benar!');
//         }
//     });
// }

// pesan.addEventListener("click", function (event) {
//     if (start.value.trim() != "" && end.value.trim() != "") {
//         event.preventDefault();
//         findRoute();
//     }
// });
// $(document).ready(function() {
//     setTimeout(function(){
//         var owl = $('.features');
//        $('.features').owlCarousel({
//     loop:true,
//     margin:0,
//     autoplay:true,
//     responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
//         },
//         600:{
//             items:2,
//         },
//         1000:{
//             items:3,
//         }
//     }
// });   
//     },
//     2000);
// });