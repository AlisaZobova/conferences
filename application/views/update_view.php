<?php include_once 'header.php'; ?>
<?php include_once 'scripts.php'; ?>

<?php $res = $data ?>

<title>Edit conference <?php echo $res->title; ?></title>

<div class="container" style="width:800px; margin:0 auto;" id="edit<?php echo $res->conference_id; ?>">
    <h3 style="text-align: center; margin-top: 20px" class="modal-title" id="exampleModalLabel">Edit conference</h3>

    <form action="?conference_id=<?php echo $res->conference_id; ?>" method="post">

        <?php include_once 'create_update.php' ?>
        <button type="submit" style="float: right; margin-left: 5px;" class="btn btn-primary" name="edit">Save
        </button>
            <a href="" style="float: right;" class="btn btn-danger" data-toggle="modal"
               data-target="#delete<?php echo $res->conference_id; ?>">Delete</a>
        </div>
</div>

<?php include_once 'delete_view.php'; ?>

<?php include_once 'footer.php'; ?>
