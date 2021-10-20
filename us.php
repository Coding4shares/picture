<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script defer src="all.min.js"></script>
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!--load all styles -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .wrapper {
            width: 95%;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
        .table-condensed{
  font-size: 12px;
}
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Visitors Details</h2>
                        <a href="deleteall.php" class="btn btn-danger pull-right "><i class="fas fa-user-slash"></i> Delete all Visitor</a>
                        <a href="link.php" class="btn btn-secondary pull-right "><i class="fas fa-link"></i> Images </a>
                    </div>
                    <div class="table">

                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> IP </th>
                                    <th> MAC Adress </th>
                                    <th> Device </th>
                                    <th> OS </th>
                                    <th> Browser </th>
                                    <th> Latitude </th>
                                    <th> Longtitude </th>
                                    <th> Location Method </th>
                                    <th> Net Provider </th>
                                    <th> Image </th>
                                    <th> Notes </th>
                                    <th> action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php require('users.php');
                                $users = getUsers();
                                foreach ($users as $user) : ?>
                                    <tr>
                                        <td> <?php echo $user["date"] ?> </td>
                                        <td> <?php echo $user["ip"] ?> </td>
                                        <td> <?php echo $user["mac"] ?> </td>
                                        <td> <?php echo $user["device"] ?> </td>
                                        <td> <?php echo $user["os"] ?> </td>
                                        <td> <?php echo $user["browser"] ?> </td>
                                        <td> <?php echo $user["latitude"] ?> </td>
                                        <td> <?php echo $user["longtitude"] ?> </td>
                                        <td> <?php echo $user["method"] ?> </td>
                                        <td> <?php echo $user["provider"] ?> </td>
                                        <td>  <a href="<?php $src= $user["image"];echo $src ?>" target="_blank"><img src="<?php echo $src ?> " width="100" height="100" ></a></td>
                                        <td> <?php echo $user["notes"] ?> </td>
                                        <td>
                                            <a href="read.php?date=<?php echo $user["date"] ?>" class="btn btn-sm btn-outline-info"><i class="far fa-eye"></i></a>
                                            <a href="update.php?date=<?php echo $user["date"] ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></a>
                                            <a href="delete.php?date=<?php echo $user["date"] ?>" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                                <?php endforeach;; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>