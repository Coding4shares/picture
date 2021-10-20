<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <?php

    require('users.php');


    $userdate = $_GET['date'];

    $row = getUserBydate($userdate);
    $location = $row['latitude'] . "," . $row['longtitude'];

    ?>
    <div class="float-container">

        <div class="float-child" style="width: 45%;float: left;padding: 20px;">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3> View User: <b><?php echo $row['ip'] ?> </b> </h3>
                    </div>
                    <div class="card-body">
                        <a href="update.php?date=<?php echo $row["date"] ?>" class="btn btn-outline-secondary">Update</i></a>
                        <a class="btn btn-outline-danger" href="delete.php?date=<?php echo $row["date"] ?>"> Delete</a>
                        <a class="btn btn-outline-secondary" href="us.php"> Back</a>

                    </div>
                </div>


                <table class="table">


                    <tbody>
                        <tr>
                            <th> date </th>
                            <td><?php echo $row['date'] ?></td>
                        </tr>
                        <tr>
                            <th> ip </th>
                            <td><?php echo $row['ip'] ?></td>
                        </tr>
                        <tr>
                            <th> Mac Adress </th>
                            <td><?php echo $row['mac'] ?></td>
                        </tr>
                        <tr>
                            <th> Device </th>
                            <td><?php echo $row['device'] ?></td>
                        </tr>
                        <tr>
                            <th> Operating system </th>
                            <td><?php echo $row['os'] ?></td>
                        </tr>
                        <tr>
                            <th> Browser </th>
                            <td><?php echo $row['browser'] ?></td>
                        </tr>
                        <tr>
                            <th> latitude </th>
                            <td><?php echo $row['latitude'] ?></td>
                        </tr>
                        <tr>
                            <th> longtitude </th>
                            <td><?php echo $row['longtitude'] ?></td>
                        </tr>
                        <tr>
                            <th> Location method </th>
                            <td><?php echo $row['method'] ?></td>
                        </tr>
                        <tr>
                            <th> Net Provider </th>
                            <td><?php echo $row['provider'] ?></td>
                        </tr>
                        <tr>
                            <th>Image </th>
                            <td><a href="<?php echo $row['image'] ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo $row['image'] ?>" alt="" width="150" height="150"></a></td>
                        </tr>
                        <tr>
                            <th> Notes </th>
                            <td><?php echo $row['notes'] ?></td>
                        </tr>
                        <tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>


    <div class="float-child" style="width: 50%;float: left;padding: 20px;">

        <div class="mapouter" style="position: relative;
            float: left; width:100%">
            <div class="gmap_canvas">
                <h3>Display on Map</h3>

                <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=+<?php echo $location ?>+&hl=en&z=14&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe><a href="https://putlocker-is.org">
                </a><br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 500px;
                        width: 600px;
                    }
                </style>
                <a href="https://www.embedgooglemap.net">use google maps on website</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 500px;
                        width: 600px;
                    }
                </style>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>

</body>

</html>