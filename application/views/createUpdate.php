<div class="form-group">
    <small>Title</small>
    <?php $title = !(isset($res)) ? null : $res->title; ?>
    <input type="text" required="required" class="form-control" name="title" minlength="2" maxlength="255"
           value="<?php echo $title; ?>" pattern="[A-Z][a-z]*(\s(([A-Z][a-z]*)|([a-z]+))|(\s[0-9]+)*)*"
           title="The title must start with a capital letter. Can contain words with capital or small letters, as well as numbers.
                 The minimum length is 2 characters, the maximum is 255.">
</div>
<div class="form-group">
    <small>Date</small>
    <?php $conf_date = !(isset($res)) ? null : $res->conf_date; ?>
    <input type="date" required="required" class="form-control" name="conf_date"
           value="<?php echo $conf_date; ?>">
</div>
<div class="form-group">
    <small>Latitude</small>
    <?php $latitude = !(isset($res)) ? null : $res->latitude; ?>
    <input id="latitude" type="text" class="form-control latlng" name="latitude" value="<?php echo $latitude; ?>"
           pattern="-?(\d|([1-8][0-9])(\.\d+)?)|(90(\.0)?)"
           title="Only whole or real numbers between -90 and 90. If the number is real, use a dot as a decimal separator.">
</div>
<div class="form-group">
    <small>Longitude</small>
    <?php $longitude = !(isset($res)) ? null : $res->longitude; ?>
    <input id="longitude" type="text" class="form-control latlng" name="longitude"
           value="<?php echo $longitude; ?>"
           pattern="-?(\d|([1-8][0-9])(\.\d+)?)|(90(\.0)?)"
           title="Only whole or real numbers between -90 and 90. If the number is real, use a dot as a decimal separator.">
</div>
<div class="form-group">
    <div id="googleMap" style="width:100%;height:400px;"></div>
</div>
<div class="form-group">
    <label for="countries"><small>Country</small></label>
    <select class="form-control" name="country" id="countries">
        <?php $country = !(isset($res)) ? null : $res->country; ?>
        <option><?php echo $country; ?></option>
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
