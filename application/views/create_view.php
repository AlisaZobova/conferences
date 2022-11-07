<?php include_once 'header.php'; ?>

<script type="text/javascript" src="../../js/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>

<title>Add conference</title>

<div class="container" style="width:800px; margin:0 auto;" id="create">
    <h3 style="text-align: center; margin-top: 20px" class="modal-title" id="exampleModalLabel">Add new conference</h3>
    <form action="application\core\route.php" method="post">

        <?php include_once 'create_update.php' ?>
        <button type="submit" style="float: right; margin-left: 5px;" class="btn btn-primary" name="add">Save
        </button>
</div>
</div>

<?php include_once 'footer.php'; ?>
