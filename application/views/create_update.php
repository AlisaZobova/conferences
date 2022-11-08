<?php $title = !$res ?  null : $res->title;
$conf_date = !$res ?  null : $res->conf_date;
$latitude = !$res ?  null : $res->latitude;
$longitude = !$res ?  null : $res->longitude;
$country = !$res ?  null : $res->country;
?>


<div class="form-group">
    <small>Title</small>
    <input type="text" required="required" class="form-control" name="title" minlength="2" maxlength="255"
           value="<?php echo $title; ?>" pattern="[A-Z][a-z]*(\s(([A-Z][a-z]*)|([a-z]+))|(\s[0-9]+)*)*"
           title="The title must start with a capital letter. Can contain words with capital or small letters, as well as numbers.">
</div>
<div class="form-group">
    <small>Date</small>
    <input type="date" required="required" class="form-control" name="conf_date"
           value="<?php echo $conf_date; ?>">
</div>
<div class="form-group">
    <small>Latitude</small>
    <input id="latitude" type="text" class="form-control latlng" name="latitude" value="<?php echo $latitude; ?>"
           pattern="[-]?[0-9]+([.][0-9]+)?"
           title="Only whole or real numbers. If the number is real, use a dot as a decimal separator.">
</div>
<div class="form-group">
    <small>Longitude</small>
    <input id="longitude" type="text" class="form-control latlng" name="longitude"
           value="<?php echo $longitude; ?>"
           pattern="[-]?[0-9]+([.][0-9]+)?"
           title="Only whole or real numbers. If the number is real, use a dot as a decimal separator.">
</div>
<div class="form-group">
    <div id="googleMap" style="width:100%;height:400px;"></div>
</div>
<div class="form-group">
    <label for="countries"><small>Country</small></label>
    <select class="form-control" name="country" id="countries">
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
