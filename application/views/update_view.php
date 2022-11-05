<?php include_once 'header.php'; ?>

    <!-- Modal edit-->
    <div class="container" id="edit<?php echo $data->conference_id; ?>">
        <form action="'..\..\core\route.php" method="post">

            <div class="form-group">
                <small>Title</small>
                <input type="text" class="form-control" name="title" minlength="2" maxlength="255" value="<?php echo $data->title; ?>">
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
            <script type="text/javascript" src="../../js/map.js"></script>

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
        <button type="button" class="btn btn-secondary">Back</button>
        <button type="submit" class="btn btn-primary" name="edit">Save</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $data->conference_id; ?>">Delete</button>

        </form>
    </div>
    </div>
    </div>
    </div>
    <!-- Modal edit-->

<?php include_once 'footer.php'; ?>

    <!--<title>Edit conference</title>
    <div class="container">
        <h3 style="text-align: center; margin-top: 20px" class="modal-title" id="exampleModalLabel">Edit conference</h3>
        <form action="?conference_id=<?php /*echo $res->conference_id; */?>" method="post">
            <div class="form-group">
                <small>Title</small>
                <input type="text" class="form-control" required="required" minlength="2" maxlength="255" name="title" value="<?php /*echo $res->title; */?>">
            </div>
            <div class="form-group">
                <small>Date</small>
                <input type="date" class="form-control" required="required" name="conf_date" value="<?php /*echo $res->conf_date; */?>">
            </div>
            <div class="form-group">
                <small>Latitude</small>
                <input type="text" class="form-control" name="latitude" value="<?php /*echo $res->latitude; */?>">
            </div>
            <div class="form-group">
                <small>Longitude</small>
                <input type="text" class="form-control" name="longitude" value="<?php /*echo $res->longitude; */?>">
            </div>
            <div id="googleMap" style="width:100%;height:400px;"></div>

            <script type="text/javascript" src="../../js/map.js"></script>
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
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
    <button type="submit" class="btn btn-primary" name="edit">Save</button>
    </form>
</div>
    </div>-->
