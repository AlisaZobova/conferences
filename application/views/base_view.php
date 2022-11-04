<?php
ini_set('display_errors', 1);
use Bootstrap as BS;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <title>Conferences</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-success mt-2" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i></button>
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
                        <a href="?conference_id=<?php echo $res->conference_id; ?>" class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $res->conference_id; ?>"><i class="fa fa-edit"></i></a>
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $res->conference_id; ?>"><i class="fa fa-trash-alt"></i></a>
                    </td>
                </tr>
                <!-- Modal edit-->
                <div class="modal fade" id="edit<?php echo $res->conference_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit conference</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="?conference_id=<?php echo $res->conference_id; ?>" method="post">
                                    <div class="form-group">
                                        <small>Title</small>
                                        <input type="text" class="form-control" name="title" value="<?php echo $res->title; ?>">
                                    </div>
                                    <div class="form-group">
                                        <small>Date</small>
                                        <input type="date" class="form-control" name="conf_date" value="<?php echo $res->conf_date; ?>">
                                    </div>
                                    <div class="form-group">
                                        <small>Latitude</small>
                                        <input type="text" class="form-control" name="latitude" value="<?php echo $res->latitude; ?>">
                                    </div>
                                    <div class="form-group">
                                        <small>Longitude</small>
                                        <input type="text" class="form-control" name="longitude" value="<?php echo $res->longitude; ?>">
                                    </div>
                                    <div id="googleMap" style="width:100%;height:400px;"></div>

                                    <script>
                                        function initMap() {
                                            var addressCoords = new google.maps.LatLng(51.509865,-0.118092);
                                            var mapProp= {
                                                center: addressCoords,
                                                zoom:5,
                                            };
                                            var myMap = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                                            var marker = new google.maps.Marker({
                                                position: addressCoords,
                                                map: myMap
                                            });
                                        }
                                    </script>

                                    <script src="https://maps.googleapis.com/maps/api/js?key=%APIKEY%&callback=initMap" defer></script>
                                    <input type="text" class="form-control"
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="countries"><small>Country</small></label>
                                    <select class="form-control" name="country" id="countries">
                                        <option>Ukraine</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                        <option>France</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                            <button type="submit" class="btn btn-primary" name="edit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <!-- Modal edit-->

        <!-- Modal delete-->
        <div class="modal fade" id="delete<?php echo $res->conference_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete conference № <?php echo $res->conference_id; ?></h5>
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

        <?php } ?>
        </tbody>
        </table>
    </div>
</div>
</div>

<!-- Modal create-->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add conference</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <small>Title</small>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <small>Date</small>
                        <input type="date" class="form-control" name="conf_date">
                    </div>
                    <div class="form-group">
                        <small>Latitude</small>
                        <input type="text" class="form-control" name="latitude">
                    </div>
                    <div class="form-group">
                        <small>Longitude</small>
                        <input type="text" class="form-control" name="longitude">
                    </div>
                    <div id="googleMap" style="width:100%;height:400px;"></div>

                    <script>
                        function initMap() {
                            var addressCoords = new google.maps.LatLng(51.509865,-0.118092);
                            var mapProp= {
                                center: addressCoords,
                                zoom:5,
                            };
                            var myMap = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                            var marker = new google.maps.Marker({
                                position: addressCoords,
                                map: myMap
                            });
                        }
                    </script>

                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRdHNxyeXlU4pvM_S8IZy3d43Bs5-uZ8g&callback=initMap" defer></script>
                    <input type="text" class="form-control"
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="countries"><small>Country</small></label>
                    <select class="form-control" name="country" id="countries">
                        <option>Ukraine</option>
                        <option>USA</option>
                        <option>UK</option>
                        <option>France</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
            <button type="submit" class="btn btn-primary" name="add">Save</button>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Modal create-->
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
-->
</body>
</html>