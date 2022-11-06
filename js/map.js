function initMap() {

    lat = parseFloat(document.getElementById('latitude').value);
    long = parseFloat(document.getElementById('longitude').value);

    var map = new google.maps.Map(document.getElementById('googleMap'), {
        zoom: 5,
        center: new google.maps.LatLng(lat, long),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var myMarker = new google.maps.Marker({
        position: new google.maps.LatLng(lat, long),
        draggable: true
    });

    google.maps.event.addListener(myMarker, 'dragend', function (evt) {
        document.getElementById('cur-lat').innerHTML = '<input type="text" value="'+ evt.latLng.lat().toFixed(3) + '">';
    });

    google.maps.event.addListener(myMarker, 'dragend', function (evt) {
        document.getElementById('cur-long').innerHTML = '<input type="text" value="'+ evt.latLng.lng().toFixed(3) + '">';
    });

    map.setCenter(myMarker.position);
    myMarker.setMap(map);
}



















// var map = new google.maps.Map(document.getElementById('map_canvas'), {
//     zoom: 1,
//     center: new google.maps.LatLng(35.137879, -82.836914),
//     mapTypeId: google.maps.MapTypeId.ROADMAP
// });
//
// var myMarker = new google.maps.Marker({
//     position: new google.maps.LatLng(47.651968, 9.478485),
//     draggable: true
// });
//
// google.maps.event.addListener(myMarker, 'dragend', function (evt) {
//     document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
// });
//
// google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
//     document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
// });
//
// map.setCenter(myMarker.position);
// myMarker.setMap(map);


