function initMap() {

    latitude = parseFloat(document.getElementById('latitude').value);
    long = parseFloat(document.getElementById('longitude').value);

    if (document.getElementById('read') && (!latitude && !long)) {
        return;
    }

    var map = new google.maps.Map(document.getElementById('googleMap'), {
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    if (latitude && long) {
        var myMarker = new google.maps.Marker({
            position: new google.maps.LatLng(latitude, long),
            draggable: true
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
        map.setCenter(myMarker.position);
        myMarker.setMap(map);

    } else {
        map.setCenter({lat: 49, lng: 32});
    }
}
