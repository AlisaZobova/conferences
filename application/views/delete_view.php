<?php include_once 'header.php'; ?>

<!-- Modal delete-->

    <div class="container">
        <h3 style="text-align: center; margin-top: 20px" class="modal-title" id="exampleModalLabel">Delete conference № <?php echo $_GET['conference_id']; ?>?</h3>
        <form action="..\..\core\route.php?conference_id=<?php echo $_GET['conference_id']; ?>" id="delete<?php echo $_GET['conference_id']; ?>" method="post">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
        </form>
    </div>
<!-- Modal delete-->

<?php include_once 'footer.php'; ?>