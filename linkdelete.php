<?php
require('linksfunctions.php');


$linkdate = $_GET['date'];

$linkdata = getlinkBydate($linkdate);
$date = $linkdata['date'];
$image = $linkdata['image'];
$notes = $linkdata['notes'];
$description = $linkdata['description'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deletelink($date);
    header("Location: link.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Delete Image </title>

</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Delete Image</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <table class="table table-striped">


                            <tbody>
                                <tr>
                                    <td> <b> date: </b> <label for="">"<?php echo $date ?>"</label> </th>
                                </tr>
                                <tr>
                                    <td> <b> Description: </b> <label for="">"<?php echo $description ?>"</label> </th>
                                </tr>
                                <tr>
                                    <td> <b> Notes: </b> <label for="">"<?php echo $notes ?>"</label> </th>
                                </tr>
                                <tr>

                                   <img src="<?php echo $image?>" alt=""  width="150" height="150">

                                </tr>

                            </tbody>
                        </table>
                        <br>
                        <input type="submit" class="btn btn-danger" value="Submit">
                        <a href="link.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>