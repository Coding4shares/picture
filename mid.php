<?php
require('users.php');
require('linksfunctions.php');

$datedate = $_GET['date'];
$id = $_GET['id'];
$latitude  = $_GET['lat'];
$longitude = $_GET['long'];

updategeo($datedate, $latitude, $longitude);
if ($id == "?") {
    $str = 'https://picography.co/';
} else {

    $str = $id;
}
header("Location: ${str}");

function getTitel($id)
{
    $links = json_decode(file_get_contents("links.json"), true);
    foreach ($links as $link) {
        if ($link['id'] == $id) {
            return $link['description'];
        }
    }
    return null;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content=<?php $url=$domainname.$id; echo ($url); ?>>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <title><?php echo (getTitel($id)); ?></title>
</head>

<body>


</body>

</html>