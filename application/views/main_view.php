<?php include_once 'header.php'; ?>

<title>Conferences</title>

<div id="main" class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success mt-2" onclick="location.href='application/views/create_view.php'"
                    data-target="#create"><i class="fa fa-plus"></i></button>
            <table class="table table-striped table-hover mt-2">
                <thead class="thead-dark">
                <th>Title</th>
                <th>Date</th>
                <th></th>
                </thead>
                <tbody>
                <?php foreach ($data as $res) { ?>
                    <tr>
                        <td onclick="window.location.href = '?conference_id=<?php echo $res->conference_id; ?>';"><?php echo $res->title; ?></td>
                        <td onclick="window.location.href = '?conference_id=<?php echo $res->conference_id; ?>';"><?php echo $res->conf_date; ?></td>
                        <td>
                            <a href="" class="btn btn-danger" data-toggle="modal"
                               data-target="#delete<?php echo $res->conference_id; ?>"><i
                                        class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php include_once 'delete_view.php' ?>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>
