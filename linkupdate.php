<?php
require('linksfunctions.php');



$linkdate = $_GET['date'];

$linkdata = getlinkBydate($linkdate);
$date = $linkdata['date'];
$image = $linkdata['image'];
$notes = $linkdata['notes'];
$description = $linkdata['description'];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updatelink($_POST, $date);
    header("Location: link.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 100%;
            margin: 0 auto;
        }

        .input {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <table class="table table-striped">


                            <tbody>
                                <tr>
                                    <th> date </th>
                                    <td><input name="notes" class="input" value="<?php echo $date ?>" calss="form-control" disabled></td>
                                </tr>
                                <tr>
                                    <th> Image </th>
                                    <td><img src="<?php echo $image; ?>" alt="" width="200" height="200"></td>
                                    <td><input type="hidden" name="notes" class="input" value="<?php echo $image ?>" calss="form-control" disabled ></td>
                                </tr>
                                <tr>
                                    <th> Description </th>
                                    <td><input name="description" class="input" value="<?php echo $description ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> Notes </th>
                                    <td><input name="notes" class="input" value="<?php echo $notes ?>" calss="form-control"></td>
                                </tr>
                                <tr>

                            </tbody>
                        </table>


                        <br>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="link.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>