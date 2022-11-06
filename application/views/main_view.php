<?php include_once 'header.php'; ?>

<title>Main page</title>
<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success mt-2" onclick="location.href='application/views/create_view.php'" data-target="#create"><i class="fa fa-plus"></i></button>
            <table class="table table-striped table-hover mt-2">
                <thead class="thead-dark">
                <th>Title</th>
                <th>Date</th>
                <th>Actions</th>
                </thead>
                <tbody>
                <?php foreach ($data as $res) { ?>
                <tr>
                    <td><?php echo $res->title; ?></td>
                    <td><?php echo $res->conf_date; ?></td>
                    <td>
                        <a href="?edit=true&conference_id=<?php echo $res->conference_id; ?>" class="btn btn-success" data-target="#edit<?php echo $res->conference_id; ?>"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $res->conference_id; ?>"><i class="fa fa-trash-alt"></i></a>
                        <a href="?conference_id=<?php echo $res->conference_id; ?>" class="btn btn-success"  data-target="#read<?php echo $res->conference_id; ?>"><i class="fa fa-info-circle"></i></a>
                    </td>
                </tr>

                <?php include_once 'delete_view.php'?>
    <?php } ?>
    </tbody>
    </table>

</div>
</div>
</div>


<?php include_once 'footer.php'; ?>
