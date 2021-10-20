<?php
require('users.php');

$userdate = $_GET['date'];

$user = getUserBydate($userdate);
$datedate = $user['date'];
$ip = $user['ip'];
$mac = $user['mac'];
$device = $user['device'];
$os = $user['os'];
$browser = $user['browser'];
$latitude = $user['latitude'];
$longtitude = $user['longtitude'];
$method = $user['method'];
$provider = $user['provider'];
$notes = $user['notes'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateUser($_POST, $userdate);
    header("Location: us.php");
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
                                    <td> <input name="date" class="input" value="<?php echo $datedate ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> ip </th>
                                    <td><input name="ip" class="input" value="<?php echo $ip ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> Mac Adress </th>
                                    <td><input name="mac" class="input" value="<?php echo $mac ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> Device </th>
                                    <td><input name="device" class="input" value="<?php echo $device ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> Operating system </th>
                                    <td><input name="os" class="input" value="<?php echo $os ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> Browser </th>
                                    <td><input name="browser" class="input" value="<?php echo $browser ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> latitude </th>
                                    <td><input name="latitude" class="input" value="<?php echo $latitude ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> longtitude </th>
                                    <td><input name="longtitude" class="input" value="<?php echo $longtitude ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> Location method </th>
                                    <td><input name="method" class="input" value="<?php echo $method ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> Net Provider </th>
                                    <td><input name="provider" class="input" value="<?php echo $provider ?>" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> Notes </th>
                                    <td><input name="notes" class="input" value="<?php echo $notes ?>" calss="form-control"></td>
                                </tr>
                                <tr>

                            </tbody>
                        </table>


                        <br>
                        <input type="hidden" name="datedate" value="<?php echo $datedate; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="us.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>