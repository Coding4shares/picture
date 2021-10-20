<?php
require('linksfunctions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createlink($_POST);
    header("Location: link.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Image</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 100%;
            margin: 0 auto;
        }

        .input {
            width: 100%;
        }

        img {
            max-width: 180px;
        }

        input[type=file] {
            padding: 10px;
            background: #2d2d2d;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">New Image</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">

                        <table class="table table-striped">


                            <tbody>

                                <tr>
                                    <th> Images </th>
                                    <td>
                                    <input type="file" name="photo" id="fileSelect" accept="image/png, image/gif, image/jpeg"><br> 

                                    </td>
                                </tr>

                                <tr>
                                    <th> Description </th>
                                    <td><input name="description" class="input" value="" calss="form-control"></td>
                                </tr>
                                <tr>
                                    <th> Notes </th>
                                    <td><input name="notes" class="input" value="" calss="form-control"></td>
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