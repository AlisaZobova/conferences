<?php include_once 'header.php'; ?>

<title>Add conference</title>

<div class="container" id="create">
    <h3 style="text-align: center; margin-top: 20px" class="modal-title" id="exampleModalLabel">Add new conference</h3>
    <form action="application\core\route.php" method="post">

        <div class="form-group">
            <small>Title</small>
            <input type="text" required="required" minlength="2" maxlength="255" class="form-control" name="title">
        </div>
        <div class="form-group">
            <small>Date</small>
            <input type="date" required="required" class="form-control" name="conf_date">
        </div>
        <div class="form-group">
            <small>Latitude</small>
            <input type="text" class="form-control" name="latitude">
        </div>
        <div class="form-group">
            <small>Longitude</small>
            <input type="text" class="form-control" name="longitude">
        </div>
        <div class="form-group">
            <div id="googleMap" style="width:100%;height:400px;"></div>
            <script type="text/javascript" src="../../js/map.js"></script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRdHNxyeXlU4pvM_S8IZy3d43Bs5-uZ8g&callback=initMap"
                    defer></script>
        </div>
        <div class="form-group">
            <label for="countries"><small>Country</small></label>
            <select class="form-control" name="country" id="countries">
                <option>Ukraine</option>
                <option>USA</option>
                <option>UK</option>
                <option>France</option>
            </select>
        </div>
        <div class="form-group">
            <button type="button" style="float: right; margin-left: 5px;" class="btn btn-secondary"><a
                        style="text-decoration:none; color: white" href="/conferences">Back</a>
            </button>
            <button type="submit" style="float: right; margin-left: 5px;" class="btn btn-primary" name="add">Save
            </button>

        </div>
</div>

<?php include_once 'footer.php'; ?>
