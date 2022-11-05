function initMap() {
    var addressCoords = new google.maps.LatLng(51.509865,-0.118092);
    var mapProp= {
        center: addressCoords,
        zoom:5,
    };
    var myMap = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker = new google.maps.Marker({
        position: addressCoords,
        map: myMap
    });
}