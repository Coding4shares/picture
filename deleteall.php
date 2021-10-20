<?php
require('users.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteall();
    header("Location: us.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete All Records !</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 50px;
        }

        .wrapper {
            margin-top: 50px;
            width: 50%;
            margin: 0 auto;
            border: 1px solid black;
            border-radius: 5px;
            padding: 30px;
            box-shadow: 5px 10px #888888;

        }

        .input {
            width: 100%;
        }

        h2 {
            background: red;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <h2>Delete All Record</h2>
                        <h3 class="mt-5">Are you sure want to DELETE ALL RECOREDS?</h3>

                        <br>
                        <input type="submit" class="btn btn-danger" value="Submit">
                        <a href="us.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>