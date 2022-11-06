<div class="form-group">
    <small>Title</small>
    <input type="text" required="required" class="form-control" name="title" minlength="2" maxlength="255"
           value="<?php echo $res->title; ?>">
</div>
<div class="form-group">
    <small>Date</small>
    <input type="date" required="required" class="form-control" name="conf_date"
           value="<?php echo $res->conf_date; ?>">
</div>
<div class="form-group">
    <small>Latitude</small>
    <input id="latitude" type="text" class="form-control" name="latitude" value="<?php echo $res->latitude; ?>">
</div>
<div class="form-group">
    <small>Longitude</small>
    <input id="longitude" type="text" class="form-control" name="longitude" value="<?php echo $res->longitude; ?>">
</div>
<div class="form-group">
    <div id="googleMap" style="width:100%;height:400px;"></div>
</div>
<div class="form-group">
    <label for="countries"><small>Country</small></label>
    <select class="form-control" name="country" id="countries">
        <option><?php echo $res->country; ?></option>
        <?php foreach (['Ukraine', 'USA', 'UK', 'France'] as $country) {
            if ($country != $res->country) {
                ?>
                <option><?php echo $country; ?></option>
            <?php }
        } ?>
    </select>
</div>
<div class="form-group">
    <button type="button" style="float: right; margin-left: 5px;" class="btn btn-secondary"><a
                style="text-decoration:none; color: white" href="/conferences">Back</a>
    </button>
