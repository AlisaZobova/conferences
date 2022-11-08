<?php include_once 'header.php'; ?>
<?php include_once 'scripts.php'; ?>

<?php $res = $data ?>

<title id="read">Conference <?php echo $res->title; ?></title>
<div class="container" id="read<?php echo $res->conference_id; ?>">
    <form action="?conference_id=<?php echo $res->conference_id; ?>" method="post">
        <div class="form-group">
            <table class="table table-striped table-hover mt-2">
                <thead class="thead-dark">
                <th>Title</th>
                <th>Date</th>
                <th>Country</th>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $res->title; ?></td>
                    <td><?php echo $res->conf_date; ?></td>
                    <td><?php echo $res->country; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <input id="latitude" type="hidden" class="form-control" name="latitude"
                   value="<?php echo $res->latitude; ?>">
        </div>
        <div class="form-group">
            <input id="longitude" type="hidden" class="form-control" name="longitude"
                   value="<?php echo $res->longitude; ?>">
        </div>
        <?php if ($res->latitude && $res->longitude) { ?>
            <div class="form-group">
                <div id="googleMap" style="width:100%;height:400px;"></div>
            </div>
        <?php } ?>
        <div class="form-group">

            <button type="submit" style="float: right; margin-left: 5px;" class="btn btn-primary" name="edit-view">
                Update
            </button>
            <a href="" style="float: right; margin-left: 5px;" class="btn btn-danger" data-toggle="modal"
               data-target="#delete<?php echo $res->conference_id; ?>">Delete</a>

            <!--                Optional button for return to the main page-->

            <!--<button type="button" style="float: right; margin-left: 5px;" class="btn btn-secondary"><a
                        style="text-decoration:none; color: white" href="/conferences">Back</a>
            </button>-->

        </div>
</div>

<?php include_once 'delete_view.php'; ?>

<?php include_once 'footer.php'; ?>
