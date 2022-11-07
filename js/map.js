function initMap() {

    latitude = parseFloat(document.getElementById('latitude').value);
    longitude = parseFloat(document.getElementById('longitude').value);

    if (document.getElementById('read') && (!latitude && !longitude)) {
        return;
    }

    var map = new google.maps.Map(document.getElementById('googleMap'), {
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var myMarker;

    if (latitude && longitude) {
        myMarker = new google.maps.Marker({
            position: new google.maps.LatLng(latitude, longitude),
            draggable: true
        });

    } else {
        myMarker = new google.maps.Marker({
            position: new google.maps.LatLng(49, 32),
            draggable: true,
            visible: false
        });
    }

    google.maps.event.addListener(map, 'click', function (event) {
        myMarker.setPosition(event.latLng);
        myMarker.visible = true
        myMarker.map = map;
    });

    if (document.getElementById('read')) {
        myMarker.draggable = false;
    } else {
        google.maps.event.addListener(myMarker, 'dragend', function (evt) {
            document.getElementById('latitude').value = evt.latLng.lat().toFixed(3);
        });

        google.maps.event.addListener(myMarker, 'dragend', function (evt) {
            document.getElementById('longitude').value = evt.latLng.lng().toFixed(3);
        });
    }

    var latlng = document.querySelectorAll('input.latlng');

    for (let i = 0; i < latlng.length; i++) {
        latlng[i].addEventListener('input', function (evt) {

            lat = parseFloat(document.getElementById('latitude').value);
            lng = parseFloat(document.getElementById('longitude').value);

            if (!lat || !lng) {
                myMarker.setMap(null);
                return
            }

            map.panTo({
                lat: lat,
                lng: lng
            });

            if (!myMarker.map) {
                myMarker.setMap(map);
            }

            myMarker.setPosition({
                lat: lat,
                lng: lng
            });
        });
    }

    map.setCenter(myMarker.position);
    myMarker.setMap(map);
}
