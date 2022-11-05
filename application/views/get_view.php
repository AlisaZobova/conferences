<?php include_once 'header.php'; ?>
<title>Conference <?php echo $data->title; ?></title>
                <div class="container" id="read<?php echo $data->conference_id; ?>">
                    <form action="?conference_id=<?php echo $data->conference_id; ?>" method="get">
                        <div class="form-group">
                            <small>Title</small>
                            <input type="text" class="form-control" name="title" value="<?php echo $data->title; ?>">
                        </div>
                        <div class="form-group">
                            <small>Date</small>
                            <input type="date" class="form-control" name="conf_date" value="<?php echo $data->conf_date; ?>">
                        </div>
                        <div class="form-group">
                            <small>Latitude</small>
                            <input type="text" class="form-control" name="latitude" value="<?php echo $data->latitude; ?>">
                        </div>
                        <div class="form-group">
                            <small>Longitude</small>
                            <input type="text" class="form-control" name="longitude" value="<?php echo $data->longitude; ?>">
                        </div>
                        <div id="googleMap" style="width:100%;height:400px;"></div>

                        <script>
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
                        </script>

                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRdHNxyeXlU4pvM_S8IZy3d43Bs5-uZ8g&callback=initMap" defer></script>
                        <input type="text" class="form-control"
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="countries"><small>Country</small></label>
                        <select class="form-control" name="country" id="countries">
                            <option>Ukraine</option>
                            <option>USA</option>
                            <option>UK</option>
                            <option>France</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                <button type="submit" class="btn btn-primary" name="read">Save</button>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php include_once 'footer.php'; ?>