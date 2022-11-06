<?php include_once 'header.php'; ?>

<!-- Modal delete-->

    <div class="modal fade" id="delete<?php echo $res->conference_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete conference?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <form action="?conference_id=<?php echo $res->conference_id; ?>" method="post">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                        <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- Modal delete-->

<?php include_once 'footer.php'; ?>