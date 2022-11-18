function initMap() {

    const lat = document.getElementById('latitude');
    const lng = document.getElementById('longitude');

    let latitude = parseFloat(lat.value);
    let longitude = parseFloat(lng.value);

    if (document.getElementById('read') && (!latitude && !longitude)) {
        return;
    }

    const map = new google.maps.Map(document.getElementById('googleMap'), {
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    let myMarker;

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

    map.addListener('click', function (event) {
        myMarker.setPosition(event.latLng);
        myMarker.visible = true
        myMarker.map = map;
    });

    if (document.getElementById('read')) {
        myMarker.draggable = false;
    } else {
        myMarker.addListener('dragend', function (evt) {
            lat.value = evt.latLng.lat().toFixed(3);
        });

        myMarker.addListener('dragend', function (evt) {
            lng.value = evt.latLng.lng().toFixed(3);
        });
    }

    var latlng = document.querySelectorAll('input.latlng');

    for (let i = 0; i < latlng.length; i++) {
        latlng[i].addEventListener('input', function () {
            setInputValue(lat, lng, myMarker, map)
        });
    }

    map.setCenter(myMarker.position);
    myMarker.setMap(map);
}

function setInputValue(lat, lng, myMarker, map) {

    latitude = parseFloat(lat.value);
    longitude = parseFloat(lng.value);

    if (!latitude || !longitude) {
        myMarker.setMap(null);
        return
    }

    map.panTo({
        lat: latitude,
        lng: longitude
    });

    if (!myMarker.map) {
        myMarker.setMap(map);
    }

    myMarker.visible = true

    myMarker.setPosition({
        lat: latitude,
        lng: longitude
    })
}